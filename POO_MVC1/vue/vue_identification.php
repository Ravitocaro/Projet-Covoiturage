<?php include('vue_header.php'); ?>
    <h1>Connection</h1>


    <form action="index.php?ctr=ctr1&action=identification_db" method="POST">
        <input type="text" name="nom" required placeholder="Nom">
        <input type="password" name="mdp" required placeholder="Mdp">
        <input type="submit" name="submit" value="Connexion">
    </form>

    <a href="index.php?ctr=ctr1&action=inscription">Inscription</a>


<?php include('vue_footer.php');?> 