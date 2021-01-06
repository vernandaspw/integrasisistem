<?php 

    if (isset($_POST['submitabsen'])) {
        if (date('dmY') == date('dmY')) {
            submitabsen();
        } else {
            echo "<script>alert('Jangan curang, waktu sekarang sama waktu device mu beda');</script>";
        }
    }

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">

            <br>
            <div class=" mb-3 mt-1">
                <div class="">
                    <h3>Request Absen</h3>
                </div>
                <div class="">
                    <form action="" method="post">
                        <?php alertabsen() ?>
                        <div class="form-group" hidden>
                            <label for="npm">NPM</label>
                            <input readonly type="number" name="npm" id="npm" class="form-control"
                                aria-describedby="helpId" value="<?= $_SESSION['npm']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input readonly type="text" name="nama" id="nama" class="form-control bg-grey"
                                aria-describedby="helpId" value="<?= $_SESSION['nama']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input readonly type="text" name="tanggal" id="tanggal" class="form-control bg-grey"
                                aria-describedby="helpId" value="<?= date("d-m-Y"); ?>">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="">-Pilih-</option>
                                <option class="text-success" value="Hadir">Hadir</option>
                                <option class="text-info" value="Izin">Izin</option>
                                <option class="text-warning" value="Sakit">Sakit</option>
                                <option class="text-danger" value="Alfa">Alfa</option>
                            </select>
                        </div>
                        <div class="form-group mt-1">
                            <label for="keterangan">Keterangan</label> <br>
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                        </div>
                        <button type="submit" name="submitabsen"
                            class="btn btn-primary form-control shadow">Kirim</button>
                    </form>
                </div>
            </div>

        </div>
    </main>

</div>