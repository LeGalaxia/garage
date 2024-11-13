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
    <title>Modifier Véhicule</title>
</head>
<body>
<p><a href="page_admin_acceuille.php">Retour page d'acceuil</a><p>
        <form method="POST" action="ajoutmodif.php">
        Immatriculation :<input type='text' name='immatriculation' id =’immatriculation’ value=<?php echo $immatriculation=$_POST['immatriculation'];;?> /> <br><br>       
        Marque :<input type='text' name='marque' id =’marque’ value=<?php $immatriculation=$_POST['immatriculation']; include "connexion.php"; $sql="SELECT * FROM vehicule WHERE immatriculation='$immatriculation';"; $cible=$connexion->query($sql); $parti=$cible->fetch_assoc(); echo $parti['marque'] ; ?> /> <br><br>
        Modéle :<input type='text' name='modele' id =’modele’ value=<?php $immatriculation=$_POST['immatriculation']; include "connexion.php"; $sql="SELECT * FROM vehicule WHERE immatriculation='$immatriculation';"; $cible=$connexion->query($sql); $parti=$cible->fetch_assoc(); echo $parti['modele'] ; ?> /> <br><br>
        Année de mise en circulation (AAAA-MM-JJ) :<input type='date' name='anneecircu' id =’anneecircu’ value=<?php $immatriculation=$_POST['immatriculation']; include "connexion.php"; $sql="SELECT * FROM vehicule WHERE immatriculation='$immatriculation';"; $cible=$connexion->query($sql); $parti=$cible->fetch_assoc(); echo $parti['anneecircu'] ; ?> /> <br><br>
        Prix :<input type='text' name='prix' id =’prix’ value=<?php $immatriculation=$_POST['immatriculation']; include "connexion.php"; $sql="SELECT * FROM vehicule WHERE immatriculation='$immatriculation';"; $cible=$connexion->query($sql); $parti=$cible->fetch_assoc(); echo $parti['prix'] ; ?> /> <br><br>
        Date de rentrée au garage (AAAA-MM-JJ) :<input type='date' name='rtrgarage' id =’rtrgarage’ value=<?php $immatriculation=$_POST['immatriculation']; include "connexion.php"; $sql="SELECT * FROM vehicule WHERE immatriculation='$immatriculation';"; $cible=$connexion->query($sql); $parti=$cible->fetch_assoc(); echo $parti['rtrgarage'] ; ?> /> <br><br>
        Chevaux fiscaux :<input type='text' name='cvfiscaux' id =’cvfiscaux’ value=<?php $immatriculation=$_POST['immatriculation']; include "connexion.php"; $sql="SELECT * FROM vehicule WHERE immatriculation='$immatriculation';"; $cible=$connexion->query($sql); $parti=$cible->fetch_assoc(); echo $parti['cvfiscaux'] ; ?> /> <br><br>
        Description :<textarea name='description' id ='description'cols="40" rows="5" value=<?php $immatriculation=$_POST['immatriculation']; include "connexion.php"; $sql="SELECT * FROM vehicule WHERE immatriculation='$immatriculation';"; $cible=$connexion->query($sql); $parti=$cible->fetch_assoc(); echo $parti['description_vehic'] ; ?> > </textarea> <br><br>
        <input type="submit" value="Modifier"/> </form>
        </form>
</body>
</html>