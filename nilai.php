<?php
    require 'function.php';
    $id = $_GET['id'];
    $student = query("SELECT * FROM student WHERE id = $id")[0];
    $ceknilai = mysqli_query($conn, "SELECT * FROM nilai WHERE id_student = $id");
    if(isset($_POST["submit"])){
        $nilaimk1 = $_POST["matkul1"];
        $nilaimk2 = $_POST["matkul2"];

        if (mysqli_num_rows($ceknilai)>0){
            $updateNilai = "UPDATE nilai SET matkul1 = $nilaimk1,matkul2=$nilaimk2 WHERE id_student = $id";
            mysqli_query($conn,$updateNilai);
            echo "<script>
            alert('data berhasil diupdate');
            document.location.href = 'index.php';
            </script>";
        } else {
            $insertnilai = "INSERT INTO nilai(id_student,matkul1,matkul2) VALUES ($id,$nilaimk1,$nilaimk2)";
            mysqli_query($conn,$insertnilai);
            echo "<script>
            alert('data nilai berhasil ditambahkan');
            document.location.href = 'index.php';
            </script>";
        }
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
        <button class="back"><a href="index.php">🔙 Kembali</a></button>
    </div>
</body>
</html>