<?php
session_start();
?>
<?php include('header.php'); ?>
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

    </body>
    <script src="../../style/style.js"></script>
</html>
