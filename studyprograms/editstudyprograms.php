<?php
include "../dbconfig.php";
if (isset($_POST['btnSimpan'])) {
    $kodeprodi = $_POST["kodeprodi"];
    $namaprodi = $_POST["namaprodi"];

    $sqlStatement = "UPDATE studyprograms SET namaProdi='$namaprodi' WHERE kodeProdi='$kodeprodi'";
    $query = mysqli_query($conn, $sqlStatement);
    if ($query) {
        $succesMsg = "Pengubahan data program studi dengan kode " . $kodeprodi . " berhasil";
        header("location:index.php?successMsg=$succesMsg");
    } else {
        $errMsg = "Pengubahan data program studi dengan kode " . $kodeprodi . " GAGAL !" . mysqli_error($conn);
    }

    mysqli_close($conn);
}

/** Cari student */
$kodeprodi = $_GET['kodeProdi'];
$sqlStatement = "SELECT * FROM studyprograms WHERE kodeProdi='$kodeprodi'";
$query = mysqli_query($conn, $sqlStatement);
$row = mysqli_fetch_assoc($query);

include "../template/mainheader.php";
?>
<div class="row mt-3 mb-4">
    <div class="col-md-6">
        <h4>Update Study Programs Data</h4>
    </div>
</div>
<?php
if (isset($errMsg)) {
?>
    <div class="alert alert-danger" role="alert">
        <?= $errMsg ?>
    </div>
<?php
}
?>
<form method="post">
    <div class="mb-1 row">
        <div class="col-2">
            <label for="kodeprodi" class="col-form-label">Kode Prodi</label>
        </div>
        <div class="col-auto">
            <input type="text" class="form-control" id="kodeprodi" name="kodeprodi" disabled value="<?= $row["kodeProdi"] ?>" required>
        </div>
    </div>
    <div class="mb-1 row">
        <div class="col-2">
            <label for="namaprodi" class="col-form-label">Nama Prodi</label>
        </div>
        <div class="col-auto">
            <input type="text" class="form-control" id="namaprodi" name="namaprodi" value="<?= $row["namaProdi"] ?>" required>
        </div>
    </div>
    <div class="mt-4 row">
        <div class="col-auto">
            <input type="hidden" name="kodeprodi" value="<?= $row["kodeProdi"] ?>">
            <input type="submit" class="btn btn-success" name="btnSimpan" value="Simpan">
            <input type="reset" class="btn btn-danger" value="Ulangi">
            <a href="<?= HOST . "/studyprograms/" ?>" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</form>
<?php
include "../template/mainfooter.php";
?>