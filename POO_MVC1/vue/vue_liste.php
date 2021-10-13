<?php include('vue_header.php'); ?>
    <h1>Liste des produits</h1>
    
        <?php
        foreach ($produits as  $produit)
            {   
                 echo   '<article>
                            <div class="produit">
                                <div class="id"><a href="index.php?produit=' . $produit->id . '">' . $produit->id . '</a></div>
                                <div class="nom">' .$produit->nom .   '</div>
                                <div class="prix">' . $produit->prix . ' €</div>';
                                if ($_SESSION['type']=='admin')
                                {
                                    echo '<div class="action"><a href="index.php?produit='.$produit->id.'&action=supprimer"> Supprimer </a>
                                <a href="index.php?produit='.$produit->id.'&action=modifier"> Modifier </a></div>';
                                }
                                
                            echo '</div>
                        </article>';
            }
        ?>


    <?php include('vue_footer.php'); ?>