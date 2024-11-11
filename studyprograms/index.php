<?php
include "../dbconfig.php";

$sqlStatement = "SELECT sp.kodeProdi, sp.namaProdi, sp.kaprodi, 
           (SELECT COUNT(*) FROM students s WHERE s.kodeProdi = sp.kodeProdi) as jumlahMahasiswa
            FROM studyprograms sp";

// $sqlStatement = "SELECT * FROM studyprograms";
$query = mysqli_query($conn, $sqlStatement);
$data = mysqli_fetch_all($query, MYSQLI_ASSOC);

// print_r($data);
include "../template/mainheader.php";
?>
<div class="row mt-3 mb-4">
    <div class="col-md-6">
        <h4>Data Program Studi</h4>
    </div>
    <div class="col-md-6 justify-content-end d-flex">
        <a href="<?= HOST . "/studyprograms/" ?>addstudyprograms.php" class="btn btn-success">Tambah data prodi</a>

    </div>
</div>
<?php
if (isset($_GET['successMsg'])) {
?>
    <div class="alert alert-success" role="alert">
        <?= $_GET['successMsg'] ?>
    </div>
<?php
} else if (isset($_GET['errorMsg'])) {
?>
    <div class="alert alert-warning" role="alert">
        <?= $_GET['errorMsg'] ?>
    </div>
<?php 
}
?>
<table class="table table-bordered table-hover">
    <thead align="center">
        <th>Kode Prodi</th>
        <th>Nama Prodi</th>
        <th>Nama Kaprodi</th>
        <th>Jumlah Mahasiswa</th>
        <th>Aksi</th>
    </thead>
    <tbody>
        <?php
        foreach ($data as $key => $prodi) {
        ?>
            <tr>
                <td><?= $prodi["kodeProdi"] ?></td>
                <td><?= $prodi["namaProdi"] ?></td>
                <td><?= $prodi["kaprodi"] ?></td>
                <td><?= $prodi["jumlahMahasiswa"] ?></td>
                <td align="center">
                    <a href="<?= HOST . "/studyprograms/" ?>editstudyprograms.php?kodeProdi=<?= $prodi["kodeProdi"] ?>" class="btn btn-sm btn-primary">Edit</a>
                    <a href="<?= HOST . "/studyprograms/" ?>deletestudyprograms.php?kodeProdi=<?= $prodi["kodeProdi"] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin akan menghapus?')">Delete</a>
                </td>
            </tr>
        <?php
        }

        ?>
    </tbody>
</table>
<?php
include "../template/mainfooter.php";
?>