<?php


class Modele {
    //Déclaration de la variable de connection 
    public $cnx;
    public function __construct()
    {
        include_once("modele/produit.php");
    }

    //Etablir la connection avec la BDD
    public function getConnection()
    {
        try
        {
            $this->cnx = new PDO('mysql:host=localhost; dbname=dbailtech', 'btssio', 'btssio');
        }catch(PDOExeption $e){
            echo 'Connexion à la Base de donnée impossible: '.$e->getMessage();
        }
        return $this->cnx;
    }

    //Fermer la connection avec la BDD
    public function fermerConnection()
    {
        $this->cnx = null;
    }

    //Fonction qui retorune la liste des produits 
    public function getProduits()
    {
        $sql = 'SELECT * FROM tbl_produits';
        $rqt = $this->cnx->prepare($sql);
        $rqt->execute();
        $listeproduit = $rqt->fetchAll(PDO::FETCH_OBJ);
        return $listeproduit;
    }

    //Fonction qui retourne un seul produit qui prend en paramètre d'entrer l'id d'un produit 
    public function getProduit($id)
    {
        $sql = "SELECT * FROM tbl_produits WHERE id = ?;";
        $rqt = $this->cnx->prepare($sql);
        $rqt->execute(array($id));
        $lesProduits = $rqt->fetchAll(PDO::FETCH_OBJ);
        return $lesProduits;
    }

    //Fonction de supression d'un produit qui prend en paramètre d'entrer l'id d'un produit 
    public function supprimerProduit($id)
    {
        $sql = "DELETE FROM tbl_produits WHERE id= ?;";
        $rqt = $this->cnx->prepare($sql);
        $rqt->execute(array($id));
    }

    //Fonction d'ajout d'un produit qui prend en entrer un tableau de valeur 
    public function ajouterProduit($tbl_valeur)
    {
        $sql = "INSERT INTO tbl_produits (id,categorie,nom,description,prix) VALUES (?,?,?,?,?);";
        $rqt = $this->cnx->prepare($sql);
        $rqt->execute($tbl_valeur);
    }

    //Fonction de modification d'un produit qui prend en entrer un tableau de valeur 
    public function modifierProduit($tbl_valeur)
    {
        $sql = "UPDATE tbl_produits SET categorie=?, nom=?, description=?, prix=? WHERE ID = ?;";
        $rqt = $this->cnx->prepare($sql);
        $rqt->execute($tbl_valeur);
    }
}
?>
