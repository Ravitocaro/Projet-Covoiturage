<?php include_once('vue_header.php');?>

    <h1>Fiche Trajet</h1>

    <?php
        foreach($trajet as $donnee)
        {
            echo 'Conducteur: '.$donnee->nom.' '.$donnee->prenom.'<br>' ;
            echo 'Date: '. $donnee->date_trajet .'<br>';
            if($donnee->place_dispo >=2)
            {
                echo 'Places disponibles: '. $donnee->place_dispo . '<br>';
            }
            else if($donnee->place_dispo == 1)
            {
                echo 'Place disponible: '. $donnee->place_dispo . '<br>';
            }else{
                echo 'Aucune place disponible';
            }
            
            
            if($donnee->du_lycee == 1)
            {
                echo 'Du Lycée vers '. $donnee->ville .'<br>';
            }
            
            else
            {
                echo 'De '. $donnee->ville .' vers le Lycée<br>';
            }
        }

    ?>
    
    <button><a href="index.php?controlleur=Trajet">Retour</a></button>
