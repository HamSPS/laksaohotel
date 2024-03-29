<?php
session_start();
$path = '../../../';
$title = "ລາຍງານຂໍ້ມູນລາຍຮັບ";
$IsActive = 14;


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
            <section class="content mt-3">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div id="toolbar">
                                        <select name="type" id="type" class="form-control">
                                            <option value="" disabled selected>–– ກະລຸນາເລືອກປະເພດ ––</option>
                                            <option value="date">ລາຍງານປະຈຳວັນ</option>
                                            <option value="month">ລາຍງານປະຈຳເດືອນ</option>
                                            <option value="year">ລາຍງານປະຈຳປີ</option>
                                        </select>
                                    </div>
                                    <table id="table" class="table" data-classes="table table-hover table-striped" data-toolbar="#toolbar" data-pagination="true" data-toggle="table" data-id-field="id" data-search-highlight="true" data-click-to-select="true" data-show-print="true" data-show-export="true" data-export-types=" ['csv', 'txt', 'doc', 'excel', 'pdf']">
                                        <thead class="table-success">
                                            <tr class="text-center table-success">
                                                <!-- <th data-field="state" data-checkbox="true"></th> -->
                                                <th data-field="key" data-sortable="true" data-footer-formatter="idFormatter">#</th>
                                                <th data-field="payDate" data-sortable="true" data-footer-formatter="totalLength">ວັນທີ</th>
                                                <th data-field="amount" data-sortable="true" data-footer-formatter="totalLength">ຈຳນວນລວມ</th>
                                                <th data-field="pay" data-sortable="true" data-footer-formatter="totalLength">ຈຳນວນທີ່ຈ່າຍ</th>
                                                <th data-field="totalDate" data-sortable="true" data-footer-formatter="totalLength">ຈຳນວນວັນ</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">ກາຟສະແດງລາຍຮັບ</h3>
                                    <div class="card-tools d-flex">
                                        <input type="text" name="yearChart" id="yearChart" class="form-control form-control-sm ml-4" value="<?= date('Y') ?>" style="max-width: 100px">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart">
                                        <canvas id="stackedBarChart"></canvas>
                                    </div>
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
    <script src="<?= $path ?>assets/plugins/bootstrap-table/dist/extensions/print/bootstrap-table-print.min.js"></script>
    <script src="<?= $path ?>assets/plugins/bootstrap-table/src/extensions/export/tableExport.min.js"></script>
    <script src="<?= $path ?>assets/plugins/bootstrap-table/src/extensions/export/libs/jsPDF/jspdf.min.js"></script>
    <script src="<?= $path ?>assets/plugins/bootstrap-table/src/extensions/export/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js"></script>
    <script src="<?= $path ?>assets/plugins/bootstrap-table/dist/extensions/export/bootstrap-table-export.min.js"></script>

    <script>
        var $table = $('#table');
        showTable('date');

        function idFormatter(){
            return 'ລວມ';
        }

        function totalLength(data){
            return data.length;
        }

        $('#type').on('change', function(){
            let type = $('#type').val();

            console.log(type);
            showTable(type);

        })


        function showTable(type = '') {
            let get = '';
            if(type === 'date' || type === ''){
                get = 'date';
            }else if(type === 'month'){
                get = 'month';
            }else{
                get = 'year';
            }

            console.log(get);

            $table.bootstrapTable('refresh', {
                url: `http://localhost/laksaohotel/api/admin/report/revenue?${get}`,
                printPageBuilder: function(table) {

                    return `
        <html>
        <head>
            <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Lao:wght@100;200;300;400;500;600;800;900&display=swap" rel="stylesheet">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" />
        <style type="text/css" media="print">
        @page {
            size: auto;
            margin: 1inch;
        }
        </style>
        <style type="text/css" media="all">
                * {
                    box-sizing: border-box;
                    font-family: 'Noto Sans Lao', sans-serif;
                    font-weight: 500;
                }
                
                table {
                    border-collapse: collapse;
                    font-size: 12px;
                }
                
                table,
                th,
                td {
                    border: 1px solid grey;
                }
                
                th,
                td {
                    text-align: center;
                    vertical-align: middle;
                }
                
                th {
                    background: #8fd19e;
                    color: #212529;
                }
                
                p {
                    font-weight: bold;
                    margin-left: 20px;
                }
                
                table {
                    width: 100%;
                    margin-left: auto;
                    margin-right: auto;
                }
                
                div.bs-table-print {
                    text-align: center;
                }
                
                .text-center {
                    text-align: center !important;
                }
                
                .desc {
                    display: flex;
                    justify-content: space-between;
                }
            </style>
                                </head>
                                <title>Print Table</title>
                            <body>
            <h2 class="text-center">ສະບາຍດີຫຼັກ 20</h2>
            <h3 class="text-center">ລາຍງານຂໍ້ມູນລາຍຮັບ</h3>
            <div class="desc">
                <p>ວັນທີພີມ: <?= date('d/m/Y') ?></p>
                <p style="text-align: right;">ພິມລາຍງານໂດຍ: <?= $_SESSION['fullname'] ?></p>
            </div>
            </div>
            <div class="bs-table-print">
                ${table}
            </div>
        </body>
    </html>`
                }
            });
        }



        //---------------------
        //- STACKED BAR CHART -
        //---------------------

        $(document).ready(function() {
            $('#yearChart').datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years"
            });

            $('#yearChart').on('change', function() {
                let showYear = $('#yearChart').val();
                showChart(showYear);
            })
            showChart();

            function showChart(year = '') {
                $.ajax({
                    url: 'http://localhost/laksaohotel/api/admin/report/revenue?chart',
                    type: 'post',
                    data: {
                        year: year,
                    },
                    cache: false,
                    success: function(data) {

                        let result = JSON.parse(data);

                        let labelChart = [];
                        let dataAmount = [];

                        for (let i = 0; i < result.length; i++) {
                            labelChart[i] = result[i].date;
                            dataAmount[i] = result[i].amount;
                        }

                        const ctx = document.getElementById('stackedBarChart').getContext('2d');
                        const myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: labelChart,
                                datasets: [{
                                        label: '# ຈຳນວນລາຍຮັບຕໍ່ເດືອນ',
                                        data: dataAmount,
                                        backgroundColor: '#4bc0c0'
                                    },
                                ]
                            },
                            options: {
                                plugins: {
                                    title: {
                                        display: true,
                                        text: 'Chart.js Bar Chart - Stacked'
                                    },
                                },
                                responsive: true,
                                scales: {
                                    xAxes: [{
                                        stacked: true
                                    }],
                                    yAxes: [{
                                        stacked: true
                                    }]
                                }
                            }
                        });

                        myChart.update()

                    }
                })
            }
        })
    </script>
</body>

</html>