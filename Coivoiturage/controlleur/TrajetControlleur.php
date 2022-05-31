<?php

    class Trajet_Controlleur
    {
        public $trajet_modele;

        public function __construct()
        {
            include_once("modele/TrajetModele.php");
            $this->trajet_modele = new Trajet_Modele();
            $this->trajet_modele->getConnexion();
        }

        public function Trajet()
        {
            if(isset($_GET['action']))
            {
                switch($_GET['action'])
                {
                    case 'ajouter':
                        include_once('vues/vue_ajout.php');
                        break;

                    case 'ajout_bd':
                        // var_dump($_POST['date_trajet']);exit;
                        $tbl_valeur = array(htmlspecialchars($_POST['date_trajet']),htmlspecialchars($_POST['place_dispo']),htmlspecialchars($_POST['du_lycee']),htmlspecialchars($_POST['id_user']),htmlspecialchars($_POST['ville']));
                        $trajet = $this->trajet_modele->ajoutTrajet($tbl_valeur);
                        header('Location: index.php?controlleur=Trajet');
                        break;

                    case 'supprimer':
                        $trajet = $this->trajet_modele->supprimerTrajet(htmlspecialchars($_GET['id_trajet']));
                        header('Location: index.php?controlleur=Trajet');
                        break;

                    case 'afficher_trajet':
                        $trajet = $this->trajet_modele->getTrajet(htmlspecialchars($_GET['id_trajet']));
                        include_once('vues/vue_trajet.php');
                        break;

                    case 'modifier':
                        $trajet = $this->trajet_modele->getTrajet(htmlspecialchars($_GET['id_trajet']));
                        include_once('vues/vue_modifier.php');
                        break;

                    case 'modifier_bd':
                        
                        $tbl_valeur = array(htmlspecialchars($_POST['place_dispo']),htmlspecialchars($_POST['du_lycee']),htmlspecialchars($_POST['ville']),htmlspecialchars($_GET['id_trajet']));
                        
                        $trajet = $this->trajet_modele->modifierTrajet($tbl_valeur);
                        
                        header('Location: index.php?controlleur=Trajet');
                        break;

                    case 'rejoindre_trajet':
                        session_start();
                        //ICI REGARDER PK LA VARIABLE DE SESSION POUR L ID NE RENVOIE PAS L ID 
                        var_dump($_SESSION['id_adh']);exit;
                        $trajet = $this->trajet_modele->rejoindreTrajet($_SESSION['id_adh'], $_GET['id_trajet']);
                        header('Location: index.php?controlleur=Trajet');
                        break;
                }
            }else{
                $trajets = $this->trajet_modele->getTrajets();
                include_once('vues/vue_liste_trajet.php');
            }
        }
    }

?>