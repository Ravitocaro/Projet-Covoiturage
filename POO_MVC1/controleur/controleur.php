<?php


    class Controleur {
        public $modele;

        public function __construct()
        {
          include_once("modele/modele.php");
          $this->modele = new Modele();
          //déclaration de la connection dans le controleur 
          $this->modele->getConnection();
        }


        public function Produit()
        { 
          //On execute l'action déclancher par l'utilisateur
          
          //Supprimer le produit de la BDD
          if($_GET['action']=='supprimer')
          {
               //Appel de la fonction supprimer                     
               $action = $this->modele->supprimerProduit($_GET['produit']);
               header('Location: index.php');
          }

          //Affichage de la vue Ajouter produit 
          else if($_GET['action']=='ajouter')
          {
               include 'vue/vue_ajout_produit.php';
          }

          //Ajout du produit dans la BDD 
          else if($_GET['action']=='ajouterdb')
          {
               //Stock les valeurs du formulaire d'ajout dans un tableau pour ensuite passer le tableau en paramètre 
               $tbl_valeur = array(
                    $_POST['id'], $_POST['categorie'], $_POST['name'], $_POST['description'], $_POST['prix'] 
               );
               $action = $this->modele->ajouterProduit($tbl_valeur);
               header('Location: index.php');
          }

          //Affichage de la vue modifier 
          else if($_GET['action']=='modifier')
          {
               //Appel de la fonction d'affichage d'un seul produit 
               $action = $this->modele->getProduit($_GET['produit']);
               include 'vue/vue_modifier_produit.php';
          }

          //Modification dans la BDD
          else if($_GET['action']=='modifierdb')
          {
               //Stock les valeurs du formulaire de modification dans un tableau pour ensuite passer le tableau en paramètre 
               $tbl_valeur = array(
                    $_POST['categorie'], $_POST['name'], $_POST['description'], $_POST['prix'], $_GET['produit']
               );
               //Appel de la fonction de modification 
               $action = $this->modele->modifierProduit($tbl_valeur);
               header('Location: index.php');
          }

          //Affichage de la liste des produits par défault 
          else if (!isset($_GET['produit']))
          {
               // On appel la liste les produits 
               $produits = $this->modele->getProduits();
               include 'vue/vue_liste.php';
          }

          //Affichage d'un seul produit 
          else
          {
               // Appeler le produit demandé 
               $produit = $this->modele->getProduit($_GET['produit']);
               include 'vue/vue_produit.php';
          }
        }
        }
        ?>
        
