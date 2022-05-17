<?php 
    session_start();
    if(!isset($_SESSION['id_adh'])){
        $_SESSION['id_adh'] = null;
        $_SESSION['nom'] = null;
        $_SESSION['prenom'] = null;
        $_SESSION['email'] = null;
        $_SESSION['type'] = null;
        $_SESSION['mdp'] = null;
        $_SESSION['num_tel'] = null;
        $_SESSION['date_creation'] = null;
        $_SESSION['conducteur'] = null;
        $_SESSION['connecte'] = null;
        $_SESSION['verifie'] = null;
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <title>Covoiturage</title>
</head>
<body>
    
    <header>
        <section>
            <div class="top-page">
            <img src="image/logo.jfif">
            <div class="as"> 
                    <?php
                        if($_SESSION['connecte'] == "oui" && $_SESSION['type'] == 1)
                        {
                            echo '♕' . $_SESSION['prenom'] ;
                        }
                        else if($_SESSION['connecte'] == "oui" && $_SESSION['type'] == 0)
                        {
                            echo '♟' . $_SESSION['prenom'] ;
                        }
                    ?>
                </div>
                <ul>
                    <li><a href="index.php?controlleur=Accueil">Accueil</a></li>

                    <?php 
                        if($_SESSION['connecte'] != "oui")
                        {
                            echo '<li><a href="index.php?controlleur=Securite">Se connecter</a></li>';
                        }

                        else
                        {
                            echo '<li><a href="index.php?controlleur=Securite&action=profile">Profil</a></li>';
                            if($_SESSION['type'] == '1')
                            {
                                echo '<li><a href="index.php?controlleur=Securite&action=administration">Administration</a></li>';
                            }
                            echo '<li><a href="index.php?controlleur=Securite&action=deconnexion">Se déconnecter</a></li>';
                            
                        }
                    ?>

                    
                </ul>
                
                
            </div>
            
        </section>
    </header>