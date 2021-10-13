<?php

// Toute interaction passe par l'index et est transmise
// directement au contrôleur responsable du traitement

    include_once("controleur/controleur.php");
    include_once("controleur/controleur_securite.php");


    //Controleur de Sécurité 
    if ($_GET['ctr']=='ctr1')
    {
        $controller1 = new Controleur_securite();
        $controller1->Securite();
    }

    //Controleur Produit
    else 
    {
        $controller = new Controleur();
        $controller->Produit(); 
    }

    
    

?>
