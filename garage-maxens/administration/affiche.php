<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

?>




<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Liste des véhicules au garage</title>
    </head>
    <body>
        <h1>Liste des véhicules en vente</h1>
        <p><a href="page_admin_acceuille.php">RETOUR</a></p>       <?php
        include "connexion.php";        $sql ="SELECT * FROM vehicule";
        //echo $sql;        //POUR AFFICHER LE TABLEAU
        echo '<table border="5">';
        $listevehicule = $connexion->query($sql);
        echo '<tr><th>Immatricualation</th><th>Marque</th><th>Modèle</th><th>Année de mise en circulation</th><th>Prix</th><th>Rentré au garage</th><th>Chevaux fiscaux</th><th>Description du Véhicule</th></tr>';
        while ($vehicule = $listevehicule->fetch_assoc()) {
            echo '<tr>';
            echo '<td>'.$vehicule['immatriculation'].'</td><td>'.$vehicule['marque'].'</td><td>'.$vehicule['modele'].'</td><td>'.$vehicule['anneecircu'].'</td><td>'.$vehicule['prix'].'</td><td>'.$vehicule['rtrgarage'].'</td><td>'.$vehicule['cvfiscaux'].'</td><td>'.$vehicule['description_vehic'].'</td>';
            echo '</tr>';
        }        echo '</table>';
        $connexion->close();
        ?>
    </body>
</html>