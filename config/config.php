<?php

//Les lignes suivantes sont indispensables pour afficher les erreurs levées
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//define(POSITIF, $value);

//On stocke une connexion persistante dans la variable db
$connection = db_connect();

//Paramètres de connexion à la base de données
function db_connect() {
    $dsn = "mysql:host=localhost;port=3306;dbname=tweet_labellisation";
    $user = "root";
    $pass = "MgnTskym";
    return new PDO($dsn, $user, $pass, array(
        PDO::ATTR_PERSISTENT => true
    ));
}

function populate_sql_from_csv($column_original_id, $column_tweet_content, $filename) {
    $not_inserted = 0;
    // Filename must be with extension (like "file.csv" for example)
    $fichier = fopen($filename, "a+");
    while ($tab = fgetcsv($fichier, 1024, ';')) {
        $res = create_tweet($tab[$column_original_id], $tab[$column_tweet_content]);
        if (!$res) {
            $not_inserted = $not_inserted + 1;
        }
    }
    return $not_inserted;
}

function populate_sql_from_json($filename) {
    global $connection;
    $not_inserted_array = [];
    // Filename must be with extension (like "file.json" for example)
    $json_source = file_get_contents($filename);
    //Décodage du JSON et récupération dans un tableau
    $json_data = json_decode($json_source, TRUE);
    //Insertion dans la base de données SQL
    foreach ($json_data as $tweet) {
        $state = "INSERT INTO `tweet` (`original_id`, `tweet_content`) "
                . "VALUES ('" . $tweet['id'] . "','" . $tweet['content'] . "')";
        $res = $connection->exec($state);
        //Sauvegarde du tuple JSON dans un tableau si non inséré
        if (!$res) {
            $not_inserted_array[] = $tweet;
        }
    }
    return $not_inserted_array;
}

function create_tweet($original_id, $tweet_content) {
    global $connection;
    $state = "INSERT INTO `tweet` (`original_id`, `tweet_content`) "
            . "VALUES ('" . $original_id . "','" . $tweet_content . "')";
    $res = $connection->exec($state);
    return $res;
}

function read_tweet_randomly() {
    global $connection;
    $state = "SELECT * FROM tweet "
            . "WHERE `count_positif`+`count_neutre`+`count_negatif`<5 "
            . "ORDER BY RAND() LIMIT 1";
    $res = $connection->query($state, PDO::FETCH_ASSOC)->fetchAll();
//    $res[0]['tweet_content'] = tweet_content_anonymizer($res[0]['text']);
    if (sizeof($res) != 0) {
        return $res;
    }
    return NULL;
}

function read_user_id_randomly() {
    
}

function read_tweet_randomly_by_user_id($user_id) {
    
}

function read_all_tweets() {
    global $connection;
    $state = "SELECT * FROM tweet";
    $res = $connection->query($state, PDO::FETCH_ASSOC)->fetchAll();
    return $res;
}

function update_tweet_labels($tweet_id, $option_radio) {
    global $connection;
    $count_label = 'count_' . $option_radio;
    $state = 'UPDATE `tweet` SET ' . $count_label . ' = ' . $count_label . '+1 '
            . 'WHERE id = ' . $tweet_id . '';
    $connection->query($state);
}

function tweet_content_anonymizer($tweet_content) {
    $pattern = "/@\\w+/u";
    return preg_replace($pattern, "@xxx", $tweet_content);
}

function tendance($tweet) {
    $tableau_compte_avis = [$tweet['count_positif'], $tweet['count_neutre'], $tweet['count_negatif']];
    $indice = array_search(max($tableau_compte_avis), $tableau_compte_avis);
    $tableau_tendances = ['POSITIF', 'NEUTRE', 'NEGATIF'];
    return $tableau_tendances[$indice];
}

?>
