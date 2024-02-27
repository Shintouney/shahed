<!doctype html>
<html>
	<head>
		<title>Eveil ZooLangues</title>
        <link rel="icon" type="image/x-icon" href="medias/logo-petit.png">
		<link rel="StyleSheet" type="text/css" href="../../style/style.css"/>
		<meta charset="utf-8" />
	</head>
    <body id="body-accueil" class="page-simple">
        <?php
            session_start();
            if(!isset($_SESSION['logged_user'])) :
        ?>
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
                      <img src="../../medias/connexion.png" alt="Se connecter" height="50" width="50">
                      Connexion
                  </a>
                  <div class="sous-menu" id="login-sous-menu">
                      <a href="connexion.php">Se connecter</a>
                      <a href="creation.php">Créer un compte</a>
                  </div>
                </div>
            </div>
        </header>
                <div id="pageConnexion">
                    <section id="sectionConnexion">
                        <h1>
                            Connexion
                        </h1>
                        <?php
                            if(isset($_SESSION['erreur_connexion'])) {
                                echo $_SESSION['erreur_connexion'];
                                unset($_SESSION['erreur_connexion']);
                            }
                        ?>
                        <form method="post" action="traitement_connexion.php">
                            <label for="pseudoConnexion" id="labelPseudoConnexion">
                                Nom d'utilisateur :
                            </label>
                            <input type="text" name="pseudoConnexion" id="pseudoConnexion" required>
                            <br><br>
                            <label for="mdpConnexion" id="labelMdpConnexion">
                                Mot de passe :
                            </label>
                            <input type="password" name="mdpConnexion" id="mdpConnexion" required>
                            <br><br>
                            <input type="submit" value="Je me connecte" id="sumbitConnexion">
                        </form>
                    </section>
                </div>
            <?php else : ?>

            <?php
                header('Location: profil.php');
            ?>

        <?php
            endif;
        ?>
    </body>
    <script src="../../style/style.js"></script>
</html>
