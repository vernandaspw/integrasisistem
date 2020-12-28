<?php 

$npmm = $_GET["npm"];

$user = mysqli_query($conn, "SELECT * FROM users WHERE npm='$npmm'");
$data = mysqli_fetch_array($user);

$npm = @$_POST['npm'];
$nama = @$_POST['nama'];
$jk = @$_POST['jenis_kelamin'];


if (isset($_POST['ubahm'])) {
    

    $update_user = mysqli_query($conn, "UPDATE users SET npm = '$npm', nama = '$nama', jenis_kelamin = '$jk' 
                                        WHERE npm='$npmm' ");
}

?>

<div class="container d-flex justify-content-center mt-5">
    <div class="col-md-4 mt-5">
        <div class="card shadow bg-primary">
            <div class="card-header text-white">
                <h4>Ubah data</h4>
            </div>
            <div class="card-body text-white">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="npm">NPM</label>
                        <input type="number" name="npm" id="npm" class="form-control" aria-describedby="helpId"
                            value="<?= $data['npm']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" placeholder="Ubah Nama" class="form-control"
                            aria-describedby="helpId" value="<?= $data['nama']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="Jenis_Kelamin">Jenis kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option value="<?= $data['jenis_kelamin']; ?>"><?= $data['jenis_kelamin']; ?></option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <button type="submit" name="ubahm" class="btn form-control btn-success">Ubah Data</button>

                    <a href="admin.php?b=dashboard" class="btn btn-danger form-control mt-2">Batal</a>

                </form>

            </div>
        </div>
    </div>
</div>