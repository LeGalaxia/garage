<?php

session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

?>

<?php //Partie pour supprimer l'image du dossier
// Dossier contenant les images
$targetDir = "../images/voiture/"; // Remplacez par le dossier de votre choix

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer le nom de l'image à supprimer
    $imageName = $_POST['immatriculation'];

    // Ajouter les extensions possibles pour rechercher l'image
    $extensions = ['jpg', 'jpeg', 'png', 'gif'];
    $imageFound = false;

    foreach ($extensions as $extension) {
        $filePath = $targetDir . $imageName . '.' . $extension;
        if (file_exists($filePath)) {
            // Supprimer l'image si elle existe
            if (unlink($filePath)) {
                echo "L'image <strong>$imageName.$extension</strong> a été supprimée avec succès.";
            } else {
                echo "Erreur lors de la suppression de l'image <strong>$imageName.$extension</strong>.";
            }
            $imageFound = true;
            break;
        }
    }

    // Si aucune image correspondante n'a été trouvée
    if (!$imageFound) {
        echo "Aucune image nommée <strong>$imageName</strong> n'a été trouvée dans le dossier.";
    }
} else {
    echo "Formulaire non soumis.";
}
?>


<?php
include "connexion.php";

$immatriculation=$_POST['immatriculation'];



$sql = "DELETE FROM vehicule Where immatriculation='$immatriculation';"; // la requête doit être sur une seule ligne

$connexion->query($sql); 
if(!$connexion->error){echo 'le véhicule a bien été supprimer de la base de données<br>';}
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