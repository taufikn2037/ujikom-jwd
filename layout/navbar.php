<?php
// Get URI
$page = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
?>

<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-danger bg-gradient">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="img/hotel.png" width="40" height="40">
            <b>Hotel RedFlag</b>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse me-auto" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= $page == 'index.php' ? 'active' : ''; ?>" aria-current="page"
                        href="index.php">Produk</a>
                </li>
                <li class="nav-item">
                    <a class=" nav-link <?= $page == 'tentang.php' ? 'active' : ''; ?>" href="tentang.php">Tentang
                        Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $page == '' ? 'active' : ''; ?>" href="">Pesan Kamar</a>
                </li>
            </ul>
        </div>
    </div>
</nav>