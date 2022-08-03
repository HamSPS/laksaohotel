<footer class="main-footer">
    <strong>&copy; ສະບາຍດີຫຼັກ 20</strong>

    <?php
        if($_SESSION['role'] == 'member'){
            echo '<span class="inline pl-4"><a href="http://localhost/laksaohotel" target="_blank"><i class="fas fa-external-link-alt"></i> ສະແດງໜ້າເວັບໄຊ໌</a></span>';
        }
    ?>

    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
    </div>
</footer>