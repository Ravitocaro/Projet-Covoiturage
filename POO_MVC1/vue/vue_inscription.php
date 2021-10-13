<?php include('vue_header.php'); ?>
    <h1>Connection</h1>


    <form action="index.php?ctr=ctr1&action=inscription_db" method="POST">
        <input type="text" name="nom" required placeholder="Nom">
        <input type="password" name="mdp" required placeholder="Mdp">
        <input type="text" name="email" required placeholder="email">
        <input type="submit" name="submit" value="S'inscrire">
    </form>

    <a href="index.php?ctr=ctr1" >Connection</a>



<?php include('vue_footer.php');?> 