<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="#">ສະບາຍດີຫຼັກ 20</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= $path ?>"><i class="fas fa-home"></i> ໜ້າຫຼັກ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $path ?>pages/member/booking"><i class="fas fa-bookmark"></i> ຈອງຫ້ອງພັກ</a>
                </li>

            </ul>
            <div class="d-flex">
                <ul class="navbar-nav">
                    <?php if (!isset($_SESSION['user'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $path ?>pages/member/login"><i class="fas fa-user"></i> ເຂົ້າສູ່ລະບົບ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $path ?>pages/member/register"><i class="fas fa-user-plus"></i> ສະໝັກສະມາຊິກ</a>
                        </li>
                    <?php  } else { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user"></i> <?= $_SESSION['fullname'] ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="<?= $path ?>pages/member/dashboard"><i class="fas fa-chart-bar"></i> ເບິ່ງລາຍການຈອງ</a></li>
                                <li><a class="dropdown-item" href="#" onclick="logout()"><i class="fas fa-sign-out-alt"></i> ອອກຈາກລະບົບ</a></li>
                            </ul>
                        </li>
                    <?php  } ?>
                </ul>
            </div>
        </div>
    </div>
</nav> -->

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">ສະບາຍດີຫຼັກ 20</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= $path ?>"><i class="fas fa-home"></i> ໜ້າຫຼັກ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $path ?>pages/member/booking"><i class="fas fa-bookmark"></i> ຈອງຫ້ອງພັກ</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <?php if (isset($_SESSION['user'])) { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i> <?= $_SESSION['fullname'] ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?= $path ?>pages/member/dashboard"><i class="fas fa-chart-bar"></i> ເບິ່ງລາຍການຈອງ</a></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="#" onclick="logout()"><i class="fas fa-sign-out-alt"></i> ອອກຈາກລະບົບ</a></a>
                        </div>
                    </li>
                <?php  } else { ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= $path ?>pages/member/login"><i class="fas fa-user"></i> ເຂົ້າສູ່ລະບົບ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $path ?>pages/member/register"><i class="fas fa-user-plus"></i> ສະໝັກສະມາຊິກ</a>
                    </li>
                <?php  } ?>
            </ul>
        </div>
    </div>
</nav>