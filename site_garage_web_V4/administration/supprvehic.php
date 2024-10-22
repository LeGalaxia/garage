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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppression</title>
</head>
<body>
<p><a href="pagesuprim.php">Retour</a><p>
<form method="POST" action="supprvehicconfirm.php">


Veuillez confirmez votre choix de supprimer Immatriculation :<input type='text' name='immatriculation' id =’immatriculation’ value=<?php echo $immatriculation=$_POST['immatriculation'];;?> readonly> <br><br>
<input type="submit" value="Supprimer"/> </form>
    </form>



</body>
</html>