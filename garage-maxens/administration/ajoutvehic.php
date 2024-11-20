
<?php

session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

?>

<?php // Parti pour ajouter l'image au dossier
// Dossier cible où l'image sera stockée
$targetDir = "../images/voiture/";

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer le nouveau nom de fichier spécifié par l'utilisateur
    $newFileName = $_POST['immatriculation'];
    // Vérifier si une image a été téléchargée
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // Informations sur l'image téléchargée
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileType = $_FILES['image']['type'];
        $fileOriginalName = $_FILES['image']['name'];

        // Extraire l'extension du fichier
        $fileExtension = pathinfo($fileOriginalName, PATHINFO_EXTENSION);

        // Vérifier que le fichier est une image valide
        $allowedTypes = ['jpg'];
        if (in_array(strtolower($fileExtension), $allowedTypes)) {
            // Construire le chemin final avec le nouveau nom et l'extension d'origine
            $finalFileName = $newFileName . '.' . $fileExtension;
            $targetFilePath = $targetDir . $finalFileName;

            // Déplacer le fichier téléchargé vers le dossier cible avec le nouveau nom
            if (!move_uploaded_file($fileTmpPath, $targetFilePath)) {
                echo "Erreur lors du téléchargement de l'image.";
            } 
        } else {
            echo "Type de fichier non valide. Seules l'extensions  JPG est autorisée.";
        }
    } else {
        echo "Aucune image valide n'a été téléchargée.";
    }
}
?>

<?php
include "connexion.php";
$immatriculation=$_POST['immatriculation'];
$marque=$_POST['marque'];
$modele=$_POST['modele'];
$anneecircu=$_POST['anneecircu'];
$prix=$_POST['prix'];
$rtrgarage=$_POST['rtrgarage'];
$cvfiscaux=$_POST['cvfiscaux'];
$description=$_POST['description'];


$sql = "INSERT INTO vehicule(immatriculation, marque, modele, anneecircu, prix, rtrgarage, cvfiscaux, description_vehic) VALUES ('$immatriculation', '$marque', '$modele', '$anneecircu', '$prix', '$rtrgarage', '$cvfiscaux', '$description');"; // la requête doit être sur une seule ligne
$connexion->query($sql); 
if(!$connexion->error){echo 'les donnée ont bien été inséré dans la base de données<br>';}
mysqli_close($connexion);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout</title>
</head>
<body>
<p><a href="page_admin_acceuille.php">Retour page d'acceuil</a><p>
</body>
</html>