<?php

    class Securite_Controlleur
    {
        public $securite_modele;

        public function __construct()
        {
            include_once("modele/SecuriteModele.php");
            $this->securite_modele = new Securite_Modele();
            $this->securite_modele->getConnexion();
        }

        public function Securite()
        {
            if (isset($_GET['action'])){
                switch($_GET['action'])
                {
                    case 'verifie':
                        $action = $this->securite_modele->verificationUtilisateur(htmlspecialchars($_GET['user']));
                        header('Location: index.php?controlleur=Securite&action=administration');
                        break;

                    case 'administration':
                        $action = $this->securite_modele->getUtilisateurs();
                        include_once('vues/vue_administration.php');
                        break;

                    case 'profile':   
                        include_once('vues/vue_profile.php');
                        break;

                    case 'modification_bd':
                        session_start();
                        $tbl_valeur = array(htmlspecialchars($_POST['nom']), htmlspecialchars($_POST['prenom']), htmlspecialchars($_POST['email']), password_hash(htmlspecialchars($_POST['mdp']), PASSWORD_DEFAULT), htmlspecialchars($_POST['num_tel']), htmlspecialchars($_POST['conducteur']), htmlspecialchars($_POST['email']));
                        $action = $this->securite_modele->modificationUtilisateur($tbl_valeur);
                        $action = $this->securite_modele->getUtilisateur($_SESSION['id_adh']);

                        foreach($action as $utilisateur)
                        {
                            $hash_mdp = $utilisateur->mdp;
                            $nom = $utilisateur->nom;
                            $prenom = $utilisateur->prenom;
                            $email = $utilisateur->mail;
                            $type = $utilisateur->type;
                            $num_tel = $utilisateur->num_tel;
                            $date_creation = $utilisateur->date_creation;
                            $conducteur = $utilisateur->conducteur;
                            $verifie = $utilisateur->verifie;
                        }

                        $_SESSION['nom'] = $nom;
                        $_SESSION['prenom'] = $prenom;
                        $_SESSION['email'] = $email;
                        $_SESSION['type'] = $type;
                        $_SESSION['mdp'] = $hash_mdp;
                        $_SESSION['num_tel'] = $num_tel;
                        $_SESSION['date_creation'] = $date_creation;
                        $_SESSION['conducteur'] = $conducteur;
                        $_SESSION['connecte'] = "oui";
                        $_SESSION['verifie'] = $verifie;

                        header('Location: index.php');
                        break;

                    case 'inscription':
                        include('vues/vue_inscription.php');
                        break;

                    case 'inscription_bd': 
                        $tbl_valeur = array(htmlspecialchars($_POST['nom']), htmlspecialchars($_POST['prenom']), htmlspecialchars($_POST['email']), password_hash(htmlspecialchars($_POST['mdp']), PASSWORD_DEFAULT), htmlspecialchars($_POST['num_tel']), htmlspecialchars($_POST['conducteur']));
                        $action = $this->securite_modele->inscrireEnBase($tbl_valeur);
                        header('Location: index.php');
                        break;

                    case 'identification_bd': 
                        $action = $this->securite_modele->verifUtilisateur(htmlspecialchars($_POST['email']));

                        foreach($action as $utilisateur)
                        {
                            $id_adh = $utilisateur->id_adh;
                            $hash_mdp = $utilisateur->mdp;
                            $nom = $utilisateur->nom;
                            $prenom = $utilisateur->prenom;
                            $email = $utilisateur->mail;
                            $type = $utilisateur->type;
                            $num_tel = $utilisateur->num_tel;
                            $date_creation = $utilisateur->date_creation;
                            $conducteur = $utilisateur->conducteur;
                            $verifie = $utilisateur->verifie;
                        }

                        if(password_verify($_POST['mdp'], $hash_mdp))
                        {
                            session_start();
                            $_SESSION['id_adh'] = $id_adh;
                            $_SESSION['nom'] = $nom;
                            $_SESSION['prenom'] = $prenom;
                            $_SESSION['email'] = $email;
                            $_SESSION['type'] = $type;
                            $_SESSION['mdp'] = $hash_mdp;
                            $_SESSION['num_tel'] = $num_tel;
                            $_SESSION['date_creation'] = $date_creation;
                            $_SESSION['conducteur'] = $conducteur;
                            $_SESSION['connecte'] = "oui";
                            $_SESSION['verifie'] = $verifie;
                            
                            header('Location: index.php');
                        }

                        else
                        {
                            header('Location: index.php?controlleur=Securite&error=1');
                        }
                        break;

                    case 'deconnexion':
                        session_start();
                        session_destroy();
                        header('Location: index.php');
                        break;
                }                
            }else{
                include_once 'vues/vue_identification.php';                    

                if(isset($_GET['error'])){
                    if($_GET['error'] == 1)
                    {
                        echo 'Mauvais Mot de passe ou identifiant';
                    }
                }
            }
        }
    }



?>