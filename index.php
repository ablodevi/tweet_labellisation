<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
include './config/config.php';

if (isset($_POST['tweet_id']) && isset($_POST['option_radio'])) {
    update_tweet_labels($_POST['tweet_id'], $_POST['option_radio']);
}

$tweet = read_tweet_randomly();
?>

<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Plateforme de labellisation de tweets</title>
        <link rel="stylesheet" type="text/css" 
              href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="include/css/style.css">
    </head>


    <body>
        <h1>IF25 - Plateforme web de labellisation de tweets</h1>
        <p>Cette plateforme a pour but de réaliser un sondage sur les contenus des tweets.
            Ce sondage nous aidera dans notre projet à réaliser une étude se rapportant 
            à l'approche supervisée des graphes de contenus sur les réseaux sociaux.</p>

        <p>Choisissez l'option qui vous paraît le mieux correspondre à ce que vous pensez 
            que le tweet véhicule comme message.</p>

        <div id="div_main" class="container">


            <form method="post" action="#">

                <table>

                    <fieldset>
                        <legend>Tweet</legend>

                        <div id="tweet_content">
                            <p>
                                <?php
                                if ($tweet != NULL) {
                                    echo $tweet[0]['tweet_content'];
                                    echo '<input type="hidden" name="tweet_id" value=' . $tweet[0]['id'] . ' />';
                                } else {
                                    echo 'Tous les tweets de la base ont déjà atteint le nombre maximum de labels autorisés.';
                                }
                                ?>
                            </p>
                        </div>

                    </fieldset>

                    <div id="div_radio">
                        <div class="radio">

                            <input type="radio" 
                                   name="option_radio" 
                                   id="option_radio_positif" 
                                   value="positif"/>Avis positif   
                        </div>
                        <div class="radio">
                            <input type="radio" 
                                   name="option_radio" 
                                   id="option_radio_neutre" 
                                   value="neutre"/>Avis neutre
                        </div>
                        <div class="radio">
                            <input type="radio" 
                                   name="option_radio" 
                                   id="option_radio_negatif" 
                                   value="negatif"/>Avis négatif

                        </div>
                    </div>

                </table>

                <?php
                if ($tweet != NULL) {

                    echo '<div id="button_submit">';
                    echo '<button type="submit" class="btn btn-info" id="btn-envoyer">Valider</button>';
                    echo '</div>';
                }
                ?>

            </form>


        </div>

    </body>


</html>