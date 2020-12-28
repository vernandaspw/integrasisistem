<?php 



?>



<div class="container d-flex justify-content-center mb-5">
    <div class="col-md-4 mt-4">
        <div class="card" style="-webkit-box-shadow: -1px 20px 66px -21px rgba(0,0,0,0.59);
-moz-box-shadow: -1px 20px 66px -21px rgba(0,0,0,0.59);
box-shadow: -1px 20px 66px -21px rgba(0,0,0,0.59);">
            <div class="card-header bg-primary">
                <h4 style="color:white;">Daftar akun Mahasiswa</h4>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group mt-1">
                        <label for="username">Username</label>
                        <input type="username" name="username" id="username" required placeholder="Masukan username"
                            class="form-control mt-1" maxlength="15" aria-describedby="helpId">
                        <small id="helpId" class="text-muted">panjang maksimal 15</small>
                    </div>
                    <div class="form-group mt-2">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Masukan password" required
                            class="form-control mt-1">
                    </div>
                    <div class="form-group mt-2 ">
                        <label for="npm">NPM</label>
                        <input type="varchar" required maxlength="9" name="npm" id="npm"
                            placeholder="Masukan npm (021185325)" class="form-control mt-1" aria-describedby="helpId">
                    </div>
                    <div class="form-group mt-1">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" placeholder="Masukan nama" required
                            class="form-control mt-1" maxlength="25">
                    </div>
                    <div class="form-group mt-2">
                        <label for="jeniskelamin">Jenis kelamin</label>
                        <select name="jeniskelamin" id="jeniskelamin" class="form-control mt-1" required>
                            <option value="">Pilih</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-danger form-control mt-2" data-bs-toggle="modal"
                        data-bs-target="#exampleModal" required>
                        Google Two Authenticator
                    </button>
                    <small class="text-danger">*Jangan lupa scan barcode, berfungsi untuk login!</small>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Scan barcode dibawah ini</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <center><?php echo "<img src='" . $QRCode . "'></img>"; ?></center>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="daftarmahasiswa"
                        class="btn btn-primary mt-4 form-control">Daftar</button>
                </form>
            </div>
            <div class="card-footer bg-white">
                Sudah memiliki akun? <a href="login.php" type="button" class="" style="text-decoration:none;">
                    Masuk disini
                </a>
            </div>
        </div>
    </div>
</div>