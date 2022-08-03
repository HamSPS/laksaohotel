<?php
session_start();
$path = "../../";

if (!$_SESSION['user'] || $_SESSION == null) {
    header('location:' . $path .'pages/member/login');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="<?= $path ?>assets/dist/fonts/fonts.css"> -->
    <!-- <link href="../../assets/dist/css/adminlte.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= $path ?>assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= $path ?>assets/plugins/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="../../assets/plugins/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="../../assets/plugins/fullcalendar/main.min.css"> -->
    <?php include '../../layouts/style.php' ?>


   

    <title>ໂຮງແຮງສະບາຍດີຫຼັກ 20</title>
</head>

<body>
    <?php
    include $path.'layouts/member/navbar.php';
    ?>

    <main class="mt-5 pt-5">
        <div class="container">
            <h1>ຈອງຫ້ອງພັກ</h1>
            <div class="row w-screen">
                        <div class="card w-100 card-primary card-outline">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h5>ເພີ່ມຂໍ້ມູນການຈອງ</h5>
                                        <form novalidate class="needs-validation" id="formInsert">
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
                                                <label for="startDate">ວັນທີເລີ່ມ</label>
                                                <input type="date" name="startDate" id="startDate" class="form-control" disabled required>
                                                <div class="invalid-feedback">
                                                    ກະລຸນາເລືອກວັນທີ່ເລີ່ມເຂົ້າພັກ
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="endDate">ວັນທີສິ້ນສຸດ</label>
                                                <input type="date" name="endDate" id="endDate" class="form-control" disabled required>
                                                <div class="invalid-feedback">
                                                    ກະລຸນາເລືອກວັນທີສິ້ນສຸດ
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
        </div>
    </main>


    <?php
    include $path . 'layouts/member/footer.php';
    ?>

    <?php include '../../layouts/script.php' ?>

    <script>
        var startDate = $('#startDate');
        var endDate = $('#endDate');


        disableDate(startDate);
        disableDate(endDate);

        function loadBooked(roomId) {

            $.ajax({
                url: 'http://localhost/laksaohotel/api/admin/booking/load?booked',
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
            // loadCustomer();

            loadFullDate();

            function loadFullDate(roomId = '') {

                let url = '';
                if (roomId != null || roomId != '') {
                    url = 'http://localhost/laksaohotel/api/admin/booking/load?booked&roomId=' + roomId;
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
                $('#startDate').prop("disabled", false);
                $('#endDate').prop("disabled", false);

                let roomId = $('#room').val();
                loadFullDate(roomId);
            })

            function loadRoom(load, id = '') {

                $.ajax({
                    url: 'http://localhost/laksaohotel/api/admin/booking/load?' + load,
                    type: 'post',
                    data: {
                        id: id,
                    },
                    dataType: 'json',
                    success: function(data) {
                        console.log(data[0].name);
                        let html = '';
                        for (let i = 0; i < data.length; i++) {
                            html += `<option value="${data[i].id}">${data[i].name}</option> `;
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

                let $customer = <?= $_SESSION['user'] ?>;
                let $room = $('#room').val();
                let $startDate = $('#startDate').val();
                let $endDate = $('#endDate').val();

                if ($customer != '' && $room != '' && $startDate != '' && $endDate != '') {

                    $.ajax({
                        url: 'http://localhost/laksaohotel/api/member/booking',
                        type: 'post',
                        data: {
                            'customer': $customer,
                            'room': $room,
                            'startDate': $startDate,
                            'endDate': $endDate,
                        },
                        cache: false,
                        success: function(response) {

                            let result = JSON.parse(response);

                            if (result.statusCode === 200) {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: result.message,
                                    showConfirmButton: false,
                                    timer: 3000,
                                    toast: false,
                                    timerProgressBar: true,
                                }).then(() => {
                                    window.location.href = "<?= $path ?>pages/member/history"
                                })
                            } else {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'error',
                                    title: result.message,
                                    showConfirmButton: false,
                                    timer: 3000,
                                    toast: true,
                                    timerProgressBar: true,
                                })
                            }
                        }
                    })
                }
            });

        });
    </script>
   
</body>

</html>