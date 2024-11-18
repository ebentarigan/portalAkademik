<?php
include "../dbconfig.php";
include "../template/mainheader.php";
?>

<body>
    <h3 style="text-align: center">Data Mahasiswa</h3>
    <p><a href="addStudent.php" class="link-underline-primary">Add Data Student</a></p>
    <table class="table table-bordered" align="center">
        <thead>
            <th>No.</th>
            <th>NIM</th>
            <th>Prodi</th>
            <th>Nama Depan</th>
            <th>Jenis Kelamin</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            <?php 
            $sqlStatement = "SELECT * FROM students";
            $query = mysqli_query($conn, $sqlStatement);

            $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
            // print_r($data);
            foreach ($data as $key => $dtstudents){
            ?>
            <tr>
                <td><?php echo ++$key ?></td>
                <td><?php echo $dtstudents["nim"] ?></td>
                <td><?php echo $dtstudents["kode_prodi"] ?></td>
                <td><?php echo $dtstudents["nama_depan"] ?></td>
                <td><?php echo $dtstudents["jenis_kelamin"] ?></td>
                <td></td>
            </tr>
        </tbody>
        <?php } ?>
    </table>
    <?php
    include "../template/mainfooter.php";
    ?>
</body>
</html>