<?php

    class Produit {
        public $id;
        public $nom;
        public $prix;

        public function __construct($id, $nom, $prix)
        {
            $this->id   = $id;
            $this->nom  = $nom;
            $this->prix = $prix;
        }
    }
?>
