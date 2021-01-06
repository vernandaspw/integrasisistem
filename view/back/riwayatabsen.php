<?php 
$npm = $_SESSION['npm'];

$query = mysqli_query($conn, "SELECT * FROM tb_absen WHERE npm = '$npm' ");

$jumlahhadir =  mysqli_fetch_array(mysqli_query($conn, "SELECT count(*) from tb_absen WHERE npm='$npm' AND status='Hadir'"))[0];
$jumlahizin = mysqli_fetch_array(mysqli_query($conn, "SELECT count(*) from tb_absen WHERE npm='$npm' AND status='Izin'"))[0];
$jumlahsakit = mysqli_fetch_array(mysqli_query($conn, "SELECT count(*) from tb_absen WHERE npm='$npm' AND status='Sakit'"))[0];
$jumlahalfa = mysqli_fetch_array(mysqli_query($conn, "SELECT count(*) from tb_absen WHERE npm='$npm' AND status='Alfa'"))[0];

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Riwayat absensi kamu</h1>
            <hr>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4" style="-webkit-box-shadow: -1px 20px 66px -21px rgba(0,0,0,0.59);
-moz-box-shadow: -1px 20px 66px -21px rgba(0,0,0,0.59);
box-shadow: -1px 20px 66px -21px rgba(0,0,0,0.59);">
                        <div class="card-body">
                            <b>Hadir</b>
                            <br>
                            <h4 class="mt-1"><?= $jumlahhadir ?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-info text-white mb-4" style="-webkit-box-shadow: -1px 20px 66px -21px rgba(0,0,0,0.59);
-moz-box-shadow: -1px 20px 66px -21px rgba(0,0,0,0.59);
box-shadow: -1px 20px 66px -21px rgba(0,0,0,0.59);">
                        <div class="card-body">
                            <b>Izin</b>
                            <br>
                            <h4 class="mt-1"><?= $jumlahizin ?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4" style="-webkit-box-shadow: -1px 20px 66px -21px rgba(0,0,0,0.59);
-moz-box-shadow: -1px 20px 66px -21px rgba(0,0,0,0.59);
box-shadow: -1px 20px 66px -21px rgba(0,0,0,0.59);">
                        <div class="card-body">
                            <b>Sakit</b>
                            <br>

                            <h4 class="mt-1"><?= $jumlahsakit ?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4" style="-webkit-box-shadow: -1px 20px 66px -21px rgba(0,0,0,0.59);
-moz-box-shadow: -1px 20px 66px -21px rgba(0,0,0,0.59);
box-shadow: -1px 20px 66px -21px rgba(0,0,0,0.59);">
                        <div class="card-body">
                            <b>Alfa</b>
                            <br>

                            <h4 class="mt-1"><?= $jumlahalfa ?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card mb-4 mt-4" style="-webkit-box-shadow: 3px 18px 61px -24px rgba(0,0,0,0.59);
-moz-box-shadow: 3px 18px 61px -24px rgba(0,0,0,0.59);
box-shadow: 3px 18px 61px -24px rgba(0,0,0,0.59);">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Riwayat Absensi <?= $_SESSION['nama'] ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                while ($row = mysqli_fetch_array($query)){
                                ?>
                                <tr>
                                    <td><?= $row['tanggal']; ?></td>
                                    <td><?= $row['status']; ?></td>
                                    <td><?= $row['keterangan']; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

</div>