<?php
require_once ("../koneksi.php");
class buang {
    function buangdb(){
        $connection = new ConnectionDB();
        $conn = $connection->getConnection();
        $id=$_GET['id'];
        $sql="DELETE from tb_profile where id_profile=$id";
        $result = $conn->prepare($sql);
        $result->execute();
        header('location: ../index.php?page=profile');
    }
}
$simpan = new buang();
$simpan -> buangdb();
?>