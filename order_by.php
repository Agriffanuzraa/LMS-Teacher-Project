<!-- mengubungkan dengan database -->
<?php
 //koneksi ke database
 require 'function.php';
 $sort="nama";
 if (isset($_GET["nis"])) {
    $sort = "NIS";
} else {
    $sort = "nama";
}


 $student = query("SELECT * FROM student ORDER BY $sort ASC"); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connect php+sql</title>
    <link rel="stylesheet" href="stylesss.css">
</head>
<body>
    <h1>Daftar Student</h1>
    <!-- implementasi order by -->
    <div class="navbar">
            <form action="order_by.php" method="get">
                <button type="submit" name="nis">sort by NIS</button>
                <button type="submit" name="nama">sort by nama</button>
            </form>
        <a href="tambah.php">➕ Tambah data student</a>
    </div>
    
    <table border="1" cellpadding="10" cellspacing="0">
        <th>No</th>
        <th>Aksi</th>
        <th>Foto</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Domisili</th>
        <?php $i = 1 ?>
        <?php foreach($student as $st):?>

        <tr>
            <td><?=$i?></td>
            <td class="edited">
                <a href="ubah.php?id=<?=$st["id"]?>">✏️ ubah</a>|
                <a href="hapus.php?id=<?=$st["id"]?>" onclick="return confirm('yakin?')">🗑️ hapus</a>
            </td>
            <td>
                <img src="img/<?=$st["foto"]?>" alt="photo.jpg" style="width: 2rem;height:2rem;">
            </td>
            <td><?=$st["NIS"]?></td>
            <td class="name">
                <a href="nilai.php?id=<?=$st["id"]?>" title="klik bagian nama untuk mengisi nilai"><?=$st["nama"]?></a></td>
            <td><?=$st["email"]?></td>
            <td><?=$st["domisili"]?></td>
        </tr>
        <?php $i++;?>
        <?php endforeach;?>
    </table>
    <button class="back" onclick="window.location.href='index.php'">🔙 Kembali</button>

</body>
</html>