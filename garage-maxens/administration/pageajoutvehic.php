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
    <title>Ajout de Véhicule</title>
</head>
<body>
    <p><a href="page_admin_acceuille.php">Retour page d'acceuil</a><p>
        <form method="POST" action="ajoutvehic.php" enctype="multipart/form-data">
        Immatriculation :<input type='text' name='immatriculation' id =’immatriculation’ required/> <br><br>       
        Marque :<input type='text' name='marque' id =’marque’ required/> <br><br>
        Modéle :<input type='text' name='modele' id =’modele’ required/> <br><br>
        Année de mise en circulation (AAAA-MM-JJ) :<input type='date' name='anneecircu' id =’anneecircu’ required/> <br><br>
        Prix :<input type='text' name='prix' id =’prix’ required/> <br><br>
        Date de rentrée au garage (AAAA-MM-JJ) :<input type='date' name='rtrgarage' id =’rtrgarage’ required/> <br><br>
        Chevaux fiscaux :<input type='text' name='cvfiscaux' id =’cvfiscaux’ required/> <br><br>
        Description :<textarea name='description' id ='description'cols="40" rows="5"required> </textarea> <br><br>
        Choisissez une image :<input type="file" name="image" required><br><br>
    
        <input type="submit" value="AJOUTER"/> </form>
        </form>
</body>
</html>