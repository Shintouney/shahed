<?php
session_start();
require_once '../db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $connexion = getDBConnection();
	echo $_POST['module'];
	echo $_SESSION['logged_user'];
	updateModuleByPseudo($_SESSION['logged_user'], $_POST['module']);
}

function updateModuleByPseudo($pseudo, $columnName) {
		$allowedColumns = ['module1', 'module2', 'module3', 'module4'];
    if (!in_array($columnName, $allowedColumns)) {
        die("Nom de colonne non autorisé.");
    }
    $connexion = getDBConnection();

    $query = "UPDATE users SET $columnName = TRUE WHERE pseudo = ?";

    if ($stmt = $connexion->prepare($query)) {
        $stmt->bind_param("s", $pseudo);

        if ($stmt->execute()) {
            echo "Le module a été mis à jour avec succès pour l'utilisateur : " . $pseudo;
						header('Location: ' . $columnName . '.php');
        } else {
            echo "Erreur lors de la mise à jour de module2 pour l'utilisateur " . $pseudo . ": " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Erreur de préparation: " . $connexion->error;
    }

    $connexion->close();
}
?>
