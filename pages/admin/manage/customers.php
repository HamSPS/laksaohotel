<?php
session_start();
$path = '../../../';
$title = "ຈັດການຂໍ້ມູນລູກຄ້າ";
$IsActive = 2;


if (!$_SESSION['user'] || $_SESSION == null) {
    header('location:' . $path. 'pages/admin/login');
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
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#AddModal"><i class="fas fa-plus"></i>
                                            ເພີ່ມຂໍ້ມູນ</button>

                                        <!-- <button type="button" id="deleteSelect" class="btn btn-danger" disabled><i class="fas fa-trash"></i> ລົບຂໍ້ມູນ</button> -->
                                    </div>
                                    <table id="table" class="table data-table" data-classes="table table-hover table-striped" data-search="true" data-pagination="true" data-toggle="table" data-id-field="id" data-toolbar=".toolbar" data-search-highlight="true" data-click-to-select="true" data-url="http://localhost/laksaohotel/api/admin/customer/fetch">
                                        <thead>
                                            <tr class="text-center table-success">
                                                <!-- <th data-field="state" data-checkbox="true"></th> -->
                                                <th data-field="key" data-sortable="true">#</th>
                                                <th data-field="cus_code" data-sortable="true">ລະຫັດ</th>
                                                <th data-field="cus_name" data-sortable="true">ຊື່ ແລະ ນາມສະກຸນ</th>
                                                <th data-field="cus_gender" data-sortable="true">ເພດ</th>
                                                <th data-field="cus_tel" data-sortable="true">ເບີໂທ</th>
                                                <th data-field="cus_address" data-sortable="true">ທີ່ຢູ່</th>
                                                <th data-field="card_no" data-sortable="true">ບັດປະຈຳຕົວ ຫຼື ໜັງສືຜ່ານແດນ</th>
                                                <th data-field="username" data-sortable="true">Username</th>
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
                                    <label for="code">ລະຫັດສະມາຊິກ <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="code" placeholder="ລະຫັດສະມາຊິກ" required>
                                    <small class="invalid-feedback">
                                        ກະລຸນາປ້ອນລະຫັດສະມາຊິກ
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="name">ຊື່ ແລະ ນາມສະກຸນ <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" placeholder="ຊື່ ແລະ ນາມສະກຸນ" required>
                                    <small class="invalid-feedback">
                                        ກະລຸນາປ້ອນຊື່ ແລະ ນາມສະກຸນ
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="gender">ເພດ <span class="text-danger">*</span></label>
                                    <select name="gender" id="gender" class="form-control" required>
                                        <option value="" disabled selected>ກະລຸນາເລືອກເພດ</option>
                                        <option value="ຊາຍ">ຊາຍ</option>
                                        <option value="ຍິງ">ຍິງ</option>
                                    </select>
                                    <small class="invalid-feedback">
                                        ກະລຸນາເລືອກເພດ
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="tel">ເບີໂທ</label>
                                    <input type="text" class="form-control" id="tel" placeholder="ເບີໂທ">
                                </div>
                                <div class="form-group">
                                    <label for="address">ທີ່ຢູ່</label>
                                    <textarea type="text" class="form-control" id="address" placeholder="ທີ່ຢູ່"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="tel">ບັດປະຈຳຕົວ ຫຼື ໜັງສືຜ່ານແດນ <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="card_no" placeholder="ບັດປະຈຳຕົວ ຫຼື ໜັງສືຜ່ານແດນ" required>
                                    <small class="invalid-feedback">
                                        ກະລຸນາປ້ອນບັດປະຈຳຕົວ ຫຼື ໜັງສືຜ່ານແດນ
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="tel"> Username <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="username" placeholder="Username" required>
                                    <small class="invalid-feedback">
                                        ກະລຸນາປ້ອນ Username
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="tel">Password <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="password" placeholder="Password" required>
                                    <small class="invalid-feedback">
                                        ກະລຸນາປ້ອນ Password
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
                            <div class="modal-body" style="max-height: 75vh;overflow-y: scroll;">
                                <div class="form-group">
                                    <label for="code">ລະຫັດສະມາຊິກ <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="code_update" placeholder="ລະຫັດສະມາຊິກ" required>
                                    <small class="invalid-feedback">
                                        ກະລຸນາປ້ອນລະຫັດສະມາຊິກ
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="name">ຊື່ ແລະ ນາມສະກຸນ <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name_update" placeholder="ຊື່ ແລະ ນາມສະກຸນ" required>
                                    <small class="invalid-feedback">
                                        ກະລຸນາປ້ອນຊື່ ແລະ ນາມສະກຸນ
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="gender">ເພດ <span class="text-danger">*</span></label>
                                    <select name="gender" id="gender_update" class="form-control" required>
                                        <option value="" disabled selected>ກະລຸນາເລືອກເພດ</option>
                                        <option value="ຊາຍ">ຊາຍ</option>
                                        <option value="ຍິງ">ຍິງ</option>
                                    </select>
                                    <small class="invalid-feedback">
                                        ກະລຸນາເລືອກເພດ
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="tel">ເບີໂທ</label>
                                    <input type="text" class="form-control" id="tel_update" placeholder="ເບີໂທ">
                                </div>
                                <div class="form-group">
                                    <label for="address">ທີ່ຢູ່</label>
                                    <textarea type="text" class="form-control" id="address_update" placeholder="ທີ່ຢູ່"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="tel">ບັດປະຈຳຕົວ ຫຼື ໜັງສືຜ່ານແດນ <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="card_no_update" placeholder="ບັດປະຈຳຕົວ ຫຼື ໜັງສືຜ່ານແດນ" required>
                                    <small class="invalid-feedback">
                                        ກະລຸນາປ້ອນບັດປະຈຳຕົວ ຫຼື ໜັງສືຜ່ານແດນ
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="tel">Username <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="username_update" placeholder="Username" required>
                                    <small class="invalid-feedback">
                                        ກະລຸນາປ້ອນ Username
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="tel">Password <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="password_update" placeholder="Password">
                                    <small class="invalid-feedback">
                                        ກະລຸນາປ້ອນ Password
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

                let $code = $('#code').val();
                let $name = $('#name').val();
                let $gender = $('#gender').val();
                let $tel = $('#tel').val();
                let $address = $('#address').val();
                let $card_no = $('#card_no').val();
                let $username = $('#username').val();
                let $password = $('#password').val();

                if ($code != null && $name != null && $gender != null && $card_no != null && $username != null && $password != null) {
                    $.ajax({
                        url: 'http://localhost/laksaohotel/api/admin/customer/insert',
                        type: 'post',
                        data: {
                            'code': $code,
                            'name': $name,
                            'gender': $gender,
                            'tel': $tel,
                            'address': $address,
                            'card_no': $card_no,
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
                            $('#tel').val("");
                            $('#address').val("");
                            $('#card_no').val("");
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
                    let $tel = $('#tel_update').val();
                    let $address = $('#address_update').val();
                    let $card_no = $('#card_no_update').val();
                    let $username = $('#username_update').val();
                    let $password = $('#password_update').val();

                    if ($code != '' && $name != '' && $gender != '' && $card_no != '' && $username != '') {
                        $.ajax({
                            url: 'http://localhost/laksaohotel/api/admin/customer/update',
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
                                'username': $username,
                                'password': $password,
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
                                $('#username_update').val("");
                                $('#password_update').val("");

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
                url: 'http://localhost/laksaohotel/api/admin/customer/update',
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
                        url: 'http://localhost/laksaohotel/api/admin/customer/delete',
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