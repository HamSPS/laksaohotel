<?php
session_start();
$path = '../../';

if(isset($_SESSION['user'])){
    header('location: '.$path.'dashboard');
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
    <div class="d-flex align-items-center justify-content-center w-100 h-100 mt-5">
        <div class="w-25 mt-5">
            <h1 class="text-center font-weight-bold">ໂຮງແຮມ ສະບາຍດີຫຼັກ 20</h1>
            <form novalidate class="needs-validation" id="registerForm">
                <div class="mb-3">
                    <label for="username">ຊື່ຜູ້ໃຊ້ <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="username" placeholder="ປ້ອນຊື່ຜູ້ໃຊ້" required>
                    <small class="invalid-feedback">
                        ກະລຸນາປ້ອນຊື່ຜູ້ໃຊ້
                    </small>
                    <small id="checkUser"></small>
                </div>
                <div class="mb-3">
                    <label for="password">ລະຫັດຜ່ານ <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="password" placeholder="ປ້ອນລະຫັດຜ່ານ" required autocomplete="on">
                    <small class="invalid-feedback">
                        ກະລຸນາປ້ອນລະຫັດຜ່ານ
                    </small>
                </div>
                <hr>
                <div class="mb-3">
                    <label for="name">ຊື່ ແລະ ນາມສະກຸນ <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" placeholder="ປ້ອນຊື່ ແລະ ນາມສະກຸນ" required>
                    <small class="invalid-feedback">
                        ກະລຸນາປ້ອນຊື່ ແລະ ນາມສະກຸນ
                    </small>

                </div>
                <div class="mb-3">
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
                <div class="mb-3">
                    <label for="tel">ເບີໂທ</label>
                    <input type="text" class="form-control" id="tel" placeholder="ເບີໂທ">
                </div>
                <div class="mb-3">
                    <label for="address">ທີ່ຢູ່</label>
                    <textarea type="text" class="form-control" id="address" placeholder="ທີ່ຢູ່"></textarea>
                </div>
                <div class="mb-3">
                    <label for="tel">ບັດປະຈຳຕົວ ຫຼື ໜັງສືຜ່ານແດນ <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="card_no" placeholder="ບັດປະຈຳຕົວ ຫຼື ໜັງສືຜ່ານແດນ" required>
                    <small class="invalid-feedback">
                        ກະລຸນາປ້ອນບັດປະຈຳຕົວ ຫຼື ໜັງສືຜ່ານແດນ
                    </small>
                </div>
                <div class="d-grid gap-2 mt-4"> <button type="submit" id="btnLogin" class="btn btn-success btn-block">ສະໝັກສະມາຊິກ</button></div>

            </form>
            <hr class="my-5">

            <p class="text-center mb-5">
                ມີບັນຊີແລ້ວ ຫຼື ບໍ່? <a href="login" class="link-primary">ເຂົ້າສູ່ລະບົບ</a>
            </p>
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

        $('#username').on('change', function() {
            let username = $('#username').val();
            $.ajax({
                url: 'http://localhost/laksaohotel/api/member/check-username',
                type: 'post',
                data: {
                    'username': username
                },
                success: function(data) {
                    let result = JSON.parse(data);

                    if (result[0].statusCode === 200) {
                        $('#checkUser').html("<span class='text-success'>" + result[0].message + "</span>");
                    } else {
                        $('#checkUser').html("<span class='text-danger'>" + result[0].message + "</span>");
                    }
                }
            })
        })

        $('#registerForm').on('submit', function(e) {
            e.preventDefault();

            let $username = $('#username').val();
            let $password = $('#password').val();
            let $name = $('#name').val();
            let $gender = $('#gender').val();
            let $tel = $('#tel').val();
            let $address = $('#address').val();
            let $card_no = $('#card_no').val();

            if ($username != null && $password != null && $name != null && $gender != null && $card_no != null) {
                $.ajax({
                    url: '<?= $path ?>api/member/register',
                    type: 'post',
                    data: {
                        'username': $username,
                        'password': $password,
                        'name': $name,
                        'gender': $gender,
                        'tel': $tel,
                        'address': $address,
                        'card_no': $card_no,
                    },
                    cache: false,
                    success: function(dataResult) {
                        let result = JSON.parse(dataResult);

                        if (result.statusCode === 200) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: result.message,
                                showConfirmButton: false,
                                timer: 3000,
                                toast: true,
                                timerProgressBar: true,
                            }).then(() => {
                                window.location.href = "dashboard";
                            })
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
                        }
                    }
                })
            } else {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'ກະລຸນາປ້ອນຂໍ້ມູນໃຫ້ຄົບຖ້ວນ',
                    showConfirmButton: false,
                    timer: 1500
                })
            }

        });
    </script>
</body>

</html>