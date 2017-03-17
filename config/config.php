<?php

//Les lignes suivantes sont indispensables pour afficher les erreurs levées
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//On stocke une connexion persistante dans la variable db
$connection = db_connect();

//Paramètres de connexion à la base de données
function db_connect() {
    $dsn = "mysql:host=localhost;port=3306;dbname=tweet_labellisation";
    $user = "root";
    $pass = "";
    return new PDO($dsn, $user, $pass, array(
        PDO::ATTR_PERSISTENT => true
    ));
}

function populate_sql_from_csv($column_original_id, $column_tweet_content, $filename) {
    $not_inserted = 0;
    $fichier = fopen($filename, "a+");
    while ($tab = fgetcsv($fichier, 1024, ';')) {
        $res = create_tweet($tab[$column_original_id], $tab[$column_tweet_content]);
        if (!$res) {
            $not_inserted = $not_inserted + 1;
        }
    }
    return $not_inserted;
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
    return $res[0];
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

?>
