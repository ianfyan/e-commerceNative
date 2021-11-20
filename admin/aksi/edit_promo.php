<?php
require_once ("../koneksi.php");
class masukan {
    function masukdb(){
        $connection = new ConnectionDB();
        $conn = $connection->getConnection();

        try{
            if(isset($_POST['submit'])){
                $id_promo = $_POST['id_promo'];
                $nama_promo = $_POST['nama_promo'];
                $syarat_promo = $_POST['syarat_promo'];
                $sql = "UPDATE tb_promo set promo=:nama_promo, syarat_promo=:syarat_promo where id_promo=:id_promo";
                $query= $conn->prepare($sql);
                $dataBarang = array(
                    ':id_promo' => $id_promo,
                    ':nama_promo'=> $nama_promo,
                    ':syarat_promo'=> $syarat_promo
                );
                $query->bindValue( ":id_promo", $id_promo, PDO::PARAM_INT );
                $query->execute($dataBarang);
                header('Location: ../index.php?page=daftarpromo');
            }
        }catch (PDOException $e){
            echo "ERROR : " . $e->getMessage();
        }
    }
}
$simpan = new masukan();
$simpan -> masukdb();
?>