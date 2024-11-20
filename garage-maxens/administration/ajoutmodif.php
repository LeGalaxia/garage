<?php

session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

?>

<?php // Parti pour modifier l'image au dossier
// Dossier cible où se trouve l'image à remplacer
$targetDir = "../images/voiture/";

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Nom du fichier à remplacer (sans extension)
    $imageToReplace = $_POST['immatriculation'];

    // Vérifier si l'image à remplacer existe dans le dossier
    $existingImagePath = $targetDir . $imageToReplace;

    // Trouver l'extension de l'image à remplacer
    $imageExtension = null;
    foreach (['jpeg', 'jpg', 'png', 'gif'] as $ext) {
        if (file_exists($existingImagePath . '.' . $ext)) {
            $imageExtension = $ext;
            break;
        }
    }

    if ($imageExtension !== null) {
        // Si l'image à remplacer existe, on récupère l'extension et on construit le chemin complet
        $existingImageFilePath = $existingImagePath . '.' . $imageExtension;

        // Vérifier si une nouvelle image a été téléchargée
        if (isset($_FILES['newImage']) && $_FILES['newImage']['error'] == 0) {
            // Récupérer le chemin temporaire du fichier téléchargé
            $newImageTmpPath = $_FILES['newImage']['tmp_name'];
            $newImageName = $_FILES['newImage']['name'];

            // Extraire l'extension du fichier téléchargé
            $newImageExtension = strtolower(pathinfo($newImageName, PATHINFO_EXTENSION));

            // Vérifier que l'extension du fichier est valide
            $allowedExtensions = ['jpg'];
            if (in_array($newImageExtension, $allowedExtensions)) {
                // Supprimer l'image existante
                unlink($existingImageFilePath);

                // Déplacer la nouvelle image en remplaçant l'ancienne
                $finalFilePath = $existingImagePath . '.' . $newImageExtension;
                if (move_uploaded_file($newImageTmpPath, $finalFilePath)) {
                    echo "L'image a été remplacée avec succès.";
                } else {
                    echo "Erreur lors du remplacement de l'image.";
                }
            } else {
                echo "Le fichier envoyé n'est pas une image valide. Formats autorisés : JPG.";
            }
        } else {
            echo "Aucune image n'a été téléchargée ou erreur lors du téléchargement.";
        }
    } else {
        echo "L'image à remplacer n'a pas été trouvée.";
    }
} else {
    echo "Aucun formulaire soumis.";
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


$sql = "UPDATE vehicule SET immatriculation='$immatriculation', marque='$marque', modele='$modele', anneecircu='$anneecircu', prix='$prix', rtrgarage='$rtrgarage', cvfiscaux='$cvfiscaux', description_vehic='$description' WHERE immatriculation='$immatriculation';"; // la requête doit être sur une seule ligne
$connexion->query($sql);
if(!$connexion->error){echo 'les donnée ont bien été inséré dans la base de données<br>';}
mysqli_close($connexion);

?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification</title>
</head>
<body>
<p><a href="page_admin_acceuille.php">Retour page d'acceuil</a><p>
</body>
</html>