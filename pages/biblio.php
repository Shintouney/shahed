<?php
    session_start();
?>

<!doctype html>
<html>
	<head>
		<title>Eveil ZooLangues</title>
        <link rel="icon" type="image/x-icon" href="../medias/logo-petit.png">
		<link rel="StyleSheet" type="text/css" href="../style/style.css"/>
		<meta charset="utf-8" />
	</head>
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
                <a href="connexion-et-profil/profil.php">
                    <img src="../medias/connexion.png" alt="Se connecter" height="50" width="50">
                    Connexion
                </a>
                <div class="sous-menu" id="login-sous-menu">
                    <a href="connexion-et-profil/connexion.php">Se connecter</a>
                    <a href="connexion-et-profil/creation.php">Créer un compte</a>
                </div>
            </div>
        </div>
    </header>
        <main class="page-simple">
            <div id="image-biblio">
                <div id="biblio-explication">
                    Bienvenue à la bibiliothèque ! <br>
                    Ici, vous pouvez découvrir des histoires écrites dans plein de langues. Bien qu'il y ait des langues que tu ne connais peut-être pas, tu trouveras qu'avec un peu d'aide, tu pourras quand-même déchifffer des mots.
                </div>
                <button id="bouton-biblio"><a href="biblio-lire.php">Commencer à lire</a></button>
            </div>
            <section class="footer">
                <div id="footer">
                    <a href="mentions-legales.php"><img id="mentionsLegales" src="../medias/mentionsLegales.png" alt="Mentions Légales" /></a>
                    <a href="mailto:eveilzoolangues@outlook.com"><img id="contact" src="../medias/contact.png" alt="Contact"/></a>
                </div>  
                <div id="scroll_to_top">
                    <a href="#top"><img src="../medias/retourEnHaut.png" alt="Retourner en haut"/></a>
                </div>
            </section>
        </main>
        <script src="../style/style.js"></script>
    </body>
</html>