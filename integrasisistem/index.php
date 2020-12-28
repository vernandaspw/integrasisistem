<?php 

include './functions.php';


session_start();
daftardosen();
daftarmahasiswa();
login();
auth();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once "./layout/head.php"; ?>
</head>

<body>
    <nav class="navbar shadow navbar-expand-lg navbar-light bg-primary">
        <div class="container">
            <a class="navbar-brand" href="index.php" style="color:white;"><b>Kelas Integrasi Sistem</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active ms-2" style="color:white;" aria-current="page"
                            href="index.php">Home</a>
                    </li>
                    <li class="nav-item ms-3">
                        <a class="nav-link" style="color:white;" href="index.php?h=login">Login</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a type="button" class="nav-link btn btn-warning" data-bs-toggle="modal"
                            data-bs-target="#daftar" style="text-decoration:none; color:white;">
                            Daftar
                        </a>
                        <div class="modal fade" id="daftar" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Daftar Sebagai?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body d-flex justify-content-center">
                                        <a href="index.php?h=daftardosen" class="btn btn-primary m-4">Dosen</a>
                                        <a href="index.php?h=daftarmahasiswa" class="btn btn-primary m-4">Mahasiswa</a>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php 
    include_once './route/front.php';
    ?>

    <!-- bs -->
    <?php include_once './layout/bs_js.php'; ?>
</body>

</html>