<?php
session_start();
$path = '../../';

if(isset($_SESSION['user'])){
    header('location: '.$path.'pages/member/dashboard');
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

<body>
    <?php include $path . 'layouts/member/navbar.php'; ?>
    <div class="d-flex align-items-center justify-content-center w-100 vh-100">
        <div class="w-25">
            <form novalidate class="needs-validation" id="loginForm">
                <h1 class="text-center font-weight-bold">ໂຮງແຮມ ສະບາຍດີຫຼັກ 20</h1>
                <div class="mb-3">
                    <label for="username">ຊື່ຜູ້ໃຊ້</label>
                    <input type="text" class="form-control" id="username" placeholder="ປ້ອນຊື່ຜູ້ໃຊ້" required>
                    <small class="invalid-feedback">
                        ກະລຸນາປ້ອນຊື່ຜູ້ໃຊ້
                    </small>
                </div>
                <div class="mb-3">
                    <label for="password">ລະຫັດຜ່ານ</label>
                    <input type="password" class="form-control" id="password" placeholder="ປ້ອນລະຫັດຜ່ານ" required>
                    <small class="invalid-feedback">
                        ກະລຸນາປ້ອນລະຫັດຜ່ານ
                    </small>
                </div>
                <div class="d-grid gap-2 mt-4"> <button type="submit" id="btnLogin" class="btn btn-primary btn-block">ເຂົ້າສູ່ລະບົບ</button></div>

                <hr class="my-5">

                <p class="text-center">
                    ມີບັນຊີແລ້ວ ຫຼື ບໍ່? <a href="register" class="link-primary">ສະໝັກສະມາຊິກ</a>
                </p>

                <p class="text-center">
                    <a href="../admin/login" class="link-success">ລະບົບຫຼັງບ້ານ</a>
                </p>
            </form>
        </div>
    </div>
    <?php
    include $path . 'layouts/member/footer.php';
    ?>

    <?php
    include $path . 'layouts/script.php';
    ?>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })();

        $("#loginForm").on('submit', function(e) {
            e.preventDefault();
            let username = $('#username').val();
            let password = $('#password').val();

            $.ajax({
                url: '<?= $path ?>api/member/login',
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
                        }).then(() => window.location.href = "history")
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