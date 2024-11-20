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
        <link rel="stylesheet" href="../css/affiche.css">
    </head>
    <body>
        <h1>Liste des véhicules en vente</h1>
        <p><a href="page_admin_acceuille.php">RETOUR</a></p>

        <!-- Formulaire pour choisir une marque -->
        <form action="affiche.php" method="POST">
            <label for="marqueChoix">Marque :</label>
            <select name="marqueChoix" id="marqueChoix">
                <?php
                //Garde la marque choisie sur la liste d�roulante
            if (isset($_POST['marqueChoix'])) {
                $marqueChoix = $_POST['marqueChoix'];
                echo "<option value='".$marqueChoix."'>".$marqueChoix."</option>";
            }

                include "connexion.php";
                $sql = 'SELECT DISTINCT marque FROM vehicule';
                $listemarque = $connexion->query($sql);

                while ($marque = $listemarque->fetch_assoc()) {
                    if($marque['marque']!=$marqueChoix){
                    echo "<option value='".$marque['marque']."'>".$marque['marque']."</option>";
                    }
                }
                ?>            </select>
            <input type="hidden" name="recherche" id="recherche" value="true"/>
            <input type="submit" value="Rechercher"/>
        </form>

        <form action="affiche.php" method="POST">
            <button type="submit">Réinitialiser filtre</button>
        </form>

        <!-- Pour afficher le tableau -->
        <?php
        include "connexion.php";    

        // Initialiser les variables avec des valeurs par défaut
        $marqueChoix = "";
        $recherche = "";

        // Vérifier si les données POST existent
        if (isset($_POST['marqueChoix'])) {
            $marqueChoix = $_POST['marqueChoix'];
        }
        if (isset($_POST['recherche'])) {
            $recherche = $_POST['recherche'];
        }

        // Construire la requête SQL en fonction de la sélection
        if ($recherche == "true") {
            $sql = "SELECT *
                    FROM `vehicule` 
                    WHERE `marque` = '$marqueChoix';";
        } else {
            $sql = "SELECT *
                    FROM `vehicule`;";
        }
        
        //POUR AFFICHER LE TABLEAU
        echo '<table border="5" class="admin-table">';
        $listevehicule = $connexion->query($sql);
        echo '<tr><th>Immatricualation</th><th>Marque</th><th>Modèle</th><th>Année de mise en circulation</th><th>Prix</th><th>Rentré au garage</th><th>Chevaux fiaux</th><th>Description du Véhicule</th><th>Image</th></tr>';
        while ($vehicule = $listevehicule->fetch_assoc()) {
            echo '<tr>';
            echo '<td>'.$vehicule['immatriculation'].'</td>
                <td>'.$vehicule['marque'].'</td>
                <td>'.$vehicule['modele'].'</td>
                <td>'.$vehicule['anneecircu'].'</td>
                <td>'.$vehicule['prix'].' €</td>
                <td>'.$vehicule['rtrgarage'].'</td>
                <td>'.$vehicule['cvfiscaux'].'</td>
                <td>'.$vehicule['description_vehic'].'</td>';
            echo '<td><img src="../images/voiture/' .$vehicule['immatriculation']. '.jpg " width="125" height="75"></td>';
            echo '</tr>';
        }        echo '</table>';
        $connexion->close();
        ?>
    </body>
</html>