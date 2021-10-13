<?php include('vue_header.php'); ?>
        <h1>Ajout d'un produit</h1>
        <table>
            <tbody>
                <tr>
                    <th>Id</th>
                    <th>Categorie</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th></th>
                </tr>
            </tbody>
            
            
            <form action="index.php?produit=<?= $_GET['produit']?>&action=modifierdb" method="POST">
                <?php
                
                foreach($action as $produit)
                {
                    echo'
                        <td><input type="text" name="id" value="'.$produit->id.'" required></td>
                        <td><input type="number" name="categorie" value="'.$produit->categorie.'" required> </td>
                        <td><input type="text" name="name" value="'.$produit->nom.'" required></td>
                        <td><input type="text" name="description" value="'.$produit->description.'"  required></td>
                        <td><input type="number" name="prix" value="'.$produit->prix.'" required></td>
                        <td><input type="submit" name="submit" value="Modifier"></td>
                    ';
                }
                
                ?>
            </form>

        </table>
    </body>
</html>