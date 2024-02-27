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
            </div>            <div id="login">       
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
                <div id="creation">
                <section id="sectionCreation">
                        <h1>
                            Créer un compte
                        </h1>

                        <form method="post" action="traitement_creation.php" enctype="multipart/form-data">
                            <label for="pseudoCreation" id="labelPseudoCreation">
                                Nom d'utilisateur
                            </label>
                            <input type="text" name="pseudoCreation" id="pseudoCreation" maxlength="25" required>

                            <label for="mdpCreation" id="labelMdpCreation">
                                Mot de passe
                            </label>
                            <input type="password" name="mdpCreation" id="mdpCreation" required>

                            <label for="nomCreation" id="labelNomCreation">
                                Nom
                            </label>
                            <input type="text" name="nomCreation" id="nomCreation" required>

                            <label for="prenomCreation" id="labelPrenomCreation">
                                Prénom
                            </label>
                            <input type="text" name="prenomCreation" id="prenomCreation" required>

                            <label for="dateAnnivCreation" id="labelDateAnnivCreation">
                                Date d'anniversaire
                            </label>
                            <input type="date" name="dateAnnivCreation" id="dateAnnivCreation" required>

                            <label for="classeCreation">En quelle classe es-tu ?</label>
                            <select name="classeCreation">
                                <option value="cp">CP</option>
                                <option value="ce1">CE1</option>
                                <option value="ce2">CE2</option>
                                <option value="cm1">CM1</option>
                                <option value="cm2">CM2</option>
                                <option value="autre">Autre</option>
                            </select>

                            <label for="avatar">Avatar:</label>
                            <input type="file" name="avatar" id="avatar" accept="image/*">

                            <input type="submit" value="Je crée un compte" id="sumbitCreation">
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
