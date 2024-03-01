<?php
  session_start();
  require_once 'db_config.php'; // Assumes this file correctly sets up the mysqli connection
?>

<?php include('header.php'); ?>
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
                        <a href="pages/systeme-de-connexion/connexion.php">Se connecter </a>
                    </div>
                </div>
            </section>
            <section class="footer">
                <div id="footer">
                    <a href="pages/mentions-legales.php"><img id="mentionsLegales" src="medias/mentionsLegales.png" alt="Mentions Légales" /></a>
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
