<?php
require_once ("../koneksi.php");
class buang {
    function buangdb(){
        $connection = new ConnectionDB();
        $conn = $connection->getConnection();
        $id=$_GET['id'];
        $sql1="DELETE from tb_foto where id_produk=$id";
        $result1 = $conn->prepare($sql1);
        $result1->execute();
        $sql="DELETE from tb_produk where id_produk=$id";
        $result = $conn->prepare($sql);
        $result->execute();
        header('location: ../index.php?page=daftarbarang');
    }
}
$simpan = new buang();
$simpan -> buangdb(); 
?>