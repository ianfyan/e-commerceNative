<?php
require_once ("../koneksi.php");
class masukan {
    function masukdb(){
        $connection = new ConnectionDB();
        $conn = $connection->getConnection();

        try{
            if(isset($_POST['submit'])){
                $nama_promo = $_POST['nama_promo'];
                $syarat_promo = $_POST['syarat_promo'];
                $foto = $_FILES['foto']['name'];
                $tmp_foto = $_FILES['foto']['tmp_name'];
                $acak = round(microtime(true));
                $fotobaru = $acak.$foto;
                $gambar = "banner/".$fotobaru;
                $lokasi = "../../user/images/banner/".$fotobaru;
                //Upload Foto
                if(move_uploaded_file($tmp_foto, $lokasi)){
                    $sql = "INSERT into tb_promo (promo, syarat_promo, gambar_promo) values(:nama_promo, :syarat_promo, :gambar)";
                    $query= $conn->prepare($sql);
                    $dataBarang = array(
                        ':nama_promo'=> $nama_promo,
                        ':syarat_promo'=> $syarat_promo,
                        ':gambar'=> $gambar
                    );
                    //$query->bindValue( ":id_produk", $id_produk, PDO::PARAM_INT );
                    $query->execute($dataBarang);
                    header('Location: ../index.php?page=daftarpromo');
                }else{
                    echo "Gagal Menginput Data";
                }
                
            }
        }catch (PDOException $e){
            echo "ERROR : " . $e->getMessage();
        }
    }
}
$simpan = new masukan();
$simpan -> masukdb();
?>