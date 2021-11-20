<?php
require_once ("../koneksi.php");
class masukan {
    function masukdb(){
        $connection = new ConnectionDB();
        $conn = $connection->getConnection();

        try{
            if(isset($_POST['submit'])){
                $nama_kategori = $_POST['nama_kategori'];
                $foto = $_FILES['foto']['name'];
                $tmp_foto = $_FILES['foto']['tmp_name'];
                $acak = round(microtime(true));
                $fotobaru = $acak.$foto;
                $gambar = "produk/".$fotobaru;
                $lokasi = "../../user/images/produk/".$fotobaru;
                $id="";
                if(move_uploaded_file($tmp_foto, $lokasi)){
                    $sql = "INSERT into tb_kategori (id_kategori, nama_kategori, gambar_kategori) values(:id,:nama_kategori,:gambar)";
                    $query= $conn->prepare($sql);
                    $dataBarang = array(
                        ':nama_kategori'=> $nama_kategori,
                        ':gambar'=> $gambar,
                        ':id'=> $id
                    );
                    //$query->bindValue( ":id_produk", $id_produk, PDO::PARAM_INT );
                    $query->execute($dataBarang);
                    header('Location: ../index.php?page=daftarkategoribarang');
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