<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ໂຮງແຮມຫຼັກ 20</title>
    <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../assets/plugins/sweetalert2/sweetalert2.min.css">
</head>

<body>
    <div class="d-flex align-items-center justify-content-center w-100 vh-100">
        <div class="w-25">
            <form novalidate class="needs-validation" id="loginForm">
                <h1 class="text-center font-weight-bold">ໂຮງແຮມຫຼັກ 20</h1>
                <div class="form-group">
                    <label for="username">ຊື່ຜູ້ໃຊ້</label>
                    <input type="text" class="form-control" id="username" placeholder="ປ້ອນຊື່ຜູ້ໃຊ້" required>
                    <small class="invalid-feedback">
                        ກະລຸນາປ້ອນຊື່ຜູ້ໃຊ້
                    </small>
                </div>
                <div class="form-group">
                    <label for="password">ລະຫັດຜ່ານ</label>
                    <input type="password" class="form-control" id="password" placeholder="ປ້ອນລະຫັດຜ່ານ" required>
                    <small class="invalid-feedback">
                        ກະລຸນາປ້ອນລະຫັດຜ່ານ
                    </small>
                </div>
                <button type="submit" id="btnLogin" class="btn btn-primary btn-block">ເຂົ້າສູ່ລະບົບ</button>
            </form>
        </div>
    </div>

    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/dist/js/adminlte.js"></script>
    <script src="../assets/plugins/sweetalert2/sweetalert2.min.js"></script>

    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

    $("#loginForm").on('submit', function(e) {
        e.preventDefault();
        let username = $('#username').val();
        let password = $('#password').val();

        $.ajax({
            url: '../api/login',
            method: 'POST',
            data: {
                'username': username,
                'password': password,
            },
            dataType: 'text',
            success: function(data) {
                if (data === 'success') {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'ເຂົ້າສູ່ລະບົບສຳເລັດ',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => window.location.href = "/laksaohotel/")
                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'ຊື່ຜູ້ໃຊ້ ຫຼື ລະຫັດຜ່ານບໍ່ຖືກຕ້ອງ ກະລຸນາລອງໃໝ່!!!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        })
    })
    </script>
</body>

</html>