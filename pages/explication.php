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
        <main>
            <div id="explication-haut">
            <h1>Bienvenue à EveilZooLangues !</h1>

            </div>
            <section class="page-long">
                <p>Amusant et Éducatif, Diversité Linguistique, Accessible à Tous, EveilZoolangues est votre destination idéale pour éveiller la curiosité linguistique de vos enfants !
                </p>

                <p>Chez Zoolangue, nous utilisons l’éveil aux langue pour rendre l'apprentissage des langues une aventure amusante et captivante ! à travers notre plateforme, laissez votre enfant découvrire et apprendre les langues de manière ludique à travers le jeu éducatif !
                </p>
                <h2>Mais avant d’aller plus loin, c'est quoi l’éveil aux langues au juste ?</h2>

                <p>L’éveil aux langues, c’est comme être dans une grande bibliothèque, où chaque livre raconte une histoire. C’est explorer les mots, les sons, les cultures, tout en jouant et en s’amusant. C’est une aventure qui aura lieu quand vous décidez d’accepter la diversité qui vous entoure.
                </p>
                <p>L’éveil aux langues n’est pas le seul moyen qui existe pour découvrire les langues et les cultures, il faut savoir que l’éveil aux langues fait partie des approches pluriels, qui regroupent une liste de pratique pédagogique à savoir :
                </p>
                <ul>
                <li>Éveil aux langues</li>

                <li>Didactique intégrée</li>

                <li>Intercompréhension entre les langues parentes</li>

                <li>Approches interculturelles</li>
                </ul>
                <h2>Intérêt</h2>

                <p>Chez Zoolangue, notre mission est de montrer aux enfants toute la richesse culturel et linguistique à leurs dispotions, Nous voulons que lorsque les enfants arrivent aux collèges ne se limitent pas aux langues populaires et qu’ils aient une conscience linguistique éveillé et plus élargi, ainsi, nous mettons en avant des langues moins présente comme l’arabe, l’allemand et le portugais et bien d’autres.
                </p>
                <h2>Mais Globalement, comment ça marche ?</h2>

                <p>Notre application répond à une réalité concrète : en effet, le temps consacré à l'apprentissage des langues à l'école n'est souvent pas très grand. Et Pour de nombreux parents, cet apprentissage, essentiel pour l'enfant, commence tardivement, et manque de pratique. à ce sujet VivaLing qui est une académie de langues en ligne, recense les résultats sur l’apprentissage des langues en France, que nous partageons ici :
                </p>
                <div class="image">
                    <img src="../medias/Dulala-infographie.jpg" height="600" alt="infographique">
                </div>

                <p>De plus selon le site Éducation priorité : “ apprenant une ou plusieurs langues étrangères, les enfants développent une gymnastique intellectuelle qui les aidera dans tous les apprentissages. Cela développe en effet grandement l’ensemble de leurs capacités cognitives, des capacités essentielles pour acquérir toute forme d’apprentissage dans la vie.” Pour appuyer nos arguments, il serait intéressant pour vous chez public de voir une image représentative des impacts positif de l’apprentissage des langues étrangères sur le cerveau humain :
                </p>
                <div class="image">
                    <img src="../medias/cerveau.jpg" height="500" alt="bienfaits de l'apprentissage des langues">
                </div>
            </section>
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