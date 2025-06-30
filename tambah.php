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
        // var_dump($_POST);
        // var_dump($_FILES);die;
        
        if(tambah($_POST)>0){
            echo "<script>
            alert('data berhasil ditambahkan');
            document.location.href = 'index.php';
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
    <h1>Tambah Data mahasiswa</h1>
    <div class="containerAdd">
        <form action="" method="post" enctype="multipart/form-data">
            <label for="NIS">NIS:</label>
            <input type="number" name="NIS" id="NIS" placeholder="masukan nomor mahasiswa">
            <label for="nama">Name:</label>
            <input type="text" name="nama" id="nama" placeholder="masukan nama lengkap">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" placeholder="masukan email mahasiswa">
            <label for="domisili">Domisili:</label>
            <input type="text" name="domisili" id="domisili" placeholder="masukan domisili mahasiswa saat ini">

            <!-- untuk nambahin foto kasih inputnya berupa file, tambahin di method form nya 'enctype' yang berarti nanti dia kayak punya dua buah jalur gitu untuk string oleh $_post kalo file dikelola oleg enctype isinya harus "multipart/form-data" -->
            <label for="foto">foto:</label>
            <input type="file" name="foto" id="foto">
            <button type="submit" name="submit">submit</button>
        </form>
    <button class="back" onclick="window.location.href='index.php'">🔙 Kembali</button>
    </div>
    
</body>
</html>