<?php include_once('vue_header.php');?>

<div>
    
        <?php foreach($trajet as $donnee){

    echo '
    <section class="connexion">  
    <div class="form">
    <form action="index.php?controlleur=Trajet&action=modifier_bd&id_trajet='.$donnee->id_trajet.'" method="POST">
        <input type="text" name="date_trajet" value="'.$donnee->date_trajet.'" required>
        <input type="text" name="place_dispo"value="'.$donnee->place_dispo.'"  required>
        <input type="text" name="ville"value="'.$donnee->ville.'" required>
        Du Lycée(0 non ou 1 oui)
        <input type="text" name="du_lycee" value="'.$donnee->du_lycee.'" required>
        <input type="submit" name="submit" value="Modifier">
        <a href="index.php?controlleur=Trajet">Retour</a>
    </form>
    
    </div>
    </section>';
        
    } ?>
    
    
</div>