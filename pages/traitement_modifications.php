<?php
session_start();

$_SESSION['post_modif'] = "Vos informations ont bien été modifié";

require_once '../db_config.php';

if (!isset($_SESSION['logged_user'])) {
    header('Location: connexion.php');
    exit();
}

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mysqli = getDBConnection();

    $pseudo = $_POST['pseudo'] ?? '';
    $password = $_POST['password'] ?? '';
    $nom = $_POST['nom'] ?? '';
    $prenom = $_POST['prenom'] ?? '';
    $date = $_POST['date'] ?? '';
    $classe = $_POST['classe'] ?? '';
    $avatar = $_POST['avatar'] ?? '';

    if (empty($pseudo) || empty($nom) || empty($prenom) || empty($date) || empty($classe)) {
        $_SESSION['modifNON'] = "Tous les champs requis doivent être remplis.";
        header('Location: profil.php');
        exit();
    }

    if (!empty($password)) {
        $password = password_hash($password, PASSWORD_DEFAULT); // Hashage du mot de passe
        $query = "UPDATE users SET pseudo=?, password=?, nom=?, prenom=?, date=?, classe=?, avatar=? WHERE pseudo=?";
    } else {
        $query = "UPDATE users SET pseudo=?, nom=?, prenom=?, date=?, classe=?, avatar=? WHERE pseudo=?";
    }
    
    if ($stmt = $mysqli->prepare($query)) {
        if (!empty($password)) {
            $stmt->bind_param("ssssssss", $pseudo, $password, $nom, $prenom, $date, $classe, $avatar, $_SESSION['logged_user']);
        } else {
            $stmt->bind_param("sssssss", $pseudo, $nom, $prenom, $date, $classe, $avatar, $_SESSION['logged_user']);
        }

        if ($stmt->execute()) {
            // Mise à jour réussie
            $_SESSION['modifOK'] = "Votre profil a été mis à jour avec succès.";
            $_SESSION['logged_user'] = $pseudo;
        } else {
            // Échec de la mise à jour
            $_SESSION['modifNON'] = "Erreur lors de la mise à jour du profil.";
        }
        $stmt->close();
    }
    $mysqli->close();
    // Redirection vers la page de profil
    header('Location: profil.php');
    exit();
}
?>
