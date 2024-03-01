<?php
session_start();
?>
<?php include('header.php'); ?>

<!doctype html>
<html>
	<head>
		<title>livre</title>
        <link rel="icon" type="image/x-icon" href="../medias/logo-petit.png">
		<meta charset="utf-8" />

        <link rel="StyleSheet" type="text/css" href="../style/style.css"/>
    
    </head>
    <body>
        
        <main>
        <div style="position: relative; width: 100%; max-width: 100%; height: auto; margin: auto;">
            <img src="../medias/ouvrir.png" style="width: 100%; height: auto;" alt="E-Learning Image">
            <a href="modules/module1.php?langue=anglais" style="position: absolute; top: 16%; left: 67%; width: 13%; height: 7%; display: block;"></a>
            <!-- <input type="checkbox" style="position: absolute; top: 17vh; left: 57vw;"/> Ajustez left et top comme nécessaire -->
            
            <a href="modules/module2.php?langue=allemand" style="position: absolute; top: 34%; left: 66%; width: 14%; height: 6%; display: block;"></a>
            <!-- <input type="checkbox" style="position: absolute; top: 34%; left: 57%;"/> --> <!-- Ajustez left et top comme nécessaire -->
            
            <a href="modules/module3.php?langue=arabe" style="position: absolute; top: 47%; left: 66%; width: 14%; height: 6%; display: block;"></a>
            <!-- <input type="checkbox" style="position: absolute; top: 47%; left: 57%;"/> --> <!-- Ajustez left et top comme nécessaire -->
            
            <a href="modules/module4.php?langue=portugais" style="position: absolute; top: 60%; left: 65%; width: 14%; height: 8%; display: block;"></a>
            <!-- <input type="checkbox" style="position: absolute; top: 62%; left: 57%;"/> --> <!-- Ajustez left et top comme nécessaire -->
        </div>




        </main>
        <footer>

        </footer>
        <script src="../style/style.js"></script>
    </body>
</html>
