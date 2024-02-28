<?php
	session_start();
	require_once '../db_config.php';
  $progressPercentage = 0;
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
      <div class="container-wrapper-genially" style="position: relative; min-height: 400px; max-width: 100%;">
          <video class="loader-genially" autoplay="autoplay" loop="loop" playsinline="playsInline" muted="muted" style="position: absolute;top: 45%;left: 50%;transform: translate(-50%, -50%);width: 80px;height: 80px;margin-bottom: 10%">
              <source src="https://static.genial.ly/resources/loader-default.mp4" type="video/mp4" />Your browser does not support the video tag.
           </video>
          <div id="65b80079bb938300148f1d22" class="genially-embed" style="margin: 0px auto; position: relative; height: auto; width: 100%;">
          </div>
      </div>
  <?php  if (isset($_SESSION['logged_user'])) { ?>
    <form action="traitement_progression.php" method="post">
      <button id="submitProgress">J'ai terminé</button>
      <input type="hidden" name="module" value="module2" />
    </form>
    <form action="traitement_progression_undo.php" method="post">
      <button id="submitProgress">J'ai pas terminé</button>
      <input type="hidden" name="module" value="module2" />
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

        <script src="../style/style.js"></script>
    </body>
</html>
