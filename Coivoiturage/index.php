<?php
    $controlleur = isset($_GET['controlleur']) ? $_GET['controlleur'] : 'Accueil'; 
    $controlleur = $controlleur.'Controlleur';
    // var_dump($controlleur);
    require_once("controlleur/AccueilControlleur.php");
    require_once("controlleur/SecuriteControlleur.php");
    require_once("controlleur/TrajetControlleur.php");


    switch ($controlleur)
    {
        case 'AccueilControlleur':
            $controlleur = new Acceuil_Controlleur();
            $controlleur->Accueil();
            break;

        case 'SecuriteControlleur': 
            $controlleur = new Securite_Controlleur();
            $controlleur->Securite();
            break;

        case 'TrajetControlleur':
            $controlleur = new Trajet_Controlleur();
            $controlleur->Trajet();
            break;
            
    } 



?>