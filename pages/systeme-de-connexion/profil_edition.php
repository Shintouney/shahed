<?php
session_start();
require_once '../../db_config.php'; // Assumes this file correctly sets up the mysqli connection

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
              $_SESSION['post_modif'];
            } ?>
          <form id="form_modif_profil" action="traitement_modifications.php" method="post" enctype="multipart/form-data">
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

							<label for="classe">En quelle classe es-tu ?</label>
							<select name="classe" id="classe">
									<option value="cp" <?php if ($row['classe'] == 'cp') echo 'selected'; ?>>CP</option>
									<option value="ce1" <?php if ($row['classe'] == 'ce1') echo 'selected'; ?>>CE1</option>
									<option value="ce2" <?php if ($row['classe'] == 'ce2') echo 'selected'; ?>>CE2</option>
									<option value="cm1" <?php if ($row['classe'] == 'cm1') echo 'selected'; ?>>CM1</option>
									<option value="cm2" <?php if ($row['classe'] == 'cm2') echo 'selected'; ?>>CM2</option>
									<option value="autre" <?php if ($row['classe'] == 'autre') echo 'selected'; ?>>Autre</option>
							</select>

							<label for="avatar">Avatar:</label>
							<input type="file" name="avatar" id="avatar" accept="image/*">

              <input type="submit" value="Mettre à jour">
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
					window.location.href = '../../index.php';
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
