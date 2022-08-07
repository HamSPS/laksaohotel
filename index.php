<?php
session_start();
$path = "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include $path . 'layouts/style.php';
    ?>

    <title>ໂຮງແຮງສະບາຍດີຫຼັກ 20</title>
</head>

<body>
    <?php
    include $path . 'layouts/member/navbar.php';
    ?>

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="<?= $path ?>assets/images/carousel-1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?= $path ?>assets/images/carousel-2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?= $path ?>assets/images/carousel-3.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <main class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 blog-main">
                    <div class="blog-post">
                        <h2 class="blog-post-title">ກ່ຽວກັບໂຮງແຮມ</h2>
                        <!-- Edit -->
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam nulla, odio aut quam beatae reprehenderit ipsum neque quaerat non excepturi eligendi provident impedit vitae dolor facere tempora molestiae cupiditate adipisci!</p>
                        <!-- end Edit -->
                       
                    </div><!-- /.blog-post -->

                </div><!-- /.blog-main -->

                <aside class="col-md-4 blog-sidebar">
                    <div class="p-3 mb-3 bg-light rounded">
                        <h4 class="font-italic">ປະຕິທິນ</h4>
                        <div id="calendar"></div>
                    </div>

                    <div class="p-3">
                        <h4 class="font-italic">ຕິດຕາມ</h4>
                        <ol class="list-unstyled">
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Facebook</a></li>
                        </ol>
                    </div>
                </aside><!-- /.blog-sidebar -->

            </div>
        </div>
    </main>

    <?php
    include $path . 'layouts/member/footer.php';
    ?>
    <?php
    include $path . 'layouts/script.php';
    ?>

    <script>
        $(document).ready(function(){
            $('#calendar').datetimepicker({format:'L',inline:true})
        })
    </script>
</body>

</html>