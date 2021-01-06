<?php 
include './functions.php';
include 'koneksi.php';

session_start();

if (@$_SESSION['dosen'] || @$_SESSION['mahasiswa']) {

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Integrasi sistem malam</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous">
    </script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-primary shadow">
        <a class="navbar-brand" href="index.php">Integrasi Sistem</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->

        <!-- Navbar-->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="admin.php?b=profil">Profil</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="admin.php?b=logout">Logout</a>
                </div>
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Nama</div>
                        <a class="nav-link" readonly>
                            <div class="sb-nav-link-icon"></div>
                            <h5><?= $_SESSION['nama']; ?></h5>

                        </a>

                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="admin.php?b=dashboard">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <?php 
                        if (@$_SESSION['mahasiswa']) {
                        ?>
                        <a class="nav-link" href="admin.php?b=absen">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Absen
                        </a>
                        <?php } ?>
                        <?php 
                        if (@$_SESSION['mahasiswa']) {
                        ?>
                        <a class="nav-link" href="admin.php?b=riwayatabsen">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Riwayat Absensi
                        </a>
                        <?php } ?>
                        <?php 
                        if (@$_SESSION['dosen']) {
                        ?>
                        <a class="nav-link" href="admin.php?b=konfirmasiakun">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Konfirmasi akun
                        </a>
                        <?php } ?>
                        <?php 
                        if (@$_SESSION['dosen']) {
                        ?>
                        <a class="nav-link" href="admin.php?b=konfirmasiabsensi">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Konfirmasi absensi
                        </a>
                        <?php } ?>
                        <?php 
                        if (@$_SESSION['dosen']) {
                        ?>
                        <a class="nav-link" href="admin.php?b=laporanabsen">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Laporan absen hari ini
                        </a>
                        <?php } ?>

                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Masuk sebagai:</div>
                    <?= $_SESSION['level']; ?>
                </div>
            </nav>
        </div>
        <?php 
        
        include './route/back.php';
        
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>

</html>

<?php 
} else {
    header('Location: index.php');
}

?>