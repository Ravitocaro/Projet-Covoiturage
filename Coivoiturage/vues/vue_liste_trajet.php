<?php include_once('vue_header.php'); ?>

    <h1 class="h1_trajet">Liste des Trajets </h1>

    <?php
    foreach($trajets as $liste)
    {
        echo ' <div class="prod_traj">
            <div class="article_trajet">
                <div class="produit">
                    <div class="test id_trajet"><a href="index.php?controlleur=Trajet&action=afficher_trajet&id_trajet=' . $liste->id_trajet . '">Trajet: ' . $liste->id_trajet . '</a></div>
                    <div class="test">' .$liste->date_trajet .   '</div>';
                    if($liste->du_lycee == 1)
                    {
                       echo 'Du Lycée vers '.$liste->ville; 
                    }else{
                        echo 'De '.$liste->ville.' vers le Lycée'; 
                    }
                    
                    if($liste->place_dispo >=2)
                    {
                        echo '<div class="test">' .$liste->place_dispo . ' places restantes</div>';
                    }else{
                        echo '<div class="test">' .$liste->place_dispo . ' place restahte</div>';
                    }
                    
                    

                    if($_SESSION['type'] == 1 || $liste->id_user == $_SESSION['id_adh'])
                    {
                        echo '
                            <div class="suppr"> <a href="index.php?controlleur=Trajet&action=supprimer&id_trajet='.$liste->id_trajet.'">Supprimer</a></div>
                            <div><a class="btn_mod" href="index.php?controlleur=Trajet&id_trajet='.$liste->id_trajet.'&action=modifier">Modifier</a></div>
                            <div><a class="btn_rej" href="index.php?controlleur=Trajet&id_trajet='.$liste->id_trajet.'&action=rejoindre_trajet">Rejoindre le Trajet </a></div>';
                    }
        echo '
            </div>
            </div>
            </div>';     
    }
    ?>
    
