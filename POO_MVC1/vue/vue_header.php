<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Ailtech</title>
</head>
<body>

<ul>
    <div>
    <li><a href="index.php">Acceuil</a> </li>
    <li>
        <?php 
            if ($_SESSION['type']=='admin')
            {
                echo '<a href="index.php?action=ajouter"> Ajouter </a>';
            }
        ?>
    </li>
    
    <?php 
        if ($_SESSION['cnx'] !='oui')
        {
            echo '<li><a href="index.php?ctr=ctr1"> Se Connecter </a></li>';
        }
        else{
            echo '<li><a href="index.php?ctr=ctr1&action=deconnexion"> Déconnexion </a></li>';
        }
    ?>
    
    </div>
</ul>

<?php 
    //Affichage avec quel utilisateur on est connecté 
    if ($_SESSION['cnx'] == 'oui'){
        echo 'vous êtes copnnecter en tant que: '.$_SESSION['nom'];
    }
?>
    
