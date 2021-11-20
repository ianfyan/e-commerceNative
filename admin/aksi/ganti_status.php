<?php
require_once ("../koneksi.php");
class masukan {
    function masukdb(){
        $connection = new ConnectionDB();
        $conn = $connection->getConnection();

        try{
            //memeriksa ketersediaan pendefinisian variabel $_post['submit'] tersedia untuk diproses atau tidak.
            if(isset($_POST['submit'])){
                $id_pesanan = $_POST['id'];
                $status = $_POST['status'];
                $sql = "UPDATE tb_pesanan set statuspesanan=:statuspesanan where id_pesanan=:id_pesanan";
                //Tujuan prepare statement mysql, agar query menjadi lebih aman dan cepat (jika perintah yang sama akan digunakan beberapa kali
                //method ini mengembalikan sebuah objek berupa PDO::statement.
                $query= $conn->prepare($sql);
                $dataPesanan = array(
                    ':id_pesanan' => $id_pesanan,
                    ':statuspesanan'=> $status
                );
                //method ini dipergunakan untuk menambahkan parameter dengan sebuah nilai
                $query->bindValue( ":id_pesanan", $id_pesanan, PDO::PARAM_INT );
                //method ini digunakan untuk mengesekusi query yang telah dipersiapkan.
                $query->execute($dataPesanan); 
                header('Location: ../index.php?page=semuapesanan');
            }
        }catch (PDOException $e){
            echo "ERROR : " . $e->getMessage();
        }
    }
}
$simpan = new masukan();
$simpan -> masukdb();
?>