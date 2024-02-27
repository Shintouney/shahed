<?php
    session_start();
?>

<!doctype html>
<html>
	<head>
		<title>Eveil ZooLangues</title>
        <link rel="icon" type="image/x-icon" href="medias/logo-petit.png">
		<link rel="StyleSheet" type="text/css" href="style/style.css"/>
		<meta charset="utf-8" />
	</head>
    <body id="body-accueil" class="page-simple">
        <header>
            <div id="logo">
                <a href="index.php" id="logo-image">
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
                      <img src="pages/connexion-et-profil/avatar.php" alt="Avatar" height="50" width="50">
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
            <section class="main-page">
                <div id="image-accueil">
                    <div id="overlay"></div>
                    <div id="logo-accueil">
                        <img src="medias/Logo.png" height="160">
                    </div>
                    <div class="tree-bouton" id="tree-explication">
                        <a href="pages/explication.php">C'est quoi <br>l'éveil aux langues ?</a>
                    </div>
                    <div class="tree-bouton" id="tree-ressources">
                        <a href="pages/ressources.php">Ressources <br>Supplémentaires</a>
                    </div>
                    <div class="tree-bouton" id="tree-biblio">
                        <a href="pages/biblio.php">Aller à la <br>Bibliothèque</a>
                    </div>
                    <div class="tree-bouton" id="tree-login">
                        <a href="pages/connexion-et-profil/connexion.php">Se connecter </a>
                    </div>
                </div>
            </section>
            <section class="footer">
                <div id="footer">
                    <a href="mentions-legales.php"><img id="mentionsLegales" src="medias/mentionsLegales.png" alt="Mentions Légales" /></a>
                    <a href="mailto:eveilzoolangues@outlook.com"><img id="contact" src="medias/contact.png" alt="Contact"/></a>
                </div>  
                <div id="scroll_to_top">
                    <a href="#top"><img src="medias/retourEnHaut.png" alt="Retourner en haut"/></a>
                </div>
            </section>
        </main>
        <script src="style/style.js"></script>
    </body>
</html>
