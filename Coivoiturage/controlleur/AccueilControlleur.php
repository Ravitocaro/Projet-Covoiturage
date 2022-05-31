<?php

    class Acceuil_Controlleur
    {
        public $accueil_modele;

        public function __construct()
        {}

        public function Accueil()
        {
            include 'vues/vue_accueil.php';
        }
    }
?>