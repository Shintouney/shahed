<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Eveil ZooLangues</title>
    <link rel="StyleSheet" type="text/css" href="style/style.css"/>
    <meta charset="utf-8" />
</head>
<body>
  <header>
      <div id="logo">
          <a href="index.php">
              <img src="medias/Logo.png" height="90">
          </a>
      </div>
      <div class="deroule-menu" id="ressources">
          <a href="pages/ressources.php"><button class="deroule-menu">Ressources</button></a>
          <div class="sous-menu">
              <a href="pages/ressources.php#approches-plurielles">Les Approches Plurielles</a>
              <a href="pages/ressources.php#evl">L'éveil aux langues</a>
              <a href="pages/ressources.php#applications">Contextes d'applicaiton</a>
              <a href="pages/ressources.php#plus-loin">Ressources pour aller plus loin</a>
          </div>
      </div>
      <a href="pages/explication.php" id="explication"><button>Notre Site</button></a>
      <div class="deroule-menu" id="biblio">
          <a href="pages/biblio.php"><button class="deroule-menu">Bibliothèque</button></a>
          <div class="sous-menu">
              <a href="pages/biblio-lire.php">Commencer à lire</a>
          </div>
      </div>
        <div id="login">
          <div  class="deroule-menu">
            <a href="connexion.php">
              <?php if(isset($_SESSION['logged_user'])): ?>
                  <img src="pages/avatar.php" alt="Avatar" height="50" width="50">
              <?php else: ?>
                  <img src="../medias/connexion.png" alt="Se connecter" height="50" width="50">
              <?php endif; ?>
              <?php echo isset($_SESSION['logged_user']) ? htmlspecialchars($_SESSION['logged_user']) : 'Connexion'; ?>
            </a>
          <?php if (isset($_SESSION['logged_user'])) { ?>
            <div class="sous-menu" id="login-sous-menu">
                <a href="pages/profil.php">Profil</a>
                <a href="pages/profil.php">Se deconnecter</a>
            </div>
            <?php } else { ?>
              <div class="sous-menu" id="login-sous-menu">
                  <a href="pages/connexion.php">Se connecter</a>
                  <a href="pages/creation.php">Créer un compte</a>
              </div>
            <?php } ?>
      </div>
  </header>
