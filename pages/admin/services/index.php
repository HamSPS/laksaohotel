<?php
session_start();
$path = '../../../';
$title = "ການເຂົ້າພັກ";
$IsActive = 6;


if (!$_SESSION['user'] || $_SESSION == null) {
    header('location:' . $path);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ສະບາຍດີຫຼັກ 20</title>

    <?php
    include $path . 'layouts/style.php';
    ?>

    <style>
        .myBtn{
            width: 100%;
            max-width: 180px;
            height: 100vh;
            max-height: 180px;
            font-size: 1.5rem;
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            flex-direction: column;
            white-space: nowrap;
            background: #fff;
            box-shadow: 2px 2px 4px 1px rgba(0, 0, 0, .2);
        }
        .myBtn i{
            font-size: 2rem;
        }

        .myBtn:hover{
            font-size: 1.8rem;
            /* border: 1px solid #007bff; */
            color: #007bff;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= $path ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <?php include $path . 'layouts/navbar.php' ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include $path . 'layouts/sidebar.php' ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid ">
                        <div class="d-flex flex-column flex-md-row gap-5 flex-wrap mx-auto">
                            <a href="../booking/booking" class="myBtn btn mt-5 mx-md-5 mx-auto"><i class="text-primary fas fa-calendar-alt"></i> ຈອງຫ້ອງພັກ</a>
                            <a href="add-service" class="myBtn btn mt-5 mx-md-5 mx-auto"><i class="text-success fas fa-calendar-check"></i> ເຂົ້າພັກ</a>
                            <a href="service" class="myBtn btn mt-5 mx-md-5 mx-auto"><i class="text-danger fas fa-money-check-alt"></i> ແຈ້ງອອກ</a>
                        </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include $path . 'layouts/footer.php' ?>

    </div>
    <!-- ./wrapper -->

    <?php include $path . 'layouts/script.php' ?>
</body>

</html>