<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Un petit garage</title>
    <link rel="stylesheet" href="css/index_page.css" />
</head>
<body>
    <p ><h1 class="centre"><i>LE GARAGE</i></h1></p>

    
    <nav style="float:right">
        <a href="administration">Connexion</a>
    </nav>
<center>
    <!--Pour choisir une marque-->
    <form action = 'index.php' method ='POST'>
Marque : <select name='marqueChoix'>
<?php
include "client.php";
$sql = 'SELECT DISTINCT marque FROM vehicule';
$listemarque = $connexion->query($sql);

while ($marque = $listemarque->fetch_assoc()) {
    echo "<option value='".$marque['marque']."'>".$marque['marque'];
    echo '</option>';
}
?>


<input type="hidden" name="recherche" id="recherche" value="true"/>
<input type="submit" value="Rechercher"/> </form>

<form>
    <button type="submit">Reinitialiser filtre</button>
</form>
    <!--Pour afficher le tableau-->

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
            
            if($recherche==true){
                $sql ="SELECT `marque`,`modele`,`anneecircu`,`prix`,`rtrgarage`,`cvfiscaux`,`description_vehic` 
                FROM `vehicule` 
                WHERE `marque`='$marqueChoix'; ";
            } 
            
            /*elseif ($recherche==false) {
                $sql ="SELECT * 
                FROM `vehicule`
                WHERE `marque`= `marque`;";
            }*/

            else {
                $sql ="SELECT * 
                FROM `vehicule` 
                WHERE `marque`= `marque`; ";
            }
            //echo $sql;        //POUR AFFICHER LE TABLEAU
            echo '<table border="5">';
            $listevehicule = $connexion->query($sql);
            echo '<th>Marque</th><th>Modèle</th><th>Année de mise en circulation</th><th>Prix</th><th>Rentré au garage</th><th>Chevaux fiscaux</th><th>Description du Véhicule</th></tr>';
            while ($vehicule = $listevehicule->fetch_assoc()) {
                echo '<tr>';
                echo '<td>'.$vehicule['marque'].'</td><td>'.$vehicule['modele'].'</td><td>'.$vehicule['anneecircu'].'</td><td>'.$vehicule['prix'].'</td><td>'.$vehicule['rtrgarage'].'</td><td>'.$vehicule['cvfiscaux'].'</td><td>'.$vehicule['description_vehic'].'</td>';
                echo '</tr>';
            }        
            echo '</table>';
            $connexion->close();
            
        ?>
    </center>
</body>
</html>