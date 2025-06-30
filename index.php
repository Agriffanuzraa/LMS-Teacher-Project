<!-- mengubungkan dengan database -->
 <?php
 //koneksi ke database
 require 'function.php';
 $student = query("SELECT * FROM student");

//tombol cari di tekan maka data akan ditimpa
if (isset($_POST["cari"])){
    $student = cari($_POST["keyword"]);
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home-Learning Management Systems</title>
    <link rel="stylesheet" href="stylesss.css">
</head>
<body>
    <h1>Data Student</h1>
    <!-- implementasi order by -->
    <!-- start navigation bar -->
    <div class="navbar">
        <div class="range">
            <form action="order_by.php" method="get">
                <button type="submit" name="submit">	🔃 order by</button>
            </form>
        </div>

        <form action="tambah.php" method="post">
            <button type="submit" name = "matkul1">	➕ tambah</button>
        </form>

        <!-- kalo action dikosongin berarti tampilnya di halaman ini aja -->
        <form action="" method="post" class="search">
            <input type="text" name="keyword" size="30" autofocus placeholder="masukan keyword pencarian..." autocomplete="off">
            <button type="submit" name = "cari">🔍search</button>
        </form>
        <form action="chart.php" method="post">
            <button type="submit" name = "stat">📈statistic</button>
        </form>


    </div>
    <!-- end navigation bar -->

    <!-- modals -->
    <div id="welcomeModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>👋 Haloo!</h2>
            <p>Selamat datang 😊</p>
        </div>
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
                <a href="ubah.php?id=<?=$st["id"]?>">✏️ubah</a>  |
                <a href="hapus.php?id=<?=$st["id"]?>" onclick="return confirm('yakin?')">🗑️hapus</a>
            </td>
            <td>
                <img src="img/<?=$st["foto"]?>" alt="student1" style="width: 2rem;height:2rem;">
            </td>
            <td><?=$st["NIS"]?></td>
            <td class="name">
                <a href="nilai.php?id=<?=$st["id"]?>" title="klik bagian nama untuk mengisi nilai"><?=$st["nama"]?></a>
            </td>
            <td><?=$st["email"]?></td>
            <td><?=$st["domisili"]?></td>
        </tr>
        <?php $i++;?>
        <?php endforeach;?>
    </table>
    <script>
    window.onload = function () {
    if (!sessionStorage.getItem("welcomeShown")) {
        const modal = document.getElementById("welcomeModal");
        const span = document.getElementsByClassName("close")[0];

        modal.style.display = "block";
        sessionStorage.setItem("welcomeShown", "true");

        span.onclick = function () {
        modal.style.display = "none";
        }

        window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
        }
    }
    };
</script>
</body>
</html>