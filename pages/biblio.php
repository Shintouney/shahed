<?php
    session_start();
?>
<?php include('../layout/header.php'); ?>
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
