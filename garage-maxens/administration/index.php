<?php

include("config.php");

function logConnection($identifiant, $status) {
    $logFile = 'logs/connections.log'; // Chemin vers le fichier de log des connexions
    
    date_default_timezone_set('Pacific/Noumea'); // Définir le fuseau horaire sur UTC+11
    
    $date = date('Y-m-d H:i:s'); // Date et heure de la connexion
    $ipAddress = $_SERVER['REMOTE_ADDR']; // Adresse IP de l'utilisateur
    $userAgent = $_SERVER['HTTP_USER_AGENT']; // Navigateur utilisé par l'utilisateur

    // Format du message de log
    $logMessage = "[$date] $status: Tentative de connexion pour l'identifiant '$identifiant' (IP: $ipAddress, Navigateur: $userAgent)\n";

    // Créer le dossier de logs s'il n'existe pas encore
    if (!file_exists(dirname($logFile))) {
        mkdir(dirname($logFile), 0777, true);
    }

    // Ajouter le message au fichier log
    file_put_contents($logFile, $logMessage, FILE_APPEND);
}

$message = '';

if (isset($_POST['identifiant']) && isset($_POST['password'])) {
    $identifiant = $_POST['identifiant'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM compte WHERE identifiant = :identifiant";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['identifiant' => $identifiant]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // Connexion réussie
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_identifiant'] = $identifiant;

        logConnection($identifiant, 'SUCCESS'); // Enregistrement de la connexion réussie
        header('Location: page_admin_acceuille.php');
        exit();
    } else {
        // Connexion échouée
        $message = 'Mauvais identifiants';
        logConnection($identifiant, 'FAIL'); // Enregistrement de la tentative échouée
    }
}
?>




<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.login-container {
    max-width: 400px;
    margin: 100px auto;
    background-color: #fff;
    padding: 20px 30px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

h2 {
    margin-top: 0;
    color: #333;
}

label {
    display: block;
    margin-bottom: 8px;
    color: #555;
}

input[type="text"], input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}

input[type="submit"] {
    background-color: #007BFF;
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

p {
    color: red;
    font-weight: bold;
}

    </style>
</head>
<body>

<div class="login-container">
    <h2>Connexion</h2>

    <?php if (!empty($message)): ?>
        <p style="color:red"><?= $message ?></p>
    <?php endif; ?>

    <form action="index.php" method="post">
        <div>
            <label for="identifiant">Nom d'utilisateur:</label>
            <input type="text" id="identifiant" name="identifiant">
        </div>

        <div>
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password">
        </div>

        <div>
            <input type="submit" value="Se connecter">
        </div>
    </form>
</div>

</body>
</html>