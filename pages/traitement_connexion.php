<?php
session_start();
require_once '../db_config.php';

if (isset($_POST['pseudoConnexion']) && isset($_POST['mdpConnexion'])) {
    $pseudoConnexion = $_POST['pseudoConnexion']; // Directly use the POST value
    $mdpConnexion = $_POST['mdpConnexion']; // Directly use the POST value

    if (!empty($pseudoConnexion)) {
        try {
					$db = getDBConnection(); // Ensure this returns a mysqli connection

					$sql = "SELECT * FROM users WHERE pseudo = ?";
					$stmt = $db->prepare($sql);

					// Check if the statement was prepared correctly
					if ($stmt === false) {
							throw new Exception('Prepare failed: ' . $db->error);
					}

					$stmt->bind_param('s', $pseudoConnexion); // 's' specifies the variable type => 'string'
					$stmt->execute();

					$result = $stmt->get_result(); // Get the result set from the prepared statement

					// Use mysqli_num_rows to check the number of rows
					if ($result->num_rows > 0) {
							$data = $result->fetch_assoc(); // Fetch data as an associative array

							// Verify password
							if (password_verify($mdpConnexion, $data['password'])) {
									$_SESSION['logged_user'] = $data['pseudo'];
									header('Location: profil.php');
									exit();
							} else {
									$_SESSION['erreur_connexion'] = '<p style="color:red;">Mot de passe incorrect.</p>';
									header('Location: connexion.php');
									exit();
							}
					} else {
							$_SESSION['erreur_connexion'] = '<p style="color:red;">Aucun utilisateur trouvé avec ce pseudo.</p>';
							header('Location: connexion_ratee.php');
							exit();
					}

        } catch (PDOException $e) {
            $_SESSION['erreur_connexion'] = '<p style="color:red;">Erreur de connexion: ' . $e->getMessage() . '</p>';
            header('Location: connexion_ratee.php');
            exit();
        }
    } else {
        $_SESSION['erreur_connexion'] = '<p style="color:red;">Le pseudo ne peut pas être vide.</p>';
        header('Location: connexion_ratee.php'); // Redirect to the error page
        exit();
    }
}
?>

