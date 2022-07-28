<?php
session_start();
$path = '../../';
$title = "ຈັດການຂໍ້ມູນປະເພດຫ້ອງພັກ";
$IsActive = 3;


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
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#AddModal"><i class="fas fa-plus"></i>
                                            ເພີ່ມຂໍ້ມູນ</button>

                                        <!-- <button type="button" id="deleteSelect" class="btn btn-danger" disabled><i class="fas fa-trash"></i> ລົບຂໍ້ມູນ</button> -->
                                    </div>
                                    <table id="table" class="table data-table" data-classes="table table-hover table-striped" data-search="true" data-pagination="true" data-toggle="table" data-id-field="id" data-toolbar=".toolbar" data-search-highlight="true" data-click-to-select="true" data-url="http://localhost/laksaohotel/api/room_type/fetch">
                                        <thead>
                                            <tr class="text-center table-success">
                                                <!-- <th data-field="state" data-checkbox="true"></th> -->
                                                <th data-field="key" data-sortable="true" class="text-center">#</th>
                                                <th data-field="type_name" data-sortable="true">ຊື່ປະເພດ</th>
                                                <th data-field="price" data-sortable="true">ລາຄາ</th>
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


            <!-- From Create Modal -->
            <form novalidate class="needs-validation" id="add_form">
                <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="AddModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="AddModalLabel">ເພີ່ມຂໍ້ມູນ</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" style="max-height: 75vh;overflow-y: auto;">
                                <div class="form-group">
                                    <label for="type_name">ຊື່ປະເພດຫ້ອງ <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="type_name" placeholder="ຊື່ປະເພດຫ້ອງ" required>
                                    <small class="invalid-feedback">
                                        ຊື່ປະເພດຫ້ອງ
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="price">ລາຄາ <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control kip-format" id="price" value="0" placeholder="ລາຄາ" required>
                                    <small class="invalid-feedback">
                                        ລາຄາຫ້ອງ
                                    </small>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">ຍົກເລີກ</button>
                                <button type="submit" class="btn btn-success">ບັນທຶກ</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- From Update Modal -->
            <form novalidate class="needs-validation" id="edit_form">
                <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="EditModalLabel">ແກ້ໄຂຂໍ້ມູນ</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" style="max-height: 75vh;overflow-y: auto;">
                                <div class="form-group">
                                    <label for="type_name">ຊື່ປະເພດຫ້ອງ <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="type_name_update" placeholder="ຊື່ປະເພດຫ້ອງ" required>
                                    <small class="invalid-feedback">
                                        ຊື່ປະເພດຫ້ອງ
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="price">ລາຄາ <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control kip-format" id="price_update" value="0" placeholder="ລາຄາ" required>
                                    <small class="invalid-feedback">
                                        ລາຄາຫ້ອງ
                                    </small>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">ຍົກເລີກ</button>
                                <button type="submit" class="btn btn-success">ບັນທຶກ</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

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

                let $type_name = $('#type_name').val();
                let $price = $('#price').priceToFloat();

                if ($type_name != null && ($price != null || $price == 0)) {
                    $.ajax({
                        url: '<?= $path ?>api/room_type/insert',
                        type: 'post',
                        data: {
                            'type_name': $type_name,
                            'price': $price,
                        },
                        cache: false,
                        success: function(dataResult) {
                            let result = JSON.parse(dataResult);
                            $('#AddModal').modal('hide');

                            $('#type_name').val("");
                            $('#price').val("0");

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

                    let $type_name = $('#type_name_update').val();
                    let $price = $('#price_update').priceToFloat();

                    if ($type_name != '' && ($price != '' || $price != 0)) {
                        $.ajax({
                            url: '<?= $path ?>api/room_type/update',
                            type: 'post',
                            data: {
                                'action': 'update',
                                'id': updateId,
                                'type_name': $type_name,
                                'price': $price,
                            },
                            cache: false,
                            success: function(dataResult) {
                                let result = JSON.parse(dataResult);

                                $('#EditModal').modal('hide');

                                $('#type_name_update').val("");
                                $('#price_update').val(0);

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
                url: '<?= $path ?>api/room_type/update',
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

                        $('#type_name_update').val(result[0].type_name);
                        $('#price_update').val(result[0].price);

                        $('#EditModal').modal('show');

                        updateId = result[0].id;
                    }

                }
            })
        }

        function checkDelete(id) {
            Swal.fire({
                title: 'ຄຳຖາມ',
                text: "ເຈົ້າຕ້ອງການລົບຈິງ ຫຼື ບໍ່?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ຕົກລົງ',
                cancelButtonText: 'ຍົກເລີກ',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= $path ?>api/room_type/delete',
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
                                    title: result.message,
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

        function operateFormatter(value, row, index) {
            return [
                `
            <a href="#" onclick="checkUpdate('${row.id}')" class="btn btn-success btn-sm rounded-circle btnUpdate"><i class="fas fa-pen"></i></a>
            <a href="#" onclick="checkDelete('${row.id}')" class="btn btn-danger btn-sm rounded-circle btnDelete"><i class="fas fa-trash"></i></a>
            `
            ].join('')
        }
    </script>
</body>

</html>