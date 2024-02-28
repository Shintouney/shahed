<?php
	session_start();
	require_once '../db_config.php';
?>
<?php include('header.php'); ?>

        <main>
        </br>
				<?php
					if (isset($_SESSION['logged_user'])) {
							// Pseudonyme de l'utilisateur connecté
							$userPseudo = $_SESSION['logged_user'];

							// Obtenir la connexion à la base de données
							$conn = getDBConnection();

							// Préparer la requête SQL pour récupérer les modules en fonction du pseudo de l'utilisateur
							$sql = "SELECT module1, module2, module3, module4 FROM users WHERE pseudo = ?";

							// Préparer la commande
							$stmt = $conn->prepare($sql);

							if (!$stmt) {
									// Handle error here
									echo "Error preparing statement: " . $conn->error;
									exit;
							}

							// Lier le paramètre userPseudo
							$stmt->bind_param('s', $userPseudo);

							// Exécuter la requête
							$stmt->execute();

							// Récupérer les résultats
							$result = $stmt->get_result();
							if ($result->num_rows > 0) {
									$userModules = $result->fetch_assoc();

									// Calculer le taux de progression
									$totalModules = 4; // Nombre total de modules
									$completedModules = $userModules['module1'] + $userModules['module2'] + $userModules['module3'] + $userModules['module4'];

									// Calculer le pourcentage de progression
									$progressPercentage = ($completedModules / $totalModules) * 100;

									echo "Taux de progression: $progressPercentage%";
							} else {
									echo "Aucune donnée trouvée pour l'utilisateur spécifié.";
							}

							// Fermer la commande
							$stmt->close();
					} else {
							// Gérer le cas où l'utilisateur n'est pas connecté
							echo "Vous devez être connecté pour voir votre progression.";
					}
        ?>
				<h4 id="progressBarProgressionId"><?php echo $progressPercentage?>%</h4>
        <?php  if (isset($_SESSION['logged_user'])) { ?>
          <h3>Barre de progression</h3>
            <div id="progressContainer" class="progress-container">
                <div id="progressBar" class="progress-bar">
                    <span id="progressValue" class="progress-value">0%</span>
                </div>
            </div>
        <?php } ?>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
        <main>
            <div class="module-container">
                <div style="position: relative; padding-bottom: 56.25%; padding-top: 0; height: 0;">
                    <iframe title="QUIZ HISTORIA" frameborder="0" width="1200" height="675" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" src="https://view.genial.ly/65b7fc2c177daf0014c5f847" type="text/html" allowscriptaccess="always" allowfullscreen="true" scrolling="yes" allownetworking="all"></iframe>
                </div> 
            </div>
        </main>
    <?php  if (isset($_SESSION['logged_user'])) { ?>
			<form action="traitement_progression.php" method="post">
        <button id="submitProgress">J'ai terminé</button>
				<input type="hidden" name="module" value="module1" />
			</form>
    <form action="traitement_progression_undo.php" method="post">
      <button id="submitProgress">J'ai pas terminé</button>
      <input type="hidden" name="module" value="module1" />
    </form>
    <?php } ?>
    <div class="module-container">
  <script>
document.getElementById('progressContainer').addEventListener('click', function() {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "traitement_progression.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            console.log(this.responseText);
        }
    }
    xhr.send("param1=valeur1&param2=valeur2"); // Paramètres POST si nécessaire
});
      (function (d) { var js, id = "genially-embed-js", ref = d.getElementsByTagName("script")[0]; if (d.getElementById(id)) { return; } js = d.createElement("script"); js.id = id; js.async = true; js.src = "https://view.genial.ly/static/embed/embed.js"; ref.parentNode.insertBefore(js, ref); }(document));
      window.addEventListener("message", (event) => {
          // Always check the origin of the data!
          if (event.origin.startsWith("https://view.genial.ly")) {
              // Assuming Genially sends specific messages you want to capture
              // For example, checking for a custom completion message (this is hypothetical as it depends on Genially's implementation)
              console.log(event.data);
              if (event.data === "GeniallyQuizCompleted") {
                  console.log("Quiz is completed!");
                  // Handle the quiz completion here
                  // You can insert any action you want to take after the quiz is completed
              }
          } else {
              return; // Ignore messages from unknown origins
          }
      });
			var progressionElement = document.getElementById('progressBarProgressionId');
			var percentage = parseInt(progressionElement.innerText);
			updateProgressBar(percentage);

			function updateProgressBar(percentage) {
				var progressBar = document.getElementById('progressBar');
				var progressValue = document.getElementById('progressBarProgressionId');
				var proValue = document.getElementById('progressValue');
				progressBar.style.width = percentage + '%';
				progressValue.innerText = percentage + '%';
				proValue.innerHTML = percentage + '%';
			}

    </script>
    </div>
  </main>

        <script src="../../style/style.js"></script>
    </body>
</html>
