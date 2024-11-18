<?php
include "../dbconfig.php";
// load data studyprogram

$sqlStatement = "SELECT * FROM studyprograms";
$query = mysqli_query($conn, $sqlStatement);
$dtprodi = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_POST['btnSimpan'])) {
    $nim = $_POST["nim"];
    $kodeprodi = $_POST["kodeprodi"];
    $nama_depan = $_POST["namadepan"];
    $nama_tengah = $_POST["namatengah"];
    $nama_akhir = $_POST["namabelakang"];
    $jenis_kelamin = $_POST["jeniskelamin"];
    $tanggal_lahir = $_POST["tanggallahir"];
    $alamat = $_POST["alamat"];
    $email = $_POST["email"];
    $foto =$_FILES['foto'];


    if(!empty($foto['name'])){
        $photoName = time().'_'.$foto['name'];
        move_uploaded_file($foto['tmp_name'],'../images/'.$photoName);
    }else{
        $photoName="";
    }
    

    $sqlStatement = "INSERT INTO students VALUES ('$nim', '$kodeprodi', '$nama_depan', '$nama_tengah', '$nama_akhir', '$jenis_kelamin', '$tanggal_lahir','$alamat','$email','$photoName')";
    $query = mysqli_query($conn, $sqlStatement);
    if ($query) {
        $succesMsg = "Penambahan data mahasiswa dengan NIM " . $nim . " berhasil";
        header("location:index.php?successMsg=$succesMsg");
    } else {
        $errMsg = "Penambahan data mahasiswa dengan NIM " . $nim . " GAGAL !" . mysqli_error($conn);
    }

    mysqli_close($conn);
}



include "../template/mainheader.php";
?>
<div class="row mt-3 mb-4">
    <div class="col-md-6">
        <h4>Add New Student</h4>
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
<form method="post" enctype = "multipart/form-data">
    <div class="mb-1 row">
        <div class="col-2">
            <label for="nim" class="col-form-label">NIM</label>
        </div>
        <div class="col-auto">
            <input type="text" class="form-control" id="nim" name="nim" size="10" placeholder="NIM" required>
        </div>
    </div>
    <div class="mb-1 row">
        <div class="col-2">
            <label for="kodeprodi" class="col-form-label">Kode Prodi</label>
        </div>
        <div class="col-auto">
            <!-- <input type="text" class="form-control" id="kodeprodi" name="kodeprodi" size="10" placeholder="Prodi" required> -->
            <select class="form-select" aria-label="Default select example" name="kodeprodi">
                <option selected>Pilih Jurusan</option>
                <?php
                foreach ($dtprodi as $key => $prodi){
                ?>
                <option value="<?=$prodi["kodeProdi"]?>"><?= $prodi["namaProdi"]?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="mb-1 row">
        <div class="col-2">
            <label for="namadepan" class="col-form-label">Nama Lengkap</label>
        </div>
        <div class="col-auto">
            <div class="input-group">
                <input type="text" class="form-control" id="namadepan" name="namadepan" placeholder="Nama Depan" required>
                <input type="text" class="form-control" id="namatengah" name="namatengah" placeholder="Nama Tengah">
                <input type="text" class="form-control" id="namabelakang" name="namabelakang" placeholder="Nama Belakang">
            </div>
        </div>
    </div>
    <div class="mb-1 row">
        <div class="col-2">
            <label for="jeniskelamin" class="col-form-label">Jenis Kelamin</label>
        </div>
        <div class="col-auto">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jeniskelamin" id="jeniskelaminL" value="L">
                <label class="form-check-label" for="jeniskelaminL">
                    Laki-Laki
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jeniskelamin" id="jeniskelaminP" value="P">
                <label class="form-check-label" for="jeniskelaminP">
                    Perempuan
                </label>
            </div>
        </div>
    </div>
    <div class="mb-1 row">
        <div class="col-2">
            <label for="tanggallahir" class="col-form-label">Tanggal Lahir</label>
        </div>
        <div class="col-auto">
            <input type="date" class="form-control" id="tanggallahir" name="tanggallahir">
        </div>
    </div>
    <div class="mb-1 row">
        <div class="col-2">
            <label for="alamat" class="col-form-label">Alamat</label>
        </div>
        <div class="col-auto">
            <textarea class="form-control" id="alamat" cols="50" name="alamat" placeholder="Alamat"></textarea>
        </div>
    </div>
    <div class="mb-1 row">
        <div class="col-2">
            <label for="email" class="col-form-label">Email</label>
        </div>
        <div class="col-auto">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
        </div>
    </div>
    <div class ="mb-1 row">
        <div calss ="col-2">
            <label for ="foto" class="col-form-label">foto</label>
        </div>
        <div class ="col-auto">
                <input class ="form-control" type="file" id="foto" name = "foto">
        </div>
    <div class="mt-4 row">
        <div class="col-auto">
            <input type="submit" class="btn btn-success" name="btnSimpan" value="Simpan">
            <input type="reset" class="btn btn-danger" value="Ulangi">
            <a href="<?= HOST . "/students/" ?>" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</form>
<?php
include "../template/mainfooter.php";
?>
