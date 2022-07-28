<?php
session_start();
$path = '../../';
$title = "ຈັດການຂໍ້ມູນພະນັກງານ";
$IsActive = 1;


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
                                    <table id="table" class="table data-table" data-classes="table table-hover table-striped" data-search="true" data-pagination="true" data-toggle="table" data-id-field="id" data-toolbar=".toolbar" data-search-highlight="true" data-click-to-select="true" data-url="http://localhost/laksaohotel/api/employee/fetch">
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
                            <div class="modal-body" style="max-height: 75vh;overflow-y: scroll;">
                                <div class="form-group">
                                    <label for="code">ລະຫັດພະນັກງານ <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="code" placeholder="ລະຫັດພະນັກງານ" required>
                                    <div class="invalid-feedback">
                                        ກະລຸນາປ້ອນລະຫັດພະນັກງານ
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name">ຊື່ ແລະ ນາມສະກຸນ <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" placeholder="ຊື່ ແລະ ນາມສະກຸນ" required>
                                    <div class="invalid-feedback">
                                        ກະລຸນາປ້ອນຊື່ ແລະ ນາມສະກຸນ
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="gender">ເພດ <span class="text-danger">*</span></label>
                                    <select name="gender" id="gender" class="form-control" required>
                                        <option value="" disabled selected>ກະລຸນາເລືອກເພດ</option>
                                        <option value="ຊາຍ">ຊາຍ</option>
                                        <option value="ຍິງ">ຍິງ</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        ກະລຸນາເລືອກເພດ
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tel">ເບີໂທ</label>
                                    <input type="text" class="form-control" id="tel" placeholder="ເບີໂທ">
                                </div>
                                <div class="form-group">
                                    <label for="dob">ວັນເດືອນປີເກີດ</label>
                                    <input type="date" class="form-control" id="dob" placeholder="ວັນເດືອນປີເກີດ">
                                </div>
                                <div class="form-group">
                                    <label for="address">ທີ່ຢູ່</label>
                                    <textarea type="text" class="form-control" id="address" placeholder="ທີ່ຢູ່"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="username">ຊື່ຜູ້ໃຊ້ <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="username" placeholder="ຊື່ຜູ້ໃຊ້" required>
                                    <div class="invalid-feedback">
                                        ກະລຸນາຊື່ຜູ້ໃຊ້
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password">ລະຫັດຜ່ານ <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="password" placeholder="ລະຫັດຜ່ານ" required>
                                    <div class="invalid-feedback">
                                        ກະລຸນາລະຫັດຜ່ານ
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
                            <div class="modal-body" style="max-height: 75vh;overflow-y: scroll;">
                                <div class="form-group">
                                    <label for="code">ລະຫັດພະນັກງານ <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="code_update" placeholder="ລະຫັດພະນັກງານ" required>
                                    <div class="invalid-feedback">
                                        ກະລຸນາປ້ອນລະຫັດພະນັກງານ
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name">ຊື່ ແລະ ນາມສະກຸນ <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name_update" placeholder="ຊື່ ແລະ ນາມສະກຸນ" required>
                                    <div class="invalid-feedback">
                                        ກະລຸນາປ້ອນຊື່ ແລະ ນາມສະກຸນ
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="gender">ເພດ <span class="text-danger">*</span></label>
                                    <select name="gender" id="gender_update" class="form-control" required>
                                        <option value="" disabled selected>ກະລຸນາເລືອກເພດ</option>
                                        <option value="ຊາຍ">ຊາຍ</option>
                                        <option value="ຍິງ">ຍິງ</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        ກະລຸນາເລືອກເພດ
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tel">ເບີໂທ</label>
                                    <input type="text" class="form-control" id="tel_update" placeholder="ເບີໂທ">
                                </div>
                                <div class="form-group">
                                    <label for="dob">ວັນເດືອນປີເກີດ</label>
                                    <input type="date" class="form-control" id="dob_update" placeholder="ວັນເດືອນປີເກີດ">
                                </div>
                                <div class="form-group">
                                    <label for="address">ທີ່ຢູ່</label>
                                    <textarea type="text" class="form-control" id="address_update" placeholder="ທີ່ຢູ່"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="username">ຊື່ຜູ້ໃຊ້ <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="username_update" placeholder="ຊື່ຜູ້ໃຊ້" required>
                                    <div class="invalid-feedback">
                                        ກະລຸນາຊື່ຜູ້ໃຊ້
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

                let $code = $('#code').val();
                let $name = $('#name').val();
                let $gender = $('#gender').val();
                let $dob = $('#dob').val();
                let $tel = $('#tel').val();
                let $address = $('#address').val();
                let $username = $('#username').val();
                let $password = $('#password').val();

                if ($code != null && $name != null && $gender != null && $username != null && $password != null) {
                    $.ajax({
                        url: '<?= $path ?>api/employee/insert',
                        type: 'post',
                        data: {
                            'code': $code,
                            'name': $name,
                            'gender': $gender,
                            'dob': $dob,
                            'tel': $tel,
                            'address': $address,
                            'username': $username,
                            'password': $password,
                        },
                        cache: false,
                        success: function(dataResult) {
                            let result = JSON.parse(dataResult);
                            $('#AddModal').modal('hide');

                            $('#code').val("");
                            $('#name').val("");
                            $('#gender').val("");
                            $('#dob').val("");
                            $('#tel').val("");
                            $('#address').val("");
                            $('#username').val("");
                            $('#password').val("");

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
                    let $dob = $('#dob_update').val();
                    let $tel = $('#tel_update').val();
                    let $address = $('#address_update').val();
                    let $username = $('#username_update').val();

                    if ($code != '' && $name != '' && $gender != '' && $username != '') {
                        $.ajax({
                            url: '<?= $path ?>api/employee/update',
                            type: 'post',
                            data: {
                                'action': 'update',
                                'id': updateId,
                                'code': $code,
                                'name': $name,
                                'gender': $gender,
                                'dob': $dob,
                                'tel': $tel,
                                'address': $address,
                                'username': $username,
                            },
                            cache: false,
                            success: function(dataResult) {
                                let result = JSON.parse(dataResult);

                                $('#EditModal').modal('hide');

                                $('#code_update').val("");
                                $('#name_update').val("");
                                $('#gender_update').val("");
                                $('#dob_update').val("");
                                $('#tel_update').val("");
                                $('#address_update').val("");
                                $('#username_update').val("");

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
                url: '<?= $path ?>api/employee/update',
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
                        $('#dob_update').val(result[0].dob);
                        $('#tel_update').val(result[0].tel);
                        $('#address_update').val(result[0].address);
                        $('#username_update').val(result[0].username);

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
                        url: '<?= $path ?>api/employee/delete',
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