<?php
  $conn = mysqli_connect("localhost","root","","phpdasar");


  function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    //   menyiapkan wadah
    $rows = [];

    //ambil di setiap looping
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return  $rows;
  
  }

  function tambah($data){
    global $conn;
    $nis = htmlspecialchars($data["NIS"]);
    $name = htmlspecialchars($data["nama"]);
    $email= htmlspecialchars($data["email"]);
    $domisili = htmlspecialchars($data["domisili"]);

    //upload foto dulu , terus prosesnya itu kita ambil nama gambarnya, diupload ke file directory baru kita insert ke database, jadi harus diupload dulu ke database.
    $foto = upload();
    if($foto === false){
      return false;
    }

    $query = "INSERT INTO student(nama,nis,email,domisili,foto) VALUES ('$name',$nis,'$email','$domisili','$foto')";
    mysqli_query($conn,$query);


    return mysqli_affected_rows($conn);
  }

  function upload(){
    //ambil dulu nama file dari gambarnya pake $_FILES

    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    //mewajibkan user upload gambar, cek apakah ada foto yang diupload
    //kalo error nya 4 itu ga file yang diupload
    if($error === 4){
      echo "<script> alert('masukan foto terlebih dahulu🙏') </script>";
      return false;
    }

    //mengecek yang diupload gambar atau bukan. caranya ngecek ekstensinya
    $ekstensiGambarValid = ['jpg','jpeg','png'];
    //pake explode itu memecah string menjadi array, variabel ekstensiGambar ini buat ngambil namaFile nya, nah kalo udah di explode bakalan jadi kayak gini contoh ['agriffa','jpg'] maka kita harus ambil yang terakhir pake end() bisa kalo pake [0] tapi terkadang nama file agriffa.nuzra.jpg nah makanya kita harus manggil yang paling akhir dengan cara pake end(), strtolower biar yang diambil datanya kecil semua kayak yang di array yang kita atur
    $ekstensiGambar = strtolower(end(explode(".",$namaFile)));
    if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
      echo "<script> alert('foto harus .jpg/.jpeg/.png🙏') </script>";
      return false;
    }
    
    // cek jika ukuran nya terlalu besar
    if ($ukuranFile>1000000){
      echo "<script> alert('ukuran gambar terlalu besar🙏') </script>";
      return false;
    }

    //lolos pengecekan,gambar siap diupload
    move_uploaded_file($tmpName,'img/'.$namaFile);
    return $namaFile;
  }


  function hapus($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM student WHERE id=$id");
    return mysqli_affected_rows($conn);
  }

  function ubah($id){
    global $conn;
    $idData = $id["id"];
    $nis = htmlspecialchars($id["NIS"]);
    $name = htmlspecialchars($id["nama"]);
    $email= htmlspecialchars($id["email"]);
    $domisili = htmlspecialchars($id["domisili"]);

    //cek apakah user pilih gambar baru atau engga
    $gambarLama = htmlspecialchars($id["gambarLamaa"]);
    $foto = htmlspecialchars($id["foto"]);
    echo $nis,$name,$email,$domisili,$foto;
    if ($_FILES['foto']['error'] == 4){
      $foto = $gambarLama;
    } else {
      $foto = upload();
    }
    
    mysqli_query($conn,"UPDATE student SET nama='$name',NIS='$nis',email='$email',domisili='$domisili' ,foto= $foto WHERE id = $idData");
    return mysqli_affected_rows($conn);
  }

  function cari($keyword){
    // like itu buat yang sama kalo = itu sama persiss tapi baca dari depan kalo mau dari awal sampe akhir tambahin %
    $query = "SELECT * FROM student WHERE nama LIKE
   '%$keyword%' OR
   NIS LIKE '%$keyword%' OR 
   domisili LIKE '%$keyword%'";
    return query($query);
  }

  
?>