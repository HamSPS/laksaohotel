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
                                    <div class="toolbar">
                                        <a href="add-service" class="btn btn-success"><i class="fas fa-plus"></i>
                                            ເພີ່ມຂໍ້ມູນ</a>

                                        <!-- <button type="button" id="deleteSelect" class="btn btn-danger" disabled><i class="fas fa-trash"></i> ລົບຂໍ້ມູນ</button> -->
                                    </div>
                                    <table id="table" class="table data-table" data-classes="table table-hover table-striped" data-search="true" data-pagination="true" data-toggle="table" data-id-field="id" data-toolbar=".toolbar" data-search-highlight="true" data-click-to-select="true" data-url="http://localhost/laksaohotel/api/admin/services/fetch">
                                        <thead>
                                            <tr class="text-center table-success">
                                                <!-- <th data-field="state" data-checkbox="true"></th> -->
                                                <th data-field="key" data-sortable="true">#</th>
                                                <th data-field="check_in_date" data-sortable="true">ວັນທີ່ເຂົ້າພັກ</th>
                                                <th data-field="check_out_date" data-sortable="true">ວັນແຈ້ງອອກ</th>
                                                <th data-field="room_no" data-sortable="true">ຫ້ອງພັກ</th>
                                                <th data-field="type_name" data-sortable="true">ປະເພດຫ້ອງ</th>
                                                <th data-field="cus_name" data-sortable="true">ລູກຄ້າ</th>
                                                <th data-field="status" data-sortable="true">ສະຖານະ</th>
                                                <th data-field="operate" class="text-center mx-0"></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Check Out Modal -->

            <form id="checkOutForm" novalidate class="needs-validation">
                <div class="modal fade" id="checkOutModal" tabindex="-1" role="dialog" aria-labelledby="checkOutModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="checkOutModalLabel">ຟອມການແຈ້ງອອກ</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" style="max-height: 75vh;overflow-y: scroll;">
                                <p>ວັນທີ່ເຂົ້າພັກ: <span id="checkInDate"></span></p>
                                <p>ເບີຫ້ອງ: <span id="roomNo"></span></p>
                                <p>ປະເພດຫ້ອງພັກ: <span id="type"></span></p>
                                <p>ລາຄາ: <span id="price"></span></p>
                                <p>ລະຫັດລູກຄ້າ: <span id="cusNo"></span></p>
                                <p>ຊື່ລູກຄ້າ: <span id="cusName"></span></p>
                                <hr>
                                <div class="form-group">
                                    <label for="">ຈຳນວນວັນເຂົ້າພັກ</label>
                                    <input type="text" class="form-control" id="total_date" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">ລວມເປັນເງິນຕ້ອງຈ່າຍ</label>
                                    <input type="text" name="amount" id="amount" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">ເງິນທີ່ຈ່າຍ</label>
                                    <input type="text" name="pay" id="pay" class="form-control kip-format" placeholder="ປ້ອນຈຳນວນເງິນ" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">ປິດ</button>
                                <button type="submit" class="btn btn-success">ບັນທຶກ</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <div id="printerDiv" style="display:none"></div>
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

        });

        $('#checkOutForm').on('submit', function(e) {
            e.preventDefault();

            let pay = $('#pay').priceToFloat();

            if (pay === 0 || pay === '') {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'ກະລຸນາປ້ອນຈຳນວນເງິນ',
                    showConfirmButton: false,
                    timer: 3000,
                    toast: false,
                    timerProgressBar: true,
                });
            } else {

                if (amount <= pay) {

                    $.ajax({
                        url: 'http://localhost/laksaohotel/api/admin/services/check_out',
                        type: 'post',
                        data: {
                            id: checkOutId,
                            amount: amount,
                            pay: pay
                        },
                        cache: false,
                        success: function(result) {
                            let data = JSON.parse(result);
                            $('#checkOutModal').modal('hide');

                            $('.data-table').bootstrapTable('refresh');

                            console.log(data);

                            if (data[0].statusCode === 200) {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: data[0].message,
                                    showConfirmButton: false,
                                    timer: 3000,
                                    toast: true,
                                    timerProgressBar: true,
                                });
                            } else {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'error',
                                    title: data[0].message,
                                    showConfirmButton: false,
                                    timer: 3000,
                                    toast: true,
                                    timerProgressBar: true,
                                });
                            }

                        }
                    })


                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'ກະລຸນາປ້ອນຈຳນວນເງິນໃຫ້ຄົບຖ້ວນ',
                        showConfirmButton: false,
                        timer: 3000,
                        toast: false,
                        timerProgressBar: true,
                    });

                }
            }
        })


        var checkOutId = '';
        var amount = '';

        function checkOut(id) {
            this.checkOutId = id;

            $.ajax({
                url: 'http://localhost/laksaohotel/api/admin/services/prepare_check_out',
                type: 'post',
                data: {
                    id: id,
                },
                cache: false,
                success: function(data) {
                    let result = JSON.parse(data);

                    $('#checkInDate').html(result[0].check_in_date);
                    $('#roomNo').html(result[0].room_no);
                    $('#type').html(result[0].type_name);
                    $('#price').html("LAK " + result[0].price.toLocaleString('en-US'));
                    $('#cusNo').html(result[0].cus_no);
                    $('#cusName').html(result[0].cus_name);

                    $('#total_date').val(result[0].total_date);

                    amount = result[0].amount;
                    $('#amount').val("LAK " + result[0].amount.toLocaleString('en-Us'));


                }
            })

            $('#checkOutModal').modal('show');



        }

        function printBill(id) {
            var div = document.getElementById("printerDiv");
            div.innerHTML = '<iframe src="bill" onload="this.contentWindow.print();"></iframe>';
        }

        function operateFormatter(value, row, index) {

            return [
                `
            <a href="#" onclick="checkOut('${row.id}')" class="btn btn-success btn-sm rounded-circle btnUpdate"><i class="fas fa-calendar-minus"></i></a>
            <a href="bill?print=${row.id}" target="_blank" class="btn btn-primary btn-sm rounded-circle btnUpdate"><i class="fas fa-print"></i></a>
            `
            ].join('')
        }
        // <a href="#" onclick="cancelBook('${row.id}')" class="btn btn-danger btn-sm rounded-circle btnUpdate"><i class="fa fa-times"></i></a>
    </script>
</body>

</html>