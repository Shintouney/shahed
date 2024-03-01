<?php
session_start();

$_SESSION['post_modif'] = "Vos informations ont bien été modifié";

require_once '../../db_config.php';

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
