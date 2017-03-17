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
        <title>Plateforme de labellisation de tweets</title>
        <link rel="stylesheet" type="text/css" 
              href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="include/css/style.css">
    </head>


    <body>

        <div id="main" class="row">

            <div class="col-md-8" id="div_sondage">
                <h1 id="title">Labellisation de tweets</h1>

                <form method="post" action="traitement.php">

                    <table>

                        <p id="tweet_content"><?php
                            $tweet = read_tweet_randomly();
                            $tweet_id = $tweet['id'];
                            echo $tweet['tweet_content'];
                            echo '<input type="hidden" name="tweet_id" value=' . $tweet_id . ' />';
                            ?></p>

                        <div class="radio">
                            <label>
                                <input type="radio" 
                                       name="option_radio" 
                                       id="option_radio_positif" 
                                       value="positif"/>Avis positif                                
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" 
                                       name="option_radio" 
                                       id="option_radio_neutre" 
                                       value="neutre"/>Avis neutre
                            </label>
                        </div>

                        <div class="radio">
                            <label>
                                <input type="radio" 
                                       name="option_radio" 
                                       id="option_radio_negatif" 
                                       value="negatif"/>Avis négatif
                            </label>
                        </div>

                    </table>


                    <div id="button_submit">
                        <button type="submit" class="btn btn-info" id="btn-envoyer">Valider</button>
                        <!--<button type="reset" class="btn btn-default" id="btn-skip"> Ignorer </button>-->
                    </div>

                </form>
                
                <div id="button_visualisation">
                    <a href="visualisation.php" role="button">Visualisation</a>
                </div>
                
            </div>

            

        </div>


    </body>


</html>