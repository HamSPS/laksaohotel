<?php
session_start();

$path = '../../';
$title = "ປະຫວັດການຈອງ";

$IsActive = 1;


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
        .ui-datepicker-calendar {
            display: none;
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
                <div class="container-fluid">
                    <div class="row mt-4">

                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="toolbar">
                                        <a href="<?= $path ?>pages/member/booking" class="btn btn-success" ><i class="fas fa-plus"></i>
                                            ເພີ່ມຂໍ້ມູນ</a>

                                        <!-- <button type="button" id="deleteSelect" class="btn btn-danger" disabled><i class="fas fa-trash"></i> ລົບຂໍ້ມູນ</button> -->
                                    </div>
                                    <table id="table" class="table data-table" data-classes="table table-hover table-striped" data-search="true" data-pagination="true" data-toggle="table" data-id-field="id" data-toolbar=".toolbar" data-search-highlight="true" data-click-to-select="true" data-url="http://localhost/laksaohotel/api/member/history">
                                        <thead class="table-success">
                                            <tr class="text-center">
                                                <!-- <th data-field="state" data-checkbox="true"></th> -->
                                                <th data-field="key" data-sortable="true">#</th>
                                                <th data-field="book_date" data-sortable="true">ວັນທີຈອງ</th>
                                                <th data-field="start_date" data-sortable="true">ວັນທີເຂົ້າພັກ</th>
                                                <th data-field="end_date" data-sortable="true">ວັນທີອອກ</th>
                                                <th data-field="room_no" data-sortable="true">ເບີຫ້ອງ</th>
                                                <th data-field="type_name" data-sortable="true">ປະເພດຫ້ອງ</th>
                                                <th data-field="price" data-sortable="true">ລາຄາ</th>
                                                <th data-field="status" data-sortable="true">ສະຖານະ</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                        







                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include $path . 'layouts/footer.php' ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <?php include $path . 'layouts/script.php' ?>


    <script>
        $(document).ready(function() {



        })
        // $(function() {
        //-------------
        //- BAR CHART -
        //-------------
        //     var barChartCanvas = $('#barChart').get(0).getContext('2d')
        //     var barChartData = $.extend(true, {}, areaChartData)
        //     var temp0 = areaChartData.datasets[0]
        //     var temp1 = areaChartData.datasets[1]
        //     barChartData.datasets[0] = temp1
        //     barChartData.datasets[1] = temp0

        //     var barChartOptions = {
        //         responsive: true,
        //         maintainAspectRatio: false,
        //         datasetFill: false
        //     }

        //     new Chart(barChartCanvas, {
        //         type: 'bar',
        //         data: barChartData,
        //         options: barChartOptions
        //     })
        // })
    </script>
</body>

</html>