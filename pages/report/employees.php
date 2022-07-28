<?php
session_start();
$path = '../../';
$title = "ລາຍງານຂໍ້ມູນພະນັກງານ";
$IsActive = 1;
$active = 'active';

if (!$_SESSION['user'] || $_SESSION == null) {
    header('location: pages/login');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ໂຮງແຮມຫຼັກ 20</title>

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
                                    <table id="table" class="table" data-classes="table table-hover table-striped" data-search="true" data-pagination="true" data-toggle="table" data-id-field="id" data-search-highlight="true" data-click-to-select="true" data-url="http://localhost/laksaohotel/api/employee/fetch" data-show-print="true" data-show-export="true">
                                        <thead class="table-success">
                                            <tr class="text-center">
                                                <!-- <th data-field="state" data-checkbox="true"></th> -->
                                                <th data-field="key" data-sortable="true">#</th>
                                                <th data-field="emp_code" data-sortable="true">ລະຫັດ</th>
                                                <th data-field="emp_name" data-sortable="true">ຊື່ ແລະ ນາມສະກຸນ</th>
                                                <th data-field="emp_gender" data-sortable="true">ເພດ</th>
                                                <th data-field="emp_dob" data-sortable="true">ວັນເດືອນປີເກີດ</th>
                                                <th data-field="emp_address" data-sortable="true">ທີ່ຢູ່</th>
                                                <th data-field="emp_tel" data-sortable="true">ເບີໂທ</th>
                                                <th data-field="username" data-sortable="true">ຊື່ຜູ້ໃຊ້</th>
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
    <script src="https://unpkg.com/bootstrap-table@1.20.2/dist/extensions/print/bootstrap-table-print.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/tableExport.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/libs/jsPDF/jspdf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.20.2/dist/extensions/export/bootstrap-table-export.min.js"></script>

    <script>
        
        $(function() {
            var $table = $('#table')
            $table.bootstrapTable({
                printPageBuilder: function(table) {
                    return `
                            <html>
                            <head>
                            <style type="text/css" media="print">
                            @page {
                                size: auto;
                                margin: 25px 0 25px 0;
                            }
                            </style>
                            <style type="text/css" media="all">
                            table {
                                border-collapse: collapse;
                                font-size: 12px;
                            }
                            table, th, td {
                                border: 1px solid grey;
                            }
                            th, td {
                                text-align: center;
                                vertical-align: middle;
                            }
                            p {
                                font-weight: bold;
                                margin-left:20px;
                            }
                            table {
                                width:94%;
                                margin-left:3%;
                                margin-right:3%;
                            }
                            div.bs-table-print {
                                text-align:center;
                            }
                            </style>
                            </head>
                            <title>Print Table</title>
                            <body>
                            <h1>Print Test</h1>
                            <div class="bs-table-print">${table}</div>
                            </body>
                            </html>`
                }
            })
        });
    </script>
</body>

</html>