<?php

function logConnection($identifiant, $status) {
    $logFile = 'logs/connections.log'; // Chemin vers le fichier de log des connexions

    date_default_timezone_set('Pacific/Noumea'); // Définir le fuseau horaire sur UTC+11

    $date = date('Y-m-d H:i:s'); // Date et heure de la connexion
    $ipAddress = $_SERVER['REMOTE_ADDR']; // Adresse IP de l'utilisateur
    $userAgent = $_SERVER['HTTP_USER_AGENT']; // Navigateur utilisé par l'utilisateur

    // Format du message de log
    $logMessage = "[$date] $status: D�connexion pour l'identifiant '$identifiant' (IP: $ipAddress, Navigateur: $userAgent)\n";

    // Créer le dossier de logs s'il n'existe pas encore
    if (!file_exists(dirname($logFile))) {
        mkdir(dirname($logFile), 0777, true);
    }

    // Ajouter le message au fichier log
    file_put_contents($logFile, $logMessage, FILE_APPEND);
}

session_start();

$_SESSION['user_id'] = $user['id'];
$identifiant= $_SESSION['user_identifiant'];
logConnection($identifiant, 'SUCCESS'); // Enregistrement de la connexion réussie

// Supprimer toutes les variables de session.
$_SESSION = array();

// Si vous voulez détruire complètement la session, supprimez également
// le cookie de session.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finalement, détruire la session.
session_destroy();

// Rediriger vers la page de connexion.
header('Location: index.php');
exit;

?>