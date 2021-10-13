<?php

    class Controleur_securite
    {
        public $modele_securite;

        public function __construct()
        {
            include_once("modele/modele_securite.php");
            $this->modele_securite = new Modele_securite();
            $this->modele_securite->getConnection();
        }


        public function Securite()
        {
            switch($_GET['action'])
            {
                //Affichage de la vue inscription
                case "inscription":
                    include 'vue/vue_inscription.php';
                    break;

                //Inscription de l'utilisateur dans la base grâce au formulaire 
                case "inscription_db":
                    $tbl_valeur = array($_POST['nom'], $_POST['email'], password_hash($_POST['mdp'], PASSWORD_DEFAULT));
                    $action = $this->modele_securite->inscrireEnBase($tbl_valeur);
                    header('Location: index.php');
                    break;
                
                //Vérification de l'identité de la personne dans la base qui essaie de se connecter
                case "identification_db":
                    $nom = $_POST['nom'];
                    $action = $this->modele_securite->verifUser($nom);
                
                    foreach($action as $user)
                    {
                        $hash = $user->mdp;
                        $nom = $user->nom;
                        $type = $user->type;
                    }
                    

                    if (password_verify($_POST['mdp'], $hash))
                    {
                        session_start();
                        $_SESSION['nom']= $nom;
                        $_SESSION['type'] = $type;
                        $_SESSION['cnx'] = 'oui';
                    
                        header('Location: index.php');
                    }
                
                    else
                    {
                        echo 'mauvais mot de passe';
                    }
                    break;

                //Deconnection de l'utilisateur 
                case "deconnexion": 
                    session_start();
                    session_destroy();
                    header('Location: index.php');
                    break;

                //Affichage par défault de la page de connection lorsqu'on appelle le controleur de sécurité
                default:
                    include 'vue/vue_identification.php';
                    break;
                    
            }
        }
    }



?>