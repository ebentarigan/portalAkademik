<?php
include "../dbconfig.php";

$sqlStatement = "SELECT * FROM students";
$query = mysqli_query($conn, $sqlStatement);
$data = mysqli_fetch_all($query, MYSQLI_ASSOC);

// print_r($data);
include "../template/mainheader.php";
?>
<div class="row mt-3 mb-4">
    <div class="col-md-6">
        <h4>Data Mahasiswa</h4>
    </div>
    <div class="col-md-6 justify-content-end d-flex">
        <a href="<?= HOST . "/students/" ?>addstudent.php" class="btn btn-success">Tambah data mahasiswa</a>

    </div>
</div>
<?php
if (isset($_GET['successMsg'])) {
?>
    <div class="alert alert-success" role="alert">
        <?= $_GET['successMsg'] ?>
    </div>
<?php
}
?>
<table class="table table-bordered table-hover">
    <thead align="center">
        <th>NIM</th>
        <th>Prodi</th>
        <th>Nama Lengkap</th>
        <th>Jenis Kelamin</th>
        <th>Aksi</th>
    </thead>
    <tbody>
        <?php
        foreach ($data as $key => $mhs) {
            $namaLengkap = $mhs['nama_depan'] . ' ' . ($mhs['nama_tengah'] ? $mhs['nama_tengah'] . ' ' : '') . $mhs['nama_akhir'];
            $mhs["jenis_kelamin"] == "L" ? $jk = "Laki-Laki" : $jk = "Perempuan";
        ?>
            <tr>
                <td><?= $mhs["nim"] ?></td>
                <td><?= $mhs["kodeProdi"] ?></td>
                <td><?= $namaLengkap ?></td>
                <td><?= $jk ?></td>
                <td align="center">
                    <a href="<?= HOST . "/students/" ?>editstudent.php?nim=<?= $mhs["nim"] ?>" class="btn btn-sm btn-primary">Edit</a>
                    <a href="<?= HOST . "/students/" ?>deletestudent.php?nim=<?= $mhs["nim"] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin akan menghapus?')">Delete</a>
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