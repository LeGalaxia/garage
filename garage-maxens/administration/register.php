<?php

session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

include("config.php");

$message = '';

if (isset($_POST['identifiant']) && isset($_POST['password'])) {
    $identifiant = $_POST['identifiant'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);


    $sql = "INSERT INTO compte (identifiant, password) VALUES (:identifiant, :password)";
    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute(['identifiant' => $identifiant, 'password' => $password]);

    if ($result) {
        $message = 'Inscription réussie!';
        header('Location: index.php');
    } else {
        $message = 'Erreur lors de l\'inscription.';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <style>
        /* Utilisez le même CSS que login.php */
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

input[type="text"], input[type="password"], input[type="email"] {
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
    <h2>Inscription</h2>

    <?php if (!empty($message)): ?>
        <p style="color:red"><?= $message ?></p>
    <?php endif; ?>

    <form action="register.php" method="post">
        <div>
            <label for="identifiant">Nom d'utilisateur:</label>
            <input type="text" id="identifiant" name="identifiant" required>
        </div>

        <div>
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div>
            <input type="submit" value="S'inscrire">
        </div>
    </form>
</div>

</body>
</html>