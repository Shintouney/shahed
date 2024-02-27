<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Eveil ZooLangues</title>
    <link rel="StyleSheet" type="text/css" href="../style/style.css"/>
      <link rel="icon" type="image/x-icon" href="../medias/logo-petit.png">
    <meta charset="utf-8" />
</head>
<body>
  <header>
      <div id="logo">
          <a href="../index.php">
              <img src="../medias/Logo.png" height="90">
          </a>
      </div>
      <div class="deroule-menu" id="ressources">
          <a href="ressources.php"><button class="deroule-menu">Ressources</button></a>
          <div class="sous-menu">
              <a href="ressources.php#approches-plurielles">Les Approches Plurielles</a>
              <a href="ressources.php#evl">L'éveil aux langues</a>
              <a href="ressources.php#applications">Contextes d'applicaiton</a>
              <a href="ressources.php#plus-loin">Ressources pour aller plus loin</a>
          </div>
      </div>
      <a href="explication.php" id="explication"><button>Notre Site</button></a>
      <div class="deroule-menu" id="biblio">
          <a href="biblio.php"><button class="deroule-menu">Bibliothèque</button></a>
          <div class="sous-menu">
              <a href="biblio-lire.php">Commencer à lire</a>
          </div>
      </div>
        <div id="login">
          <div  class="deroule-menu">
            <a href="connexion.php">
              <?php if(isset($_SESSION['logged_user'])): ?>
                  <img src="avatar.php" alt="Avatar" height="50" width="50">
              <?php else: ?>
                  <img src="../medias/connexion.png" alt="Se connecter" height="50" width="50">
              <?php endif; ?>
              <?php echo isset($_SESSION['logged_user']) ? htmlspecialchars($_SESSION['logged_user']) : 'Connexion'; ?>
            </a>
          <?php if (isset($_SESSION['logged_user'])) { ?>
            <div class="sous-menu" id="login-sous-menu">
                <a href="profil.php">Profil</a>
                <a href="profil.php">Se deconnecter</a>
            </div>
            <?php } else { ?>
              <div class="sous-menu" id="login-sous-menu">
                  <a href="connexion.php">Se connecter</a>
                  <a href="creation.php">Créer un compte</a>
              </div>
            <?php } ?>
      </div>
  </header>
