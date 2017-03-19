<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include './config/config.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Visualisation des labels des tweets</title>
        <link rel="stylesheet" type="text/css" 
              href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="include/css/style.css">
    </head>
    <body>

        <h1>Tendances des tweets</h1>

        <div id="div_main">

            <table title="Tableau des tendances des tweets" 
                   class="table table-hover">
                <tr>
                    <th>Tweet</th>
                    <th>Tendance</th>
                    <td>Avis positif</td>
                    <td>Avis neutre</td>
                    <td>Avis négatif</td>
                </tr>
                <?php
                $tweets = read_all_tweets();
                foreach ($tweets as $key => $tweet) {
                    echo '<tr>';
                    echo '<td>' . $tweet['tweet_content'] . '</td>';
                    echo '<th>' . tendance($tweet) . '</th>';
                    echo '<td>' . $tweet['count_positif'] . '</td>';
                    echo '<td>' . $tweet['count_neutre'] . '</td>';
                    echo '<td>' . $tweet['count_negatif'] . '</td>';
                    echo '</tr>';
                }
                ?>
            </table>

        </div>

    </body>
</html>
