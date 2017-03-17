<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include './config/config.php';
$permit = true;
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Visualisation des labels des tweets</title>
        <link rel="stylesheet" type="text/css" 
              href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8" id="main">
                <h1 id="title">Visualisation des labels des tweets</h1>
                <table class="table table-hover">
                    <tr>
                        <th>Texte du tweet</th>
                        <th>Avis positif</th>
                        <th>Avis neutre</th>
                        <th>Avis négatif</th>
                    </tr>
                    <?php
                    if ($permit) {
                        $tweets = read_all_tweets();
                        foreach ($tweets as $key => $tweet) {
                            echo '<tr>';
                            echo '<td>' . $tweet['tweet_content'] . '</td>';
                            echo '<th>' . $tweet['count_positif'] . '</th>';
                            echo '<th>' . $tweet['count_neutre'] . '</th>';
                            echo '<th>' . $tweet['count_negatif'] . '</th>';
                            echo '</tr>';
                        }
                    }
                    // put your code here
                    ?>
                </table>
            </div>
            <div class="col-md-2"></div>
        </div>
    </body>
</html>
