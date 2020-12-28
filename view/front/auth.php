<?php 


?>

<div class="container d-flex justify-content-center mt-5">
    <div class="col-md-4 mt-4">
        <div class="card" style="-webkit-box-shadow: -1px 20px 66px -21px rgba(0,0,0,0.59);
-moz-box-shadow: -1px 20px 66px -21px rgba(0,0,0,0.59);
box-shadow: -1px 20px 66px -21px rgba(0,0,0,0.59);">
            <div class="card-header bg-primary">
                <h4 style="color: white;">Two Factor Authentication</h4>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group mt-2">
                        <label for="kode">Kode Google Authenticator</label>
                        <input type="number" name="code" id="kode" placeholder="Masukan Kode Google Authenticator"
                            class="form-control mt-1" required>
                    </div>
                    <button type="submit" name="btn-submit" class="btn btn-primary form-control mt-4">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>