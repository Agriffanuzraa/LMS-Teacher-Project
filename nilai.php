<?php
    require 'function.php';
    $id = $_GET['id'];
    $student = query("SELECT * FROM student WHERE id = $id")[0];
    if(isset($_POST["submit"])){
        $nilaimk1 = $_POST["matkul1"];
        $nilaimk2 = $_POST["matkul2"];
        $insertnilai = "INSERT INTO nilai(id_student,matkul1,matkul2) VALUES ($id,$nilaimk1,$nilaimk2)";
        mysqli_query($conn,$insertnilai);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesss.css">
    <title>Tambah Nilai</title>

</head>
<body>
    <div class="containerNilai"></div>
    <h1>Tambah Nilai Mahasiswa</h1>
    <p>nama mahasiswa : <?= $student['nama']?></p>
    <div class="containerAdd">
        <form action="" method="post">
            <label for="matkul1">matkul pertama:</label>
            <input type="number" name="matkul1" id="matkul1" placeholder="masukan nilai matkul pertama">
            <label for="matkul2">matkul kedua:</label>
            <input type="number" name="matkul2" id="matkul2" placeholder="masukan nilai matkul nilai kedua">
            <button type="submit" name="submit">submit</button>
        </form>
        <button class="back"><a href="pertemuan9_part2.php">🔙 Kembali</a></button>
    </div>
</body>
</html>