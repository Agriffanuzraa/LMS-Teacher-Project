<?php
require 'function.php';
$id = $_GET["id"];
if(hapus($id)>0){
    echo "<script>
            alert('data berhasil dihapus');
            document.location.href = 'pertemuan9_part2.php';
            </script>";
}

?>