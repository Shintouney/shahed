<?php
session_start();
require_once '../db_config.php'; // Assumes this file correctly sets up the mysqli connection

if (isset($_SESSION['logged_user'])):
?>

<?php include('header.php'); ?>

<main>
    <h1>Mon profil</h1>

    <?php
    if (isset($_SESSION['modifOK'])) {
        echo '<p class="message">' . $_SESSION['modifOK'] . '</p>';
        unset($_SESSION['modifOK']);
    }

    if (isset($_SESSION['modifNON'])) {
        echo '<p class="message">' . $_SESSION['modifNON'] . '</p>';
        unset($_SESSION['modifNON']);
    }

    $mysqli = getDBConnection(); // Use the function to establish a mysqli connection
    $logged_user_pseudo = $_SESSION['logged_user'];

    // Prepare the SQL statement using ? for the placeholder
    if ($stmt = $mysqli->prepare("SELECT * FROM users WHERE pseudo = ?")) {
        $stmt->bind_param("s", $logged_user_pseudo); // Bind the logged_user_pseudo variable

        // Execute the query
        $stmt->execute();

        // Bind the result to variables (if needed) or fetch directly
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>

            <?php if (isset($_SESSION['post_modif'])) {
              echo $_SESSION['post_modif'];
            } ?>
          <form id="form_modif_profil" action="traitement_modifications.php" method="post">
              <label for="pseudo">Pseudo:</label>
              <input type="text" id="pseudo" name="pseudo" value="<?php echo htmlspecialchars($row['pseudo']); ?>" required>

              <label for="password">Nouveau mot de passe:</label>
              <input type="password" id="password" name="password" placeholder="Laissez vide si inchangé">

              <label for="nom">Nom:</label>
              <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($row['nom']); ?>" required>

              <label for="prenom">Prénom:</label>
              <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($row['prenom']); ?>" required>

              <label for="date">Date de naissance:</label>
              <input type="date" id="date" name="date" value="<?php echo htmlspecialchars($row['date']); ?>" required>

              <label for="classe">Classe:</label>
              <input type="text" id="classe" name="classe" value="<?php echo htmlspecialchars($row['classe']); ?>" required>

              <label for="avatar">Lien de l'avatar:</label>
              <input type="text" id="avatar" name="avatar" value="<?php echo htmlspecialchars($row['avatar']); ?>" required>

              <input type="submit" value="Mettre à jour">
          </form>

						<!-- Button for showing the profile edit form -->
						<button id="modifInfosButton" class="profileBouton">Modifier mes informations personnelles</button>
						<!-- Button to cancel modification -->
						<button id="annulerButton" class="profileBouton">Annuler</button>

						<!-- Profile modification form -->
						<form id="form_modif_profil" action="traitement_modifications.php" method="post">
								<!-- Form fields and submission button remain unchanged -->
						</form>
            <?php
        } else {
            echo "No user found with the provided pseudo.";
        }

        $stmt->close(); // Close the statement
    }

    $mysqli->close(); // Close the mysqli connection
    ?>

</main>

<script>
	document.getElementById('logoutButton').addEventListener('click', function() {

			fetch('logout.php', {
					method: 'POST',
			})

			.then(response => {
					window.location.href = '../index.php';
			})

			.catch(error => {
					console.error('Erreur lors de la déconnexion:', error);
			});
	});


	// Script pour afficher/faire disparaître le formulaire

	document.getElementById('modifInfosButton').addEventListener('click', function() {

			document.getElementById('form_modif_profil').style.display='block';
			document.getElementById('annulerButton').style.display='inline-block';
			document.getElementById('gd_section_profil').style.display='none';
			document.getElementById('modifInfosButton').style.display='none';
			document.getElementById('logoutButton').style.display='none';

	});

	document.getElementById('annulerButton').addEventListener('click', function() {

			document.getElementById('form_modif_profil').style.display='none';
			document.getElementById('annulerButton').style.display='none';
			document.getElementById('gd_section_profil').style.display='flex';
			document.getElementById('modifInfosButton').style.display='inline-block';
			document.getElementById('logoutButton').style.display='inline-block';

	});
</script>
</body>
</html>

<?php else: ?>
    <?php header('Location: connexion.php'); ?>
<?php endif; ?>
