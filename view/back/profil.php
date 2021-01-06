<?php 

include 'koneksi.php';

if (@$_SESSION['dosen']) {
    $user_terlogin = @$_SESSION['dosen'];
} elseif (@$_SESSION['mahasiswa']) {
    @$user_terlogin = $_SESSION['mahasiswa'];
}

$query = "SELECT * FROM users WHERE id = '$user_terlogin'";
$sql_user = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($sql_user);



?>



<div id="layoutSidenav_content">
    <main>
        <div class="container">
            <h3>Profil</h3>
            <div class="p-2 bg-light">
                <a href="index.php">Home</a>/ Profile
            </div>
            <div class="row d-flex justify-content-center mt-3">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            Profil User
                        </div>
                        <div class="card-body">
                            <form action="profil_proses.php" method="post">
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" name="nama" id="nama" placeholder="Masukan nama lengkap"
                                        class="form-control" aria-describedby="helpId"
                                        value="<?php echo $data['nama'];?>">
                                </div>
                                <div class="form-group">
                                    <label for="email">E-Mail</label>
                                    <input type="email" id="email" value="<?php echo $data['username'];?>" email"
                                        class="form-control" placeholder="Masukan Email" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Kata Sandi</label>
                                    <input type="password" id="password" name="password" class="form-control"
                                        placeholder="Masukan Password" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                    <button type="reset" class="btn btn-light">RESET</button>
                                </div>
                            </form>
                        </div>
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