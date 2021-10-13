<?php

    class Modele_securite
    {
        //Déclaration de la variable de connection
        public $cnx;
        public function __construct()
        {

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

        //Fonction pour ajouter un utilisateur dans la base
        public function inscrireEnBase($tbl_valeur)
        {
            $sql = "INSERT INTO user (nom, email, mdp) VALUES (?,?,?);";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute($tbl_valeur);
        }


        //Fonction qui retourne les informations d'un utilisateur précis 
        public function verifUser($nom)
        {
            $sql = "SELECT * FROM user where nom = ?;";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute(array($nom));
            $user = $rqt->fetchALL(PDO::FETCH_OBJ);
            return $user;
        }
    }

?>