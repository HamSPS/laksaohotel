<?php
session_start();
$path = '../../../';
$title = "ການເຂົ້າພັກ";
$IsActive = 6;


if (!$_SESSION['user'] || $_SESSION == null) {
    header('location:' . $path.'pages/admin/login');
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
                    <div class="row w-screen">
                        <div class="card w-100 card-primary card-outline">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h5>ເພີ່ມຂໍ້ມູນການເຂົ້າພັກ</h5>
                                        <form novalidate class="needs-validation" id="formInsert">
                                            <div class="form-group">
                                                <label for="customer">ລູກຄ້າ</label>
                                                <div class=" input-group">
                                                    <select name="" id="customer" class="selectpicker form-control" title="ເລືອກຂໍ້ມູນລູກຄ້າ" data-live-search="true" required>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <a href="<?= $path ?>pages/admin/manage/customers" class="btn btn-success"><i class="fas fa-plus"></i> ເພີ່ມ</a>
                                                    </div>
                                                </div>
                                                <div class="invalid-feedback">
                                                    ກະລຸນາເລືອກຂໍ້ມູນລູກຄ້າ
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="type">ເລືອກປະເພດຫ້ອງ</label>
                                                <select name="" id="type" class="selectpicker form-control" title="ເລືອກຂໍ້ມູນປະເພດຫ້ອງ">
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="room">ເລືອກຫ້ອງພັກ</label>
                                                <select name="" id="room" class="selectpicker form-control" title="ເລືອກຫ້ອງພັກ" required>
                                                    <option value="" disabled>ກະລຸນາເລືອກປະເພດຫ້ອງພັກ</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    ກະລຸນາເລືອກຫ້ອງພັກ
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success btn-block">ບັນທຶກ</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-8">
                                        <div id="calendar"></div>
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


    <script>
        var startDate = $('#startDate');
        var endDate = $('#endDate');


        disableDate(startDate);
        disableDate(endDate);

        function loadBooked(roomId) {

            $.ajax({
                url: 'http://localhost/laksaohotel/api/admin/services/load?booked',
                type: 'post',
                data: {
                    roomId: roomId,
                },
                dataType: 'json',
                success: function(result) {
                    console.log(result);

                    return result;
                }
            });
        }

        function disableDate(object) {
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;
            // alert(maxDate);
            object.attr('min', maxDate);
        }

        $(document).ready(function() {
            loadCustomer();

            loadFullDate();

            function loadFullDate(roomId = '') {

                let url = '';
                if (roomId != null || roomId != '') {
                    url = 'http://localhost/laksaohotel/api/admin/services/load?booked&roomId=' + roomId;
                    var calendarEl = document.getElementById('calendar');
                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'dayGridMonth',
                        events: url
                    });
                } else {
                    var calendarEl = document.getElementById('calendar');
                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'dayGridMonth',
                    });
                }
                calendar.render();
            }

            function loadCustomer() {
                let customer = $('#customer');
                $.ajax({
                    url: 'http://localhost/laksaohotel/api/admin/services/load?customer',
                    dataType: 'json',
                    success: function(data) {
                        let html = '';
                        for (let count = 0; count < data.length; count++) {
                            html += `<option value="${data[count].id}">${data[count].name}</option> `;
                        }

                        customer.html(html);
                        customer.selectpicker();
                        customer.selectpicker('refresh');

                    }
                })
            }

            var type = $('#type');
            var room = $('#room');
            type.selectpicker();
            room.selectpicker();


            type.on('change', function() {
                let id = type.val();
                loadRoom('room', id);
            });

            loadRoom('type');

            room.on('change', function() {
                let roomId = $('#room').val();
                loadFullDate(roomId);
            })

            function loadRoom(load, id = '') {

                $.ajax({
                    url: 'http://localhost/laksaohotel/api/admin/services/load?' + load,
                    type: 'post',
                    data: {
                        id: id,
                    },
                    dataType: 'json',
                    success: function(data) {
                        let html = '';
                        for (let count = 0; count < data.length; count++) {
                            html += `<option value="${data[count].id}">${data[count].name}</option> `;
                        }

                        if (load === 'type') {
                            type.html(html);
                            type.selectpicker('refresh');
                        } else {
                            room.html(html);
                            room.selectpicker('refresh');
                        }

                    }
                })
            }

            // Insert data
            $('#formInsert').on('submit', function(e) {
                e.preventDefault();

                let $customer = $('#customer').val();
                let $room = $('#room').val();

                if ($customer != '' && $room != '') {

                    $.ajax({
                        url: 'http://localhost/laksaohotel/api/admin/services/check_in',
                        type: 'post',
                        data: {
                            'customer': $customer,
                            'room': $room,
                            'user': '<?= $_SESSION['user'] ?>'
                        },
                        cache: false,
                        success: function(response) {

                            let result = JSON.parse(response);

                            console.log(result);
                            if (result[0].statusCode === 200) {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: result[0].message,
                                    showConfirmButton: false,
                                    timer: 3000,
                                    toast: false,
                                    timerProgressBar: true,
                                })
                                .then(() => {
                                    window.location.href = "index"
                                })
                            } else {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'error',
                                    title: result[0].message,
                                    showConfirmButton: false,
                                    timer: 3000,
                                    toast: true,
                                    timerProgressBar: true,
                                })
                                .then(() => {
                                    window.location.href = "index"
                                });
                            }
                        }
                    })
                }
            });

        });
    </script>
</body>

</html>