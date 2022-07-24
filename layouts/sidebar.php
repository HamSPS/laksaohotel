<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?= $path ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">ໂຮງແຮມຫຼັກ 20</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">ໜ້າຫຼັກ</li>
                <li class="nav-item">
                    <a href="<?= $path ?>" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            ໜ້າຫຼັກ
                        </p>
                    </a>
                </li>
                <li class="nav-header">ຈັດການຂໍ້ມູນ</li>
                <li class="nav-item">
                    <a href="<?= $path ?>pages/manage/employees" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            ຂໍ້ມູນພະນັກງານ
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $path ?>pages/manage/customers" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            ຂໍ້ມູນລູກຄ້າ
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $path ?>pages/manage/room-type" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            ຂໍ້ມູນປະເພດຫ້ອງພັກ
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $path ?>pages/manage/room" class="nav-link">
                        <i class="nav-icon fas fa-bed"></i>
                        <p>
                            ຂໍ້ມູນຫ້ອງພັກ
                        </p>
                    </a>
                </li>
                <li class="nav-header">ບໍລິການ</li>
                <li class="nav-item">
                    <a href="<?= $path ?>pages/booking/booking" class="nav-link">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>
                            ຈອງຫ້ອງພັກ
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $path ?>pages/check-out/index" class="nav-link">
                        <i class="nav-icon fas fa-calendar-check"></i>
                        <p>
                            ເຂົ້າພັກ
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>