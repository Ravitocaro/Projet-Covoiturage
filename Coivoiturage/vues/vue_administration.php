<?php include_once('vue_header.php'); ?>

    <h1>Liste des utilisateurs à vérifier </h1>

    <div>
        <?php
            foreach($action as $utilisateurs)
            {
                echo '
                    Id: '. $utilisateurs->id_adh .' <br>
                    Nom: '. $utilisateurs->nom .' <br>
                    Prenom: '. $utilisateurs->prenom .' <br>
                    E-mail: '. $utilisateurs->mail .' <br>
                    Statut: '. $utilisateurs->type .' <br>
                    Numéro: '. $utilisateurs->num_tel .' <br>
                    Conducteur: '. $utilisateurs->conducteur .' <br>
                    Vérifié: '. $utilisateurs->verifie .' <br>
                    <a href="index.php?controlleur=Securite&action=verifie&user='. $utilisateurs->id_adh .'">Vérifier</a> <br>
                    ****************************************** <br>
                    
                ';
            }
        ?>
    </div>