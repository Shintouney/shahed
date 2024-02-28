<?php
session_start();
require_once '../db_config.php'; // Assumes this file correctly sets up the mysqli connection

if (isset($_SESSION['logged_user'])):
?>

<?php include('header.php'); ?>

<!doctype html>
<html>
	<head>
                <div id="creation">
                <section id="sectionCreation">
                        <h1>
                            Créer un compte
                        </h1>
                        <?php
                            if(isset($_SESSION['erreur_creation'])) {

                                echo $_SESSION['erreur_creation'];
                                unset($_SESSION['erreur_creation']);

                            }
                        ?>
        
                        <form method="post" action="traitement_creation.php">
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
