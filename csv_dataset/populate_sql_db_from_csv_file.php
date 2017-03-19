<?php

include '../config/config.php';

$column_tweet_id = 2;
$column_tweet_content = 0;
$filename = 'file.csv';

$not_inserted = populate_sql_from_csv($column_tweet_id, $column_tweet_content, $filename);

echo 'Populating database... <br/>';

if ($not_inserted === 0) {
    echo 'The SQL Database has been successfully updated ; all the tweets from the dataset have been added.';
} else {
        echo 'Error... Not all tweets inserted. Not inserted = ' . $not_inserted;
}

?>
