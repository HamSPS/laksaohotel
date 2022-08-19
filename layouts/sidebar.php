<?php
if ($_SESSION['role'] == 'admin') {
?>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="<?= $path ?>pages/admin/dashboard" class="brand-link">
            <img src="<?= $path ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">ສະບາຍດີຫຼັກ 20</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-header text-lg">ລາຍການ</li>
                    <li class="nav-item">
                        <a href="<?= $path ?>pages/admin/dashboard" class="nav-link <?= $IsActive == 0 ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                ໜ້າຫຼັກ
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link <?= $IsActive >= 1 && $IsActive <= 4 ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-th-large"></i>
                            <p>ຈັດການຂໍ້ມູນ</p>
                            <i class="fas fa-angle-left right"></i>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= $path ?>pages/admin/manage/room" class="nav-link <?= $IsActive == 4 ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-bed"></i>
                                    <p>
                                        ຈັດການຂໍ້ມູນຫ້ອງພັກ
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= $path ?>pages/admin/manage/employees" class="nav-link <?= $IsActive == 1 ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>
                                        ຈັດການຂໍ້ມູນພະນັກງານ
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= $path ?>pages/admin/manage/room-type" class="nav-link <?= $IsActive == 3 ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-list"></i>
                                    <p>
                                        ຈັດການຂໍ້ມູນປະເພດຫ້ອງພັກ
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= $path ?>pages/admin/manage/customers" class="nav-link <?= $IsActive == 2 ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        ຈັດການຂໍ້ມູນລູກຄ້າ
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- <li class="nav-item">
                    <a href="<?= $path ?>pages/admin/booking/booking" class="nav-link <?= $IsActive == 5 ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>
                            ຈອງຫ້ອງພັກ
                        </p>
                    </a>
                </li> -->

                    <li class="nav-item">
                        <a href="<?= $path ?>pages/admin/services/index" class="nav-link <?= $IsActive == 6 ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-calendar-check"></i>
                            <p>
                                ບໍລິການ
                            </p>
                        </a>
                    </li>



                    <li class="nav-item ">
                        <a href="#" class="nav-link <?= $IsActive >= 7 && $IsActive <= 14 ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                ລາຍງານ
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= $path ?>pages/admin/report/employees" class="nav-link <?= $IsActive == 7 ? 'active' : '' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>ລາຍງານຂໍ້ມູນພະນັກງານ</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= $path ?>pages/admin/report/customers" class="nav-link <?= $IsActive == 8 ? 'active' : '' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>ລາຍງານຂໍ້ມູນລູກຄ້າ</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= $path ?>pages/admin/report/room" class="nav-link <?= $IsActive == 9 ? 'active' : '' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>ລາຍງານຂໍ້ມູນຫ້ອງພັກ</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= $path ?>pages/admin/report/room-type" class="nav-link <?= $IsActive == 10 ? 'active' : '' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>ລາຍງານຂໍ້ມູນປະເພດຫ້ອງພັກ</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= $path ?>pages/admin/report/booking" class="nav-link <?= $IsActive == 12 ? 'active' : '' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>ລາຍງານຂໍ້ມູນການຈອງ</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= $path ?>pages/admin/report/check-in" class="nav-link <?= $IsActive == 13 ? 'active' : '' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>ລາຍງານຂໍ້ມູນບໍລິການ</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= $path ?>pages/admin/report/revenue" class="nav-link <?= $IsActive == 14 ? 'active' : '' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>ລາຍງານສະຫຼຸບລາຍຮັບ</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
<?php
} else {
?>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="<?= $path ?>pages/member/dashboard" class="brand-link">
            <img src="<?= $path ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">ສະບາຍດີຫຼັກ 20</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-header text-lg">ລາຍການ</li>
                    <li class="nav-item">
                        <a href="<?= $path ?>" class="nav-link <?= $IsActive == 0 ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                ໜ້າຫຼັກ
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $path ?>pages/member/history" class="nav-link <?= $IsActive == 1 ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-clock"></i>
                            <p>
                                ປະຫວັດການຈອງ
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
<?php
}
?>