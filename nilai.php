<?
    require 'function.php';

    if (!isset($_GET['id']) || empty($_GET['id'])) {
        echo "<p>ID tidak ditemukan di URL!</p>";
        exit;
    }
    $id = $_GET['id'];

?>
