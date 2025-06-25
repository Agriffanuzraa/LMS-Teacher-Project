<?php
    require'function.php';
    if(isset($_POST["submit"])){
        // $nis = $_POST["NIS"];
        // $name =  $_POST["nama"];
        // $email= $_POST["email"];
        // $domisili = $_POST["domisili"];
        //itu yang '' itu id nya karena auto increament
        // $query = "INSERT INTO student(nama,nis,email,domisili) VALUES ('$name',$nis,'$email','$domisili')";
        // mysqli_query($conn,$query);

        //cek apakah data berhasil di tambahkan atau tidak pake affected rows
        // var_dump(mysqli_affected_rows($conn));
        // header('Location:pertemuan9_part2.php');
        if(tambah($_POST)>0){
            echo "<script>
            alert('data berhasil ditambahkan');
            document.location.href = 'pertemuan9_part2.php';
            </script>";
        }else{
            echo "<script>
            alert('data gagal ditambahkan');
            </script>";
        }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah data student</title>
    <link rel="stylesheet" href="stylesss.css">
</head>
<body>
    <h1>Tambah data student</h1>
    <div class="containerAdd">
        <form action="" method="post">
            <label for="NIS">NIS:</label>
            <input type="text" name="NIS" id="NIS" placeholder="masukan nomor mahasiswa">
            <label for="nama">Name:</label>
            <input type="text" name="nama" id="nama" placeholder="masukan nama lengkap">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" placeholder="masukan email mahasiswa">
            <label for="domisili">Domisili:</label>
            <input type="text" name="domisili" id="domisili" placeholder="masukan domisili mahasiswa saat ini">
            <button type="submit" name="submit">submit</button>
        </form>
        <button class="back"><a href="pertemuan9_part2.php">🔙 Kembali</a></button>
    </div>
    
</body>
</html>