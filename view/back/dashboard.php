<?php 


$query = "SELECT * FROM users WHERE level = 'mahasiswa'";
$sql_user = mysqli_query($conn, $query);

$jumlahmahasiswa = mysqli_fetch_array(mysqli_query($conn, "SELECT count(*) from users WHERE level='mahasiswa'"))[0];
$jumlahlaki = mysqli_fetch_array(mysqli_query($conn, "SELECT count(*) from users WHERE jenis_kelamin='Laki-laki'"))[0];
$jumlahperempuan = mysqli_fetch_array(mysqli_query($conn, "SELECT count(*) from users WHERE jenis_kelamin='Perempuan'"))[0];

?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-info text-white mb-4" style="-webkit-box-shadow: -1px 20px 66px -21px rgba(0,0,0,0.59);
-moz-box-shadow: -1px 20px 66px -21px rgba(0,0,0,0.59);
box-shadow: -1px 20px 66px -21px rgba(0,0,0,0.59);">
                        <div class="card-body">
                            <b>By : Kelompok 4</b>
                            <li>Vernanda Septia Wanandi</li>
                            <li>Irma Resmi Sari</li>
                            <li>Julianto Saputra Sitinjak</li>
                            <li>Luis Kolentia</li>
                            <li>M. Arya Putra Pratama</li>
                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4" style="-webkit-box-shadow: -1px 20px 66px -21px rgba(0,0,0,0.59);
-moz-box-shadow: -1px 20px 66px -21px rgba(0,0,0,0.59);
box-shadow: -1px 20px 66px -21px rgba(0,0,0,0.59);">
                        <div class="card-body">
                            <b>Jumlah Mahasiswa</b>
                            <br>
                            <h3><?php echo $jumlahmahasiswa ; ?></h3>
                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4" style="-webkit-box-shadow: -1px 20px 66px -21px rgba(0,0,0,0.59);
-moz-box-shadow: -1px 20px 66px -21px rgba(0,0,0,0.59);
box-shadow: -1px 20px 66px -21px rgba(0,0,0,0.59);">
                        <div class="card-body">
                            <b>Laki-laki</b>
                            <br>
                            <h3><?php echo $jumlahlaki ; ?></h3>
                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4" style="-webkit-box-shadow: -1px 20px 66px -21px rgba(0,0,0,0.59);
-moz-box-shadow: -1px 20px 66px -21px rgba(0,0,0,0.59);
box-shadow: -1px 20px 66px -21px rgba(0,0,0,0.59);">
                        <div class="card-body">
                            <b>Prempuan</b>
                            <br>
                            <h3><?php echo $jumlahperempuan ; ?></h3>
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
                    Mahasiswa
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>NPM</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <?php 
                                    if (@$_SESSION['dosen']) {
                                    ?>
                                    <th>Action</th>
                                    <?php } else {} ?>
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
                                while ($row = mysqli_fetch_assoc($sql_user)){
                                
                                ?>
                                <tr>
                                    <td><?= $row['npm']; ?></td>
                                    <td><?= $row['nama']; ?></td>
                                    <td><?= $row['jenis_kelamin']; ?></td>
                                    <?php 
                                    if (@$_SESSION['dosen']) {
                                    ?>
                                    <td>
                                        <center><a href="admin.php?b=ubahm&npm=<?= $row['npm']; ?>"
                                                class="btn btn-info">Edit</a>
                                            &nbsp; &nbsp;
                                            <a href="admin.php?b=hapusm&npm=<?= $row['npm']; ?>"
                                                onclick="return confirm('Apakah yakin ingin dihapus?')">
                                                <Button class="btn btn-danger">Hapus</Button>
                                            </a>
                                        </center>
                                    </td>
                                    <?php } else {} ?>
                                </tr>
                                <?php 
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Your Website 2020</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
</div>