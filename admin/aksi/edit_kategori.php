<?php
require_once ("../koneksi.php");
class masukan {
    function masukdb(){
        $connection = new ConnectionDB();
        $conn = $connection->getConnection();

        try{
            if(isset($_POST['submit'])){
                $id_kategori = $_POST['id_kategori'];
                $nama = $_POST['nama'];
                $foto = $_FILES['foto']['name'];
                $tmp_foto = $_FILES['foto']['tmp_name'];
                $acak = round(microtime(true));
                $fotobaru = $acak.$foto;
                $gambar = "produk/".$fotobaru;
                $lokasi = "../../user/images/produk/".$fotobaru;
                if(move_uploaded_file($tmp_foto, $lokasi)){
                    $sql = "UPDATE tb_kategori set nama_kategori=:nama, gambar_kategori=:gambar where id_kategori=:id_kategori";
                    $query= $conn->prepare($sql);
                    $dataBarang = array(
                        ':id_kategori' => $id_kategori,
                        ':gambar'=> $gambar,
                        ':nama'=> $nama
                    );
                    $query->bindValue( ":id_kategori", $id_kategori, PDO::PARAM_INT );
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