<?php
require 'function.php';

$rightjoin = "SELECT student.id, student.NIS, student.nama, student.email, student.domisili, nilai.matkul1 
              FROM student 
              RIGHT JOIN nilai ON student.id = nilai.id_student 
              ORDER BY nilai.matkul1 ASC";
$data = mysqli_query($conn, $rightjoin);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Join Student + Nilai</title>
</head>
<body>
    <h1>Data Student dan Mata Kuliah (Join)</h1>
    <a href="index.php">← Kembali ke Halaman Utama</a>
    <br><br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIS</th>
            <th>Email</th>
            <th>Domisili</th>
            <th>Matkul1</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($data as $dt): ?>
        <tr>
            <td><?= $i++; ?></td>
            <td><?= $dt['nama'] ?></td>
            <td><?= $dt['NIS'] ?></td>
            <td><?= $dt['email'] ?></td>
            <td><?= $dt['domisili'] ?></td>
            <td><?= $dt['matkul1'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
