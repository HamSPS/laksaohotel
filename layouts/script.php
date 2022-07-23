<!-- jQuery -->
<script src="<?= $path ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- <script src="<?= $path ?>assets/plugins/popper/popper.min.js"></script> -->
<!-- jQuery UI 1.11.4 -->
<script src="<?= $path ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= $path ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= $path ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= $path ?>assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= $path ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= $path ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= $path ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- Bootstrap table -->
<script src="<?= $path ?>assets/plugins/bootstrap-table/dist/bootstrap-table.min.js"></script>
<!-- <script src="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.js"></script> -->
<!-- daterangepicker -->
<script src="<?= $path ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?= $path ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Full Calendar -->
<script src="<?= $path ?>assets/plugins/fullcalendar/main.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= $path ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= $path ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= $path ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= $path ?>assets/dist/js/adminlte.js"></script>
<!-- Sweetalert 2 -->
<script src="<?= $path ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Price Formatter -->
<script src="<?= $path ?>assets/plugins/price_formatter/jquery.priceformat.min.js"></script>
<!-- Select 2 -->
<script src="<?= $path ?>assets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

<script src="<?= $path ?>assets/dist/js/script.js"></script>


<script>
    $('.kip-format').priceFormat({
        prefix: 'LAK ',
        // centsSeparator: ',',
        // thousandsSeparator: '.'
    });

    function logout() {
        Swal.fire({
            title: 'ຕ້ອງການອອກຈາກລະບົບ',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?= $path ?>api/logout'
            }
        })
    }

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
</script>