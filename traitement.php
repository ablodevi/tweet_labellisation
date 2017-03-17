<?php

include './config/config.php';

if (isset($_POST['tweet_id']) && isset($_POST['option_radio'])) {
    update_tweet_labels($_POST['tweet_id'], $_POST['option_radio']);
}

header('Location: index.php');
?>