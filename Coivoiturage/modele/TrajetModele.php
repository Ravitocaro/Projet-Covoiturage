<?php 
// ini_set('display_errors', '1');
// ini_set('error_reporting', E_ALL);

    class Trajet_Modele
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

        public function getTrajets()
        {
            $sql = "SELECT * FROM trajet WHERE place_dispo > 0;";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute();
            $listetrajet = $rqt->fetchALL(PDO::FETCH_OBJ);
            return $listetrajet;
        }

        public function getTrajet($id)
        {
            $sql = "SELECT * FROM trajet t INNER JOIN adherent a on a.id_adh = t.id_user WHERE id_trajet LIKE ?;";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute(array($id));
            $listetrajet = $rqt->fetchALL(PDO::FETCH_OBJ);
            return $listetrajet;
        }

        public function supprimerTrajet($id)
        {
            $sql = "DELETE FROM trajet WHERE id_trajet LIKE ?;";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute(array($id));
        }

        public function modifierTrajet($tbl_valeur)
        {
            $sql = "UPDATE trajet SET place_dispo=?, du_lycee=?, ville=?  WHERE id_trajet=?";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute($tbl_valeur);
        }

        public function ajoutTrajet($tbl_valeur)
        {
            $sql = "INSERT INTO trajet(date_trajet, place_dispo, du_lycee, id_user, ville) VALUES (?,?,?,?,?);";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute($tbl_valeur);
        }
        
        public function rejoindreTrajet($id_adh, $id_trajet)
        {
            $sql = "INSERT INTO rejoint (id_adh, id_trajet) VALUES (?,?);";
            $sql2 = "UPDATE trajet SET place_dispo = place_dispo - 1 WHERE id_trajet = ?";
            
            $rqt = $this->cnx->prepare($sql);
            $rqt2 = $this->cnx->prepare($sql2);
            var_dump($id_adh); exit;
            $rqt->execute(array($id_adh, $id_trajet));
            $rqt2->execute(array($id_trajet));
        }
        
    }
?>