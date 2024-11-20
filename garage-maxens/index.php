<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Un petit garage</title>
    <link rel="stylesheet" href="css\index_page.css" />
    <link rel="website icon" type="webp" href="images/icon.webp">
</head>
<body>
    <header>
        <h1 class="centre"><i>LE GARAGE</i></h1>
        <nav>
            <a href="administration">Connexion</a>
        </nav>
    </header>

    <center>
        <!-- Formulaire pour choisir une marque -->
        <form action="index.php" method="POST">
            <label for="marqueChoix">Marque :</label>
            <select name="marqueChoix" id="marqueChoix">
                <?php
            //Garde la marque choisie sur la liste d�roulante
            if (isset($_POST['marqueChoix'])) {
                $marqueChoix = $_POST['marqueChoix'];
                echo "<option value='".$marqueChoix."'>".$marqueChoix."</option>";
            }

                include "client.php";
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

        <form action="index.php" method="POST">
            <button type="submit">Réinitialiser filtre</button>
        </form>

        <!-- Pour afficher le tableau -->
        <?php
        include "client.php";    

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

        // Affichage du tableau
        echo '<div class="table-container">';
        echo '<table border="5" class="car-table">';
        echo '<thead>';
        echo '<tr><th>Marque</th><th>Modèle</th><th>Année de mise en circulation</th><th>Prix</th><th>Rentré au garage</th><th>Chevaux fiscaux</th><th>Description du Véhicule</th><th>Image</th></tr>';
        echo '</thead>';
        echo '<tbody>';

        $listevehicule = $connexion->query($sql);
        while ($vehicule = $listevehicule->fetch_assoc()) {
            echo '<tr>';
            echo '<td>'.$vehicule['marque'].'</td>';
            echo '<td>'.$vehicule['modele'].'</td>';
            echo '<td>'.$vehicule['anneecircu'].'</td>';
            echo '<td>'.$vehicule['prix'].' €</td>';
            echo '<td>'.$vehicule['rtrgarage'].'</td>';
            echo '<td>'.$vehicule['cvfiscaux'].'</td>';
            echo '<td>'.$vehicule['description_vehic'].'</td>';
            echo '<td><img src="images/voiture/' .$vehicule['immatriculation'].'.jpg " width="125" height="75"></td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
        echo '</div>';

        $connexion->close();
        ?>
    </center>
</body>
</html>
