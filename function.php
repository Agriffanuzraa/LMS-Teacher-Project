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
    $query = "INSERT INTO student(nama,nis,email,domisili) VALUES ('$name',$nis,'$email','$domisili')";
    mysqli_query($conn,$query);


    return mysqli_affected_rows($conn);
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
    echo $nis,$name,$email,$domisili;
    
    mysqli_query($conn,"UPDATE student SET nama='$name',NIS='$nis',email='$email',domisili='$domisili' WHERE id = $idData");
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