  <?php
  session_start();
  require_once '../../db_config.php'; // Adjust the path as necessary
  require_once '../../vendor/autoload.php'; // Adjust the path as necessary

  // Cloudinary configuration
  use Cloudinary\Configuration\Configuration;
  use Cloudinary\Api\Upload\UploadApi;

  Configuration::instance([
      'cloud' => [
          'cloud_name' => 'dgjbng1b6',
          'api_key' => '244546622457232',
          'api_secret' => 'oTNAwI289bTrJZuBQbxN96yRCcc'
      ],
      'url' => [
          'secure' => true
      ]
  ]);

  // Helper function to clean input data
  function nettoyer_donnees($donnees) {
      return htmlspecialchars(trim($donnees));
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $connexion = getDBConnection();
      $pseudo = nettoyer_donnees($_POST["pseudoCreation"]);
      $passwordRaw = $_POST["mdpCreation"];
      $nom = nettoyer_donnees($_POST["nomCreation"]);
      $prenom = nettoyer_donnees($_POST["prenomCreation"]);
      $classe = nettoyer_donnees($_POST["classeCreation"]);

      try {
          $dateAnniv = new DateTime($_POST["dateAnnivCreation"]);
          $dateFormatted = $dateAnniv->format('Y-m-d');
      } catch (Exception $e) {
          $_SESSION['erreur_creation'] = 'Invalid date format.';
          header('Location: creation.php');
          exit();
      }

      $password = password_hash($passwordRaw, PASSWORD_DEFAULT);

      // Cloudinary upload
      $uploadedImageUrl = null;
      if (isset($_FILES["avatar"]["tmp_name"]) && $_FILES["avatar"]["tmp_name"] != '') {
          try {
              $upload = new UploadApi();
              $response = $upload->upload($_FILES["avatar"]["tmp_name"]);
              $uploadedImageUrl = $response['secure_url'];
          } catch (Exception $e) {
              $_SESSION['erreur_creation'] = 'Cloudinary Upload Failed: ' . $e->getMessage();
              header('Location: creation_ratee.php');
              exit();
          }
      }

      // Eden AI explicit content detection
      if ($uploadedImageUrl !== null) {
          $client = new \GuzzleHttp\Client();
          try {
            $response = $client->request('POST', 'https://api.edenai.run/v2/image/explicit_content', [
              'body' => json_encode([
                  'response_as_dict' => true,
                  'attributes_as_list' => false,
                  'show_original_response' => false,
                  'providers' => 'amazon',
                  'file_url' => $uploadedImageUrl,
              ]),
              'headers' => [
                  'accept' => 'application/json',
                  'authorization' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyX2lkIjoiNzYyN2JiYmUtNDE3Yy00YzIxLWI4MTAtYjY3NmI2M2NlY2ZhIiwidHlwZSI6ImFwaV90b2tlbiJ9.tRsUD6n4maMDujlMtfFLx-xdO7Wu5fdnWqFWlXY2M0M',
                  'content-type' => 'application/json',
              ],
          ]);
          $body = $response->getBody();
          $data = json_decode($body, true);
          $containsExplicitContent = false;
                  foreach ($data as $provider => $result) {
                      if (isset($result['items']) && is_array($result['items'])) {
                          foreach ($result['items'] as $item) {
                              if (isset($item['likelihood']) && $item['likelihood'] == 5) {
                                  $containsExplicitContent = true;
                                  break 2; // Exit both loops if explicit content is found
                              }
                          }
                      }
                  }

                  if ($containsExplicitContent) {
                      $_SESSION['erreur_creation'] = 'Image contains explicit content.';
                      header('Location: creation_ratee.php');
                      exit();
                  }
              } catch (\GuzzleHttp\Exception\GuzzleException $e) {
                  $_SESSION['erreur_creation'] = 'Error checking image content: ' . $e->getMessage();
                  header('Location: creation_ratee.php');
                  exit();
              }
          }
      // Check if user already exists
      if ($stmt = $connexion->prepare("SELECT * FROM users WHERE pseudo = ?")) {
          $stmt->bind_param("s", $pseudo);
          $stmt->execute();
          $result = $stmt->get_result();

          if ($result->num_rows > 0) {
              $_SESSION['erreur_creation'] = 'This username already exists or you already have an account.';
              header('Location: creation_ratee.php');
              exit();
          } else
              if ($insertStmt = $connexion->prepare("INSERT INTO users (pseudo, password, nom, prenom, date, classe, avatar) VALUES (?, ?, ?, ?, ?, ?, ?)")) {
                  $insertStmt->bind_param("sssssss", $pseudo, $password, $nom, $prenom, $dateFormatted, $classe, $uploadedImageUrl);

                  if ($insertStmt->execute()) {
                      $_SESSION['logged_user'] = $pseudo;
                      $_SESSION['image_url'] = $uploadedImageUrl;
                      header("Location: profil.php");
                      exit();
                  } else {
                      $_SESSION['erreur_creation'] = 'Insertion error: ' . $connexion->error;
                      header('Location: creation_ratee.php');
                      exit();
                  }

                  $insertStmt->close();
              }
          }

          $stmt->close();
      } else {
          $_SESSION['erreur_creation'] = 'Error preparing statement: ' . $connexion->error;
          header('Location: creation_ratee.php');
          exit();
      }

      $connexion->close();
  ?>

