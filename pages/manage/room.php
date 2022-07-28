<?php
session_start();
$path = '../../';
$title = "ຈັດການຂໍ້ມູນຫ້ອງພັກ";
$IsActive = 4;
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
                                    <div class="toolbar">
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#AddModal"><i class="fas fa-plus"></i>
                                            ເພີ່ມຂໍ້ມູນ</button>
                                        <!-- <select class="form-control select" name="state">
                                        </select> -->

                                        <!-- <button type="button" id="deleteSelect" class="btn btn-danger" disabled><i class="fas fa-trash"></i> ລົບຂໍ້ມູນ</button> -->
                                    </div>
                                    <table id="table" class="table data-table" data-classes="table table-hover table-striped" data-search="true" data-pagination="true" data-toggle="table" data-id-field="id" data-toolbar=".toolbar" data-search-highlight="true" data-click-to-select="true" data-url="http://localhost/laksaohotel/api/room/fetch">
                                        <thead>
                                            <tr class="text-center table-success">
                                                <!-- <th data-field="state" data-checkbox="true"></th> -->
                                                <th data-field="key" data-sortable="true" class="text-center">#</th>
                                                <th data-field="room_no" data-sortable="true">ລະຫັດຫ້ອງ</th>
                                                <th data-field="type_name" data-sortable="true">ປະເພດຫ້ອງພັກ</th>
                                                <th data-field="price" data-sortable="true">ລາຄາ</th>
                                                <th data-field="room_status" data-sortable="true">ສະຖານະຫ້ອງ</th>
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
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="room_no">ເບີຫ້ອງ <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="room_no" placeholder="ເບີຫ້ອງ" required>
                                    <small class="invalid-feedback">
                                        ກະລຸນາປ້ອນເບີຫ້ອງ
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="type_id">ປະເພດຫ້ອງພັກ <span class="text-danger">*</span></label>
                                    <select name="type_id" id="type_id" class="form-control select" title="ເລືອກປະເພດຫ້ອງພັກ" required></select>
                                    <small class="invalid-feedback">
                                        ກະລຸນາເລືອກປະເພດຫ້ອງພັກ
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
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="room_no_update">ເບີຫ້ອງ <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="room_no_update" placeholder="ເບີຫ້ອງ" required>
                                    <small class="invalid-feedback">
                                        ກະລຸນາປ້ອນເບີຫ້ອງ
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="type_id_update">ປະເພດຫ້ອງພັກ <span class="text-danger">*</span></label>
                                    <select name="type_id_update" id="type_id_update" class="form-control select" title="ເລືອກປະເພດຫ້ອງພັກ" required></select>
                                    <small class="invalid-feedback">
                                        ກະລຸນາເລືອກປະເພດຫ້ອງພັກ
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
            var select = $('.select');
            select.selectpicker();

            load_type();

            function load_type() {
                $.ajax({
                    url: '<?= $path ?>api/room/find_type',
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        for (var count = 0; count < data.length; count++) {
                            html += '<option value="' + data[count].id + '">' + data[count].name +
                                '</option>';
                        }

                        select.html(html);
                        select.selectpicker('refresh');
                    }
                })
            }

            $('#add_form').on('submit', function(e) {
                e.preventDefault();

                let $room_no = $('#room_no').val();
                let $type_id = $('#type_id').val();

                if ($room_no != null && $type_id != null) {
                    $.ajax({
                        url: '<?= $path ?>api/room/insert',
                        type: 'post',
                        data: {
                            'room_no': $room_no,
                            'type_id': $type_id,
                        },
                        cache: false,
                        success: function(dataResult) {
                            let result = JSON.parse(dataResult);
                            $('#AddModal').modal('hide');

                            $('#room_no').val("");
                            $('#type_id').val("");

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

                    let $room_no = $('#room_no_update').val();
                    let $type_id = $('#type_id_update').val();

                    if ($room_no != '' && $type_id != '') {
                        $.ajax({
                            url: '<?= $path ?>api/room/update',
                            type: 'post',
                            data: {
                                'action': 'update',
                                'id': updateId,
                                'room_no': $room_no,
                                'type_id': $type_id,
                            },
                            cache: false,
                            success: function(dataResult) {
                                let result = JSON.parse(dataResult);

                                $('#EditModal').modal('hide');

                                $('#room_no_update').val("");
                                $('#type_id_update').val(0);

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
                url: '<?= $path ?>api/room/update',
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

                        $('#room_no_update').val(result[0].room_no);
                        $('#type_id_update').val(result[0].type_id);

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
                        url: '<?= $path ?>api/room/delete',
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