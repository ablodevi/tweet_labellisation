<?php

include '../config/config.php';

$filename = 'file.json';

$not_inserted_array = populate_sql_from_json($filename);

echo 'Populating database... <br/>';

if (count($not_inserted_array) == 0) {
    echo 'The SQL Database has been successfully updated ; all the tweets from the dataset have been added.';
} else {
    echo 'Error... Not all tweets inserted. Not inserted = ' . count($not_inserted);
    echo '<pre>';
    print_r($not_inserted_array);
    echo '</pre>';
}
?>
