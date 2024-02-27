<?php
	session_start();
	require_once '../../db_config.php';
?>

<!doctype html>
<html>
  <head>
    <title>Eveil ZooLangues</title>
        <link rel="icon" type="image/x-icon" href="../../medias/logo-petit.png">
    <link rel="StyleSheet" type="text/css" href="../../style/style.css"/>
    <meta charset="utf-8" />
  </head>
    <body>
        <header>
            <div id="logo">
                <a href="../../index.php">
                    <img src="../../medias/Logo.png" height="90">
                </a>
            </div>
            <div class="deroule-menu" id="ressources">
                <a href="../ressources.php"><button class="deroule-menu">Ressources</button></a>
                <div class="sous-menu">
                    <a href="../ressources.php#approches-plurielles">Les Approches Plurielles</a>
                    <a href="../ressources.php#evl">L'éveil aux langues</a>
                    <a href="../ressources.php#applications">Contextes d'applicaiton</a>
                    <a href="../ressources.php#plus-loin">Ressources pour aller plus loin</a>
                </div>
            </div>
            <a href="../explication.php" id="explication"><button>Notre Site</button></a>
            <div class="deroule-menu" id="biblio">
                <a href="../biblio.php"><button class="deroule-menu">Bibliothèque</button></a>
                <div class="sous-menu">
                    <a href="../biblio-lire.php">Commencer à lire</a>
                </div>
            </div>            
            <div id="login">
              <div  class="deroule-menu">
                <a href="connexion.php">
                  <?php if(isset($_SESSION['logged_user'])): ?>
                      <img src="avatar.php" alt="Avatar" height="50" width="50">
                  <?php else: ?>
                      <img src="../../medias/connexion.png" alt="Se connecter" height="50" width="50">
                  <?php endif; ?>
                  <?php echo isset($_SESSION['logged_user']) ? htmlspecialchars($_SESSION['logged_user']) : 'Connexion'; ?>
                </a>
                <div class="sous-menu" id="login-sous-menu">
                    <a href="connexion.php">Se connecter</a>
                    <a href="creation.php">Créer un compte</a>
                </div>
              </div>
          </div>
        </header>
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
        <?php  if ($_SESSION['logged_user']) { ?>
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
    <?php  if ($_SESSION['logged_user']) { ?>
			<form action="traitement_progression.php" method="post">
        <button id="submitProgress">J'ai terminé</button>
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
