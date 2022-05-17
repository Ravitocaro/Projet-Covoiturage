<?php include_once('vue_header.php') ?>
    <section class="connexion">
        <h1>Connexion</h1>
        <div class="form">
            <form action="index.php?controlleur=Securite&action=identification_bd" method="POST">
                <input type="email" name="email" required placeholder="E-Mail">
                <input type="password" name="mdp" required placeholder="Mot de passe">
                <input type="submit" name="submit" value="Connexion">
            </form>
        </div>
        

        <a href="index.php?controlleur=Securite&action=inscription">S'inscrire</a>
    </section>
    

    

