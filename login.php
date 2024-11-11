<?php
include "template/mainheader.php";
?>

<div class="row mt-3 mb-4">
    <div class="col md-6">
        <h4>Login Pengguna</h4>
    </div>
</div>
<?php
if (isset($_GET['errMsg'])) {
?>
    <div class="alert alert-warning" role="alert">
        <?= $_GET['errMsg'] ?>
    </div>
<?php 
}
?>
<form method="POST" action="autentikasi.php">
    <div class="mb-1 row">
        <div class="col-2">
            <label for="username" class="col-form-label">Username</label>
        </div>
        <div class="col-auto">
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
        </div>
    </div>
    <div class="mb-1 row">
        <div class="col-2">
            <label for="password" class="col-form-label">Password</label>
        </div>
        <div class="col-auto">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        </div>
    </div>
    <div class="mt-4 row">
        <div class="col-auto">
            <input type="submit" class="btn btn-success" name="btnSubmit" value="Login">
        </div>
    </div>
</form>

<?php
include "template/mainfooter.php";
?>