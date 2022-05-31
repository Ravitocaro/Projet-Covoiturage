<?php include_once('vue_header.php') ?>

    <section class="connexion">
        <h1>Inscription</h1>  
        <div class="form">
            <form action="index.php?controlleur=Securite&action=inscription_bd" method="POST">
                <input type="text" name="nom" required placeholder="Nom" >
                <input type="text" name="prenom" required placeholder="Prénom">
                <input type="email" name="email" required placeholder="E-Mail">
                <input type="password" name="mdp" required placeholder="Mot de passe">
                <input type="number" name="num_tel" required placeholder="Numéro de Téléphone">
                <input type="radio" id="c1" name="conducteur" value="0">
                <label for="c1"> Non </label>
                <input type="radio" id="c2" name="conducteur" value="1">
                <label for="c2"> Oui </label>
                <input type="submit" name="submit" value="S'inscrire">
            </form>
        </div>
        <a href="index.php?controlleur=Securite">Se Connecter</a>
    </section>
  

<?php include_once('vue_footer.php'); ?>