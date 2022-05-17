<?php
// ini_set('display_errors', '1');
// ini_set('error_reporting', E_ALL);

    class Securite_Modele
    {
        public $cnx;

        public function __construct()
        {

        }

        public function getConnexion()
        {
            try
            {
                $this->cnx = new PDO('mysql:host=localhost; dbname=covoiturage', 'btssio', 'btssio');
                $this->cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->cnx->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            }catch(Exception $e){
                die('Erreur: ' . $e->getMessage());
            }
            return $this->cnx;
        }

        public function fermerConnexion()
        {
            $this->cnx = null;
        }

        public function inscrireEnBase($tbl_valeur)
        {
            // var_dump($tbl_valeur);exit;
            $sql = "INSERT INTO adherent (nom, prenom, mail, mdp, num_tel, conducteur) VALUES (?,?,?,?,?,?);";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute($tbl_valeur);
        }

        public function verifUtilisateur($email)
        {
            $sql = "SELECT * FROM adherent WHERE mail LIKE ? ;";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute(array($email));
            $utilisateur = $rqt->fetchALL(PDO::FETCH_OBJ);
            return $utilisateur;
        }

        public function getUtilisateur($id_adh)
        {           
            $sql = "SELECT * FROM adherent WHERE id_adh LIKE ?;";            
            $rqt = $this->cnx->prepare($sql);            
            $rqt->execute(array($id_adh));           
            $utilisateur = $rqt->fetchALL(PDO::FETCH_OBJ);
            return $utilisateur;
        }

        public function getUtilisateurs()
        {
            $sql = "SELECT * FROM adherent WHERE verifie = 0;";            
            $rqt = $this->cnx->prepare($sql);            
            $rqt->execute();           
            $utilisateurs = $rqt->fetchALL(PDO::FETCH_OBJ);
            return $utilisateurs;
        }

        public function modificationUtilisateur($tbl_valeur)
        {
            $sql = "UPDATE adherent SET nom=?, prenom=?, mail=?, mdp=?, num_tel=?, conducteur=? WHERE mail LIKE ?;";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute($tbl_valeur);
        }

        public function verificationUtilisateur($id)
        {
            $sql = "UPDATE adherent SET verifie = 1 WHERE id_adh like ?";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute(array($id));
        }
    }
?>