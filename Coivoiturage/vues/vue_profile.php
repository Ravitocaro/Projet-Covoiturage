<?php include_once('vue_header.php');?>

    <section class="connexion">
        <h1 class="titre_form">Informations</h1>  
        <div class="form">
            <form action="index.php?controlleur=Securite&action=modification_bd" method="POST">
                <input type="text" name="nom" required value="<?= $_SESSION['nom'] ?>" >
                <input type="text" name="prenom" required value="<?= $_SESSION['prenom'] ?>">
                <input type="email" name="email" required value="<?= $_SESSION['email'] ?>">
                <input type="password" name="mdp" required placeholder="Mot de passe">
                <input type="number" name="num_tel" required value="<?= '0'.$_SESSION['num_tel'] ?>">
                Conducteur: 

                <?php 
                    if($_SESSION['conducteur'] == 0)
                    {
                        echo '<input type="radio" id="c1" name="conducteur" value="0" checked>
                        <label for="c1"> Non </label>';
                        echo '<input type="radio" id="c2" name="conducteur" value="1">
                        <label for="c2"> Oui </label>';
                    }
                    
                    else
                    {
                        echo '<input type="radio" id="c1" name="conducteur" value="0">
                        <label for="c1"> Non </label>';
                        echo '<input type="radio" id="c2" name="conducteur" value="1" checked>
                        <label for="c2"> Oui </label>';
                    }
                ?>
                
                <input type="submit" name="submit" value="Modifier">
            </form>
        </div>
    </section>