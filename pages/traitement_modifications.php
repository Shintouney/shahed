<?php
session_start();

// Connexion à la base de données
try {

    $pdo = new PDO('mysql:host=localhost:3306;dbname=sadanic;charset=utf8', 'sadanic', 'Raga54543//*');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

    die("Erreur de connexion à la base de données: " . $e->getMessage());

}

// on nettoye les données récupérées (ça ajoute des guillements simples ??)
function nettoyer_donnees($donnees) {
    global $pdo;
    return $pdo->quote(htmlspecialchars(trim($donnees)));
}

// Récupère les valeurs envoyées par le formulaire
$nom = nettoyer_donnees($_POST['nom']);
$prenom = nettoyer_donnees($_POST['prenom']);
$classe = nettoyer_donnees($_POST['classe']);


// Requête SQL pour mettre à jour les informations de l'utilisateur
$sql = "UPDATE users SET nom = :nom, prenom = :prenom, classe = :classe WHERE pseudo = :logged_user_pseudo";

// Préparation de la requête
$stmt = $pdo->prepare($sql);

// Liaison des paramètres
$stmt->bindParam(':nom', $nom);
$stmt->bindParam(':prenom', $prenom);
$stmt->bindParam(':classe', $classe);
$stmt->bindParam(':logged_user_pseudo', $_SESSION['logged_user']);

// Exécution de la requête
try {

    $stmt->execute();

    $_SESSION['modifOK'] = 'Informations mises à jour avec succès !';
    $_SESSION['logged_user'] = $pseudo;
    header('Location: profil.php');

} catch (PDOException $e) {

    $_SESSION['modifNON'] = 'Erreur lors de la mise à jour des informations: ' . $e->getMessage();
    $_SESSION['logged_user'] = $pseudo;
    header('Location: profil.php');

}
?>