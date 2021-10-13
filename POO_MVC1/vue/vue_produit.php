<html>
<head></head>
<body>
    <h1>Fiche PRODUIT</h1>
    <?php

        foreach($produit as $prod)
        {
            echo 'Ref  : '  . $prod->id  .  '<br>';
            echo 'Nom  : '  . $prod->nom .  '<br>';
            echo 'Prix : '  . $prod->prix . ' € <br>';
        }
        

    ?>
    <a href="index.php"> retour </a>
</body>
</html>
