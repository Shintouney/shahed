<?php
session_start();
?>
<?php include('../layout/header.php'); ?>
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
