<?php
require_once ("../koneksi.php");
class buang {
    function buangdb(){
        $connection = new ConnectionDB();
        $conn = $connection->getConnection();
        $id=$_GET['id'];
        $sql="DELETE from tb_promo where id_promo=$id";
        $result = $conn->prepare($sql);
        $result->execute();
        header('location: ../index.php?page=daftarpromo');
    }
}
$simpan = new buang();
$simpan -> buangdb();
?>