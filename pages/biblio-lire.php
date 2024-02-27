<?php
session_start();
?>
<?php include('header.php'); ?>
<script src="../style/style.js"></script>
<meta charset="utf-8" />
    <!--carousel code-bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!--end boostrap-->
    <link rel="StyleSheet" type="text/css" href="../style/style.css"/>
  
    <meta charset="utf-8" />
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
                        <a href="module1.php"><img src="../medias/livre1.png" class="d-block livre" alt="Slide 1"></a>
                    </div>
                </div>
                <div class="carousel-item w-100">
                    <div class="livre-block">
                        <a href="module2.php"><img src="../medias/livre2.png" class="d-block livre" alt="Slide 2"></a>
                    </div>
                </div>
                <div class="carousel-item w-100">
                    <div class="livre-block">
                        <img src="livre3.png" class="d-block livre" alt="Slide 2">
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
    </body>
</html>
