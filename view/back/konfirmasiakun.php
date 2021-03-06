<?php 
$sql = mysqli_query($conn, "SELECT * FROM req_mhs");
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Konfirmasi Akun</h1>
            <ol class="breadcrumb mb-4 bg-secondary">
                <li class="breadcrumb-item active text-white">Konfirmasi permintaan mahasiswa membuat akun
                    dikelas ini
                </li>
            </ol>
            <hr>
            <div class="card mb-4 mt-4 border-0" style="-webkit-box-shadow: 3px 18px 61px -24px rgba(0,0,0,0.59);
-moz-box-shadow: 3px 18px 61px -24px rgba(0,0,0,0.59);
box-shadow: 3px 18px 61px -24px rgba(0,0,0,0.59);">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Minta Approve
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>NPM</th>
                                    <th>Nama</th>
                                    <th>Jenis kelamin</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                            while ($d = mysqli_fetch_assoc($sql)) {
                                
                            ?>
                                <tr>
                                    <td><?= $d['npm']; ?></td>
                                    <td><?= $d['nama']; ?></td>
                                    <td><?= $d['jenis_kelamin']; ?></td>
                                    <td><?= $d['level']; ?></td>
                                    <td class="d-flex justify-content-center">
                                        <a href="admin.php?b=terimamhs&id=<?= $d['id'];?>"
                                            class=" btn btn-success form-control">Terima
                                        </a>
                                        &nbsp;|&nbsp;
                                        <a href="admin.php?b=tolakmhs&id=<?= $d['id'];?>"
                                            class=" btn btn-danger form-control"
                                            onclick="return confirm('Apakah yakin?')">Tolak
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </>
    </main>

</div>