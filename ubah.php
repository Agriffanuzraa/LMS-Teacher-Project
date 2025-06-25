<?php
    require'function.php';
    if(isset($_POST["test"])){
        if(ubah($_POST)){
            echo"hai";
            echo "<script>
            alert('data berhasil diubah');
            document.location.href = 'pertemuan9_part2.php';
            </script>";
        }else{
            echo "<script>
            alert('data gagal diubah');
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
</head>
<body>
    <h1>Tambah data student</h1>
    <?php 
    $nomor = $_GET['id'];
    $ambil = "SELECT * FROM student WHERE id = $nomor";
    $data = mysqli_query($conn, $ambil);
    foreach ($data as $dt){
        ?>

    <form action="" method="post">
        <input type="hidden" value= "<?php echo $dt['id'] ?>" name = id>
        <ul>
            <li>
                <label for="NIS">NIS:</label>
                <input type="number" value="<?php echo $dt['NIS'] ?>" name="NIS" id="NIS">
            </li>
            <li>
                <label for="nama">Name:</label>
                <input type="text" value="   " name="nama" id="nama" required>
            </li>
            <li>
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" required>
            </li> 
            <li>
                <label for="domisili">Domisili:</label>
                <input type="text" name="domisili" id="domisili" required>
            </li>
            <li>
                <button type="submit" name="test">submit</button>
            </li>
        </ul>
    </form>
        <?php
    }
    ?>
    
</body>
</html> 