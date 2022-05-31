<?php
    include_once('vue_header.php');

    if($_SESSION['verifie'] == 1)
    {
        if($_SESSION['conducteur'] == 1 || $_SESSION['type'] == 1)
        {
            echo '<div class="acc_choix">
            <a href="index.php?controlleur=Trajet&action=ajouter"><div class="ajouter">AJOUTER</div></a>';
        }
        echo '<a href="index.php?controlleur=Trajet"><div class="liste">TROUVER</div></a></div>';

    }

    else if ($_SESSION['connecte'] != "oui")
    {
        echo '
        <div class="text_centre">
            <h1> Bienvenue sur notre site de covoiturage </h1>
            <a href="index.php?controlleur=Securite"> <h3> ⇨ Veuillez vous connecter pour acceder aux trajets ⇦ </h3> </a>
            <p> Ce site est édité par: Hoareau Théo, Lebon Maxime, Calabrese Anzo
                <br> Veuillez ne pas copier ce site car il est sous ©
            </p>
        </div>';
    }


    else if ($_SESSION['connecte'])
    {
        if($_SESSION['verifie'] == 0)
        {
            echo 'En attente de vérification ! ';
        }
    }
    include_once('vue_footer.php');
?>
