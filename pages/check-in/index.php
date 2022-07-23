<?php
session_start();
$path = '../../';
$title = "ການເຂົ້າພັກ";

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
                                    <div class="toolbar">
                                        <a href="add-booking" class="btn btn-success"><i class="fas fa-plus"></i>
                                            ເພີ່ມຂໍ້ມູນ</a>

                                        <!-- <button type="button" id="deleteSelect" class="btn btn-danger" disabled><i class="fas fa-trash"></i> ລົບຂໍ້ມູນ</button> -->
                                    </div>
                                    <table id="table" class="table data-table" data-classes="table table-hover table-striped" data-search="true" data-pagination="true" data-toggle="table" data-id-field="id" data-toolbar=".toolbar" data-search-highlight="true" data-click-to-select="true" data-url="http://localhost/laksaohotel/api/booking/fetch">
                                        <thead>
                                            <tr class="text-center table-success">
                                                <!-- <th data-field="state" data-checkbox="true"></th> -->
                                                <th data-field="key" data-sortable="true">#</th>
                                                <th data-field="book_date" data-sortable="true">ວັນທີເວລາທີ່ຈອງ</th>
                                                <th data-field="start_date" data-sortable="true">ເຂົ້າພັກວັນທີ</th>
                                                <th data-field="end_date" data-sortable="true">ສິ້ນສຸດວັນທີ</th>
                                                <th data-field="room_no" data-sortable="true">ຫ້ອງພັກ</th>
                                                <th data-field="type_name" data-sortable="true">ປະເພດຫ້ອງ</th>
                                                <th data-field="cus_name" data-sortable="true">ລູກຄ້າ</th>
                                                <th data-field="status" data-sortable="true">ສະຖານະ</th>
                                                <th data-field="operate" data-formatter="operateFormatter" class="text-center mx-0"></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- View Modal -->

            <div class="modal fade" id="ViewModal" tabindex="-1" role="dialog" aria-labelledby="ViewModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ViewModalLabel">ລາຍລະອຽດ</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" style="max-height: 75vh;overflow-y: scroll;">
                            <div class="d-flex justify-content-around w-100">
                                <div>
                                    <h5>ຂໍ້ມູນການຈອງ</h5>
                                    <h6>ວັນທີເວລາທີ່ຈອງ</h6>
                                    <p class="text-primary" id="date"></p>
                                    <h6>ວັນທີ່ເຂົ້າພັກ</h6>
                                    <p class="text-primary" id="inDate"></p>
                                    <h6>ວັນທີອອກ</h6>
                                    <p class="text-primary" id="outDate"></p>
                                    <h6>ຈຳນວນວັນເຂົ້າພັກ</h6>
                                    <p class="text-primary" id="totalDate"></p>
                                </div>
                                <div>
                                    <h5>ຂໍ້ມູນຫ້ອງພັກ</h5>
                                    <h6>ເບີຫ້ອງພັກ</h6>
                                    <p class="text-primary" id="roomNo"></p>
                                    <h6>ປະເພດຫ້ອງພັກ</h6>
                                    <p class="text-primary" id="roomType"></p>
                                    <h6>ລາຄາຫ້ອງຕໍ່ຄືນ</h6>
                                    <p class="text-primary" id="roomPrice" class="kip-format"></p>
                                </div>
                                <div>
                                    <h5>ຂໍ້ມູນລູກຄ້າ</h5>
                                    <h6>ລະຫັດສະມາຊິກລູກຄ້າ</h6>
                                    <p class="text-primary" id="cusNo"></p>
                                    <h6>ຊື່ລູກຄ້າ</h6>
                                    <p class="text-primary" id="cusName"></p>
                                    <h6>ເພດ</h6>
                                    <p class="text-primary" id="cusGender"></p>
                                    <h6>ເບີໂທ</h6>
                                    <p class="text-primary" id="cusTel"></p>
                                    <h6>ທີ່ຢູ່</h6>
                                    <p class="text-primary" id="cusAddress"></p>
                                    <h6>ເລກບັດປະຈຳຕົວ ຫຼື ໜັງສືຜ່ານແດນ</h6>
                                    <p class="text-primary" id="cusIdCard"></p>

                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">ຍົກເລີກ</button>
                            <button type="submit" class="btn btn-success">ບັນທຶກ</button>
                        </div>
                    </div>
                </div>
            </div>

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

            $('#add_form').on('submit', function(e) {
                e.preventDefault();

                let $code = $('#code').val();
                let $name = $('#name').val();
                let $gender = $('#gender').val();
                let $tel = $('#tel').val();
                let $address = $('#address').val();
                let $card_no = $('#card_no').val();

                if ($code != null && $name != null && $gender != null && $card_no != null) {
                    $.ajax({
                        url: '<?= $path ?>api/customer/insert',
                        type: 'post',
                        data: {
                            'code': $code,
                            'name': $name,
                            'gender': $gender,
                            'tel': $tel,
                            'address': $address,
                            'card_no': $card_no,
                        },
                        cache: false,
                        success: function(dataResult) {
                            let result = JSON.parse(dataResult);
                            $('#AddModal').modal('hide');

                            $('#code').val("");
                            $('#name').val("");
                            $('#gender').val("");
                            $('#tel').val("");
                            $('#address').val("");
                            $('#card_no').val("");

                            $('#add_form').removeClass('was-validate');

                            if (result.statusCode === 200) {
                                $('.data-table').bootstrapTable('refresh');
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: result.message,
                                    showConfirmButton: false,
                                    timer: 3000,
                                    toast: true,
                                    timerProgressBar: true,
                                })
                            } else {
                                $('.data-table').bootstrapTable('refresh');
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'error',
                                    title: result[0].message,
                                    showConfirmButton: false,
                                    timer: 3000,
                                    toast: true,
                                    timerProgressBar: true,
                                });
                            }
                        }
                    })
                }

            });

            $('#edit_form').on('submit', function(e) {
                e.preventDefault();

                if (updateId != null) {

                    let $code = $('#code_update').val();
                    let $name = $('#name_update').val();
                    let $gender = $('#gender_update').val();
                    let $tel = $('#tel_update').val();
                    let $address = $('#address_update').val();
                    let $card_no = $('#card_no_update').val();

                    if ($code != '' && $name != '' && $gender != '' && $card_no != '') {
                        $.ajax({
                            url: '<?= $path ?>api/customer/update',
                            type: 'post',
                            data: {
                                'action': 'update',
                                'id': updateId,
                                'code': $code,
                                'name': $name,
                                'gender': $gender,
                                'tel': $tel,
                                'address': $address,
                                'card_no': $card_no,
                            },
                            cache: false,
                            success: function(dataResult) {
                                let result = JSON.parse(dataResult);

                                $('#EditModal').modal('hide');

                                $('#code_update').val("");
                                $('#name_update').val("");
                                $('#gender_update').val("");
                                $('#tel_update').val("");
                                $('#address_update').val("");
                                $('#card_no_update').val("");

                                $('#edit_form').removeClass('was-validate');


                                if (result.statusCode === 200) {
                                    $('.data-table').bootstrapTable('refresh');
                                    Swal.fire({
                                        position: 'top-end',
                                        icon: 'success',
                                        title: result.message,
                                        showConfirmButton: false,
                                        timer: 3000,
                                        toast: true,
                                        timerProgressBar: true,
                                    })
                                } else {
                                    $('.data-table').bootstrapTable('refresh');
                                    Swal.fire({
                                        position: 'top-end',
                                        icon: 'error',
                                        title: result[0].message,
                                        showConfirmButton: false,
                                        timer: 3000,
                                        toast: true,
                                        timerProgressBar: true,
                                    })
                                }
                            }
                        })
                    }
                }
            });

        })

        var updateId = '';

        function checkUpdate(id) {
            let action = "check";

            $.ajax({
                url: '<?= $path ?>api/customer/update',
                type: 'post',
                data: {
                    action: action,
                    id: id,
                },
                dataType: 'text',
                cache: false,
                success: function(data) {
                    let result = JSON.parse(data);

                    if (result) {

                        $('#code_update').val(result[0].code);
                        $('#name_update').val(result[0].name);
                        $('#gender_update').val(result[0].gender);
                        $('#tel_update').val(result[0].tel);
                        $('#address_update').val(result[0].address);
                        $('#card_no_update').val(result[0].card_no);

                        $('#EditModal').modal('show');

                        updateId = result[0].id;
                    }

                }
            })
        }

        function cancelBook(id) {
            Swal.fire({
                title: 'ຄຳຖາມ',
                text: "ເຈົ້າຕ້ອງການຍົກເລີກການຈອງ ຫຼື ບໍ່?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ຕົກລົງ',
                cancelButtonText: 'ຍົກເລີກ',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= $path ?>api/booking/cancel',
                        type: 'post',
                        data: {
                            'id': id,
                        },
                        cache: false,
                        success: function(data) {
                            let result = JSON.parse(data);

                            if (result.statusCode === 200) {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: result.message,
                                    showConfirmButton: false,
                                    timer: 3000,
                                    toast: true,
                                    timerProgressBar: true,
                                });
                                $('.data-table').bootstrapTable('refresh');
                            } else {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'error',
                                    title: result[0].message,
                                    showConfirmButton: false,
                                    timer: 3000,
                                    toast: true,
                                    timerProgressBar: true,
                                });
                                $('.data-table').bootstrapTable('refresh');
                            }
                        }
                    })
                }
            })
        }

        function viewBook(id) {
            $.ajax({
                url: '<?= $path ?>api/booking/findOne',
                type: 'post',
                data: {
                    id: id,
                },
                success: function(result) {
                    let data = JSON.parse(result);

                    $('#ViewModal').modal('show');

                    $('#date').html(data[0].book_date);
                    $('#inDate').html(data[0].start_date);
                    $('#outDate').html(data[0].end_date);
                    $('#totalDate').html(data[0].total_date);
                    $('#roomNo').html(data[0].room_no);
                    $('#roomType').html(data[0].type_name);
                    $('#roomPrice').html(data[0].price);
                    $('#cusNo').html(data[0].cus_code);
                    $('#cusName').html(data[0].cus_name);
                    $('#cusGender').html(data[0].cus_gender);
                    $('#cusTel').html(data[0].cus_tel);
                    $('#cusAddress').html(data[0].cus_address);
                    $('#cusIdCard').html(data[0].cardId_or_passport);


                }
            })
        }

        function operateFormatter(value, row, index) {
            return [
                `
            <a href="#" onclick="viewBook('${row.id}')" class="btn btn-success btn-sm rounded-circle btnUpdate"><i class="fas fa-eye"></i></a>
            <a href="#" onclick="cancelBook('${row.id}')" class="btn btn-danger btn-sm rounded-circle btnUpdate"><i class="fa fa-times"></i></a>
            `
            ].join('')
        }
    </script>
</body>

</html>