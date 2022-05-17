<?php include_once('vue_header.php')?>
    <section class="connexion">


    <h1 class="titre_form">Ajouter un trajet </h1>

    <div class="form">
        <form action="index.php?controlleur=Trajet&action=ajout_bd" method="POST">
            <input type="date" name="date_trajet" placeholder="Date du trajet" required>
            <input type="number" name="place_dispo" placeholder="Nombre de places disponibles" required>
            <input type="radio" id="r1" name="du_lycee" value="0" checked>
            <label for="r1"> Vers Lycée </label>
            <input type="radio" id="r2" name="du_lycee" value="1">
            <label for="r2"> Du Lycée </label>
            <input type="number" name="id_user" placeholder="id Conducteur" required>
            <input type="text" name="ville" placeholder="Ville" required>
            <input type="submit" name="submit" value="Ajouter le trajet">
        </form>
    </div>
    <a href="index.php?controlleur=Trajet">Retour</a>

    </section>