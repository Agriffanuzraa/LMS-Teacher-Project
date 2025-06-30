<?php
    require'function.php';
    if(isset($_POST["upload"])){
        if(ubah($_POST)){
            echo"hai";
            echo "<script>
            alert('data berhasil diubah✅');
            document.location.href = 'pertemuan9_part2.php';
            </script>";
        }else{
            echo "<script>
            alert('data gagal diubah❌');
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
    <style>
        input{
            border: none;
            width: 50%;
            height: 2rem;
            border-radius: 6px;
            text-align: center; 
            background-color:rgba(70, 69, 69, 0.47);
        }
        .input:hover{
            background-color: #3333331a;
        }
    </style>
</head>
<body>
    <h1>Edit Data Mahasiswa</h1>
    <?php 
    $nomor = $_GET['id'];
    $ambil = "SELECT * FROM student WHERE id = $nomor";
    $data = mysqli_query($conn, $ambil);
    foreach ($data as $dt):?>
    <div class="upload" style="background-color: white;padding:1rem;border-radius:6px;">
        <form action="" method="post" enctype="multipart/form-data" style="display:flex;flex-direction:column;font-weight:500;">
            <input type="hidden" value= "<?php $dt['id'] ?>" name ="id">
            <input type="hidden" value= "<?php $dt['foto'] ?>" name="gambarLamaa">
            <label for="NIS">NIS:</label>
            <input type="number" value="<?php echo $dt['NIS'] ?>" name="NIS" id="NIS">
            <label for="nama">Name:</label>
            <input type="text" value="<?php echo $dt['nama'] ?>" name="nama" id="nama" required>
            <label for="email">Email:</label>
            <input type="text" name="<?php echo $dt['email'] ?>" id="email" required>
            <label for="domisili">Domisili:</label>
            <input type="text" name="domisili" id="domisili" value="<?php echo $dt['domisili'] ?>" required>
            <label for="foto">foto:</label>
            <img src="img/<?php echo $dt['foto'] ?>" alt="nophoto.jpg" style="width: 6rem;height=6rem">
            <input type="file" name="foto" id="foto" value="<?php $dt['foto'] ?>">
            <button type="submit" name="upload">Upload data</button>
        </form>
    </div>
    <?php endforeach;?> 
    <button class="back" onclick="window.location.href='index.php'">🔙 Kembali</a></button>
</body>
</html> 