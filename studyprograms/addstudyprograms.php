<?php
include "../dbconfig.php";
if (isset($_POST['btnSimpan'])) {
    $kodeprodi = $_POST["kodeprodi"];
    $namaprodi = $_POST["namaprodi"];
    $kaprodi = $_POST["kaprodi"];

    $sqlStatement = "INSERT INTO studyprograms VALUES ('$kodeprodi', '$namaprodi', '$kaprodi', 0)";
    $query = mysqli_query($conn, $sqlStatement);
    if ($query) {
        $succesMsg = "Penambahan data program studi dengan kode " . $kodeprodi . " berhasil";
        header("location:index.php?successMsg=$succesMsg");
    } else {
        $errMsg = "Penambahan data program studi dengan kode " . $kodeprodi . " GAGAL !" . mysqli_error($conn);
    }

    mysqli_close($conn);
}

// load data studyprogram

include "../template/mainheader.php";
?>
<div class="row mt-3 mb-4">
    <div class="col-md-6">
        <h4>Add New Study Programs</h4>
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
            <input type="text" class="form-control" id="kodeprodi" name="kodeprodi" placeholder="Kode Prodi" required>
        </div>
    </div>
    <div class="mb-1 row">
        <div class="col-2">
            <label for="namaprodi" class="col-form-label">Nama Prodi</label>
        </div>
        <div class="col-auto">
            <input type="text" class="form-control" id="namaprodi" name="namaprodi" placeholder="Nama Prodi" required>
        </div>
    </div>
    <div class="mb-1 row">
        <div class="col-2">
            <label for="kaprodi" class="col-form-label">Nama Kaprodi</label>
        </div>
        <div class="col-auto">
            <input type="text" class="form-control" id="kaprodi" name="kaprodi" placeholder="Nama Kaprodi" required>
        </div>
    </div>
    <div class="mt-4 row">
        <div class="col-auto">
            <input type="submit" class="btn btn-success" name="btnSimpan" value="Simpan">
            <input type="reset" class="btn btn-danger" value="Ulangi">
            <a href="<?= HOST . "/studyprograms/" ?>" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</form>
<?php
include "../template/mainfooter.php";
?>
