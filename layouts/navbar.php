<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link"><?=$title?></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown pointer">
            <a href="#" class="nav-link" data-toggle="dropdown">
                <i class="fas fa-user"></i>
                <?=$_SESSION['fullname']?>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <a href="#" onclick="logout()" class="dropdown-item text-danger">
                    <i class="fas fa-sign-out-alt"></i> ອອກຈາກລະບົບ
                </a>
            </div>
        </li>

    </ul>
</nav>