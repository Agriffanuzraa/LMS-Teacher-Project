<!-- mengubungkan dengan database -->
 <?php
 //koneksi ke database
  $conn = mysqli_connect("localhost","root","","phpdasar");

//  ambil data dari tabel mahasiswa / query data tablenya
$result = mysqli_query($conn,"SELECT * FROM student");
// var_dump($result);//ini tuh membaca tabelnya apakah terbaca atau engga, analoginya untuk query ceritanya: "kamu boleh ga liat baju yang ada di lemari(SELECT * FORM lemari)nah tapi pas dia keluarin selemari lemarinya ga sampe ngeluarin bajunya cuma lemarinya aja blm dibuka. Maka harus beri perintah ambil aja bajunya jgn pake lemarinya. maka pake fetch

// ambil data(fetch) student dari object result:
// 1. mysqli_fetch_row() == mengembalikan array numeric yang indexnya angka
// 2. mysqli_fetch_assoc() == mengembalikkan array string yang indexnya adalah string (array assosiative)
// 3. mysqli_fetch_array() == dia mau array numeric juga mau array assosoativ tp nanti dia double dikembalikannya ada index string ada index num jadi tidak disarankan
// 4. mysqli_fetch_object() == dia menggunakan panah contoh ($mhs->email) jadi pake tanda panah gitu

// fetch itu cmn sekali, maka harus pake looping:
// while ($student = mysqli_fetch_assoc($result)){
//     var_dump($student);
// }


 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connect php+sql</title>
</head>
<body>
    <h1>Daftar Student</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <th>No</th>
        <th>Aksi</th>
        <th>Foto</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Domisili</th>
        <?php $i = 1 ?>
        <?php while($row = mysqli_fetch_assoc($result)):?>
        <tr>
            <td><?=$i?></td>
            <td>
                <a href="">ubah</a>|
                <a href="">hapus</a>
            </td>
            <td>
                <img src="Agriffa.jpeg" alt="student1" style="width: 2rem;height:2rem;">
            </td>
            <td><?=$row["NIS"]?></td>
            <td><?=$row["nama"]?></td>
            <td><?=$row["email"]?></td>
            <td><?=$row["domisili"]?></td>
        </tr>
        <?php $i++;?>
        <?php endwhile;?>
    </table>
</body>
</html>