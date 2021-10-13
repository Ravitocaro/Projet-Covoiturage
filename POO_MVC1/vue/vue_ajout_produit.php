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
            
            <form action="index.php?action=ajouterdb" method="POST">
                <td><input type="text" name="id" placeholder="id" required></td>
                <td><input type="number" name="categorie" placeholder="catégorie" required> </td>
                <td><input type="text" name="name" placeholder="nom du produit" required></td>
                <td><input type="text" name="description" placeholder="description du produit" required></td>
                <td><input type="number" name="prix" placeholder="prix" required></td>
                <td><input type="submit" name="submit" value="Ajouter"></td>
            </form>

        </table>
    </body>
</html>