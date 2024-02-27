<?php
    session_start();
?>

<!doctype html>
<html>
	<head>
		<title>Eveil ZooLangues</title>
        <link rel="icon" type="image/x-icon" href="../medias/logo-petit.png">
		<meta charset="utf-8" />
        <!--carousel code-bootstrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!--end boostrap-->
        <link rel="StyleSheet" type="text/css" href="../style/style.css"/>
    
    </head>
    <body>
        <header>
            <div id="logo">
                <a href="../index.html">
                    <img src="../medias/Logo.png" height="90">
                </a>
            </div>
            <div class="deroule-menu" id="ressources">
                <a href="ressources.html"><button class="deroule-menu">Ressources</button></a>
                <div class="sous-menu">
                    <a href="ressources.html#approches-plurielles">Les Approches Plurielles</a>
                    <a href="ressources.html#evl">L'éveil aux langues</a>
                    <a href="ressources.html#applications">Contextes d'applicaiton</a>
                    <a href="ressources.html#plus-loin">Ressources pour aller plus loin</a>
                </div>
            </div>
            <a href="explication.html" id="explication"><button>Notre Site</button></a>
            <div class="deroule-menu" id="biblio">
                <a href="biblio.html"><button class="deroule-menu">Bibliothèque</button></a>
                <div class="sous-menu">
                    <a href="biblio-lire.html">Commencer à lire</a>
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
            <section class="biblio-lire">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <div class="carousel-inner">
                        <div class="carousel-item active w-100">
                            <div class="livre-block">
                                <a href="modules/module1.php"><img src="../medias/livre1.png" class="d-block livre" alt="Slide 1"></a>
                            </div>
                        </div>
                        <div class="carousel-item w-100">
                            <div class="livre-block">
                                <a href="modules/module2.php"><img src="../medias/livre2.png" class="d-block livre" alt="Slide 2"></a>
                            </div>
                        </div>
                        <div class="carousel-item w-100">
                            <div class="livre-block">
                                <img src="../medias/livre3.png" class="d-block livre" alt="Slide 2">
                            </div>
                        </div>
                        <div class="carousel-item w-100">
                            <div class="livre-block">     
                                <img src="../medias/livre4.png" class="d-block livre" alt="Slide 2">
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </section>
        </main>
        <footer>

        </footer>
        <script src="../style/style.js"></script>
    </body>
</html>
