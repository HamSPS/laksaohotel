<?php
session_start();

$path = '../../';
$title = "ໜ້າຫຼັກ";

$IsActive = 0;


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
    include $path.'layouts/style.php';
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
        <?php include $path.'layouts/navbar.php' ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include $path.'layouts/sidebar.php' ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="d-flex justify-content-center align-items-center" style="height: 50vh">
                        <h1>ໂຮງແຮມສະບາຍດີຫຼັກ 20 ຍິນດີຕ້ອນຮັບ</h1>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include $path.'layouts/footer.php' ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <?php include $path.'layouts/script.php' ?>


    <script>
        $(document).ready(function() {

            $('#yearChart').datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years"
            });

            $.ajax({
                url: 'http://localhost/laksaohotel/api/index?booking',
                cache: false,
                success: function(data) {

                    let html = '';
                    let result = JSON.parse(data);
                    for (let i = 0; i < result.length; i++) {
                        html = `<div class="small-box bg-info">
                                            <div class="inner">
                                                <h3>${result[i].count}</h3>
                                                <p>ລາຍການຈອງ</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-shopping-cart"></i>
                                            </div>
                                            <a href="pages/booking/booking" class="small-box-footer">
                                                ເພີ່ມເຕີມ <i class="fas fa-arrow-circle-right"></i>
                                            </a>
                                        </div>`;
                    }
                    $('#showBook').html(html);
                }
            })

            $.ajax({
                url: 'http://localhost/laksaohotel/api/index?checkIn',
                cache: false,
                success: function(data) {

                    let html = '';
                    let result = JSON.parse(data);
                    for (let i = 0; i < result.length; i++) {
                        html = `<div class="small-box bg-primary">
                                            <div class="inner">
                                                <h3>${result[i].count}</h3>
                                                <p>ລາຍການເຂົ້າພັກ</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-shopping-cart"></i>
                                            </div>
                                            <a href="pages/check-out/index" class="small-box-footer">
                                                ເພີ່ມເຕີມ <i class="fas fa-arrow-circle-right"></i>
                                            </a>
                                        </div>`;
                    }
                    $('#showCheck').html(html);

                }
            })

            $.ajax({
                url: 'http://localhost/laksaohotel/api/index?employee',
                cache: false,
                success: function(data) {

                    let html = '';
                    let result = JSON.parse(data);
                    for (let i = 0; i < result.length; i++) {
                        html = `<div class="inner">
                                    <h3>${result[i].count}</h3>
                                    <p>ຜູ້ໃຊ້ທັງໝົດ</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-plus"></i>
                                </div>
                                <a href="pages/manage/employees" class="small-box-footer">
                                    ເພີ່ມເຕີມ <i class="fas fa-arrow-circle-right"></i>
                                </a>`;
                    }
                    $('#showEmployee').html(html);

                }
            })

            $.ajax({
                url: 'http://localhost/laksaohotel/api/index?customer',
                cache: false,
                success: function(data) {

                    let html = '';
                    let result = JSON.parse(data);
                    for (let i = 0; i < result.length; i++) {
                        html = ` <div class="inner">
                                    <h3>${result[i].count}</h3>
                                    <p>ຈຳນວນລູກຄ້າ</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-chart-pie"></i>
                                </div>
                                <a href="pages/manage/customers" class="small-box-footer">
                                    ເພີ່ມເຕີມ <i class="fas fa-arrow-circle-right"></i>
                                </a>`;
                    }
                    $('#showCustomer').html(html);

                }
            })

            $('#yearChart').on('change', function() {
                let showYear = $('#yearChart').val();
                showChart(showYear);
            })
            showChart();

            function showChart(year = '') {
                $.ajax({
                    url: 'http://localhost/laksaohotel/api/index?chart',
                    type: 'post',
                    data: {
                        year: year,
                    },
                    cache: false,
                    success: function(data) {

                        let result = JSON.parse(data);

                        let labelChart = [];
                        let dataChart = [];

                        for (let i = 0; i < result.length; i++) {
                            labelChart[i] = result[i].checkInMonth;
                            dataChart[i] = result[i].amount;
                        }

                        console.log(result);
                        const ctx = document.getElementById('barChart').getContext('2d');
                        const myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: labelChart,
                                datasets: [{
                                    label: '# ຈຳນວນເຂົ້າພັກ',
                                    data: dataChart,
                                    backgroundColor: '#4f98c2'
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                datasetFill: false
                            }
                        });

                        myChart.update()

                    }
                })
            }

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