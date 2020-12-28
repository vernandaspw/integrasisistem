<?php 




if (@$_SESSION['dosen'] || @$_SESSION['mahasiswa']) {
    header("Location: admin.php");
} else {
?>

<div class="container d-flex justify-content-center mt-5">
    <div class="col-md-4 mt-4">
        <div class="card" style="-webkit-box-shadow: -1px 20px 66px -21px rgba(0,0,0,0.59);
-moz-box-shadow: -1px 20px 66px -21px rgba(0,0,0,0.59);
box-shadow: -1px 20px 66px -21px rgba(0,0,0,0.59);">
            <div class="card-header bg-primary">
                <h4 style="color: white;">Login disini</h4>
            </div>
            <div class="card-body">
                <form action="index.php?h=auth" method="post">
                    <div class="form-group mt-1">
                        <label for="username">Username</label>
                        <input required type="username" name="username" id="username" placeholder="Masukan username"
                            class="form-control mt-1" maxlength="15" aria-describedby="helpId">
                        <small id="helpId" class="text-muted">panjang maksimal 15</small>
                    </div>
                    <div class="form-group mt-2">
                        <label for="passwordd">Password</label>
                        <input required type="password" name="passwor" id="passwordd" placeholder="Masukan kata sandi"
                            class="form-control mt-1">
                    </div>

                    <button type="submit" name="lanjut" class="btn btn-primary form-control mt-4">Lanjut</button>
                </form>
            </div>
            <div class="card-footer bg-white">
                Belum memiliki akun? <a type="button" class="" data-bs-toggle="modal" data-bs-target="#exampleModal"
                    style="text-decoration:none;">
                    Daftar disini
                </a>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Daftar Sebagai?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex justify-content-center">
                        <a href="daftardosen.php" class="btn btn-primary m-4">Dosen</a>
                        <a href="daftarmahasiswa.php" class="btn btn-primary m-4">Mahasiswa</a>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
} 


?>