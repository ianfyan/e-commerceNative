<?php
require_once ("../koneksi.php");
class masukan {
    function masukdb(){
        $connection = new ConnectionDB();
        $conn = $connection->getConnection();

        try{
            if(isset($_POST['submit'])){
                $nama_ukm = $_POST['nama_ukm'];
                $bentuk_usaha = $_POST['bentuk_usaha'];
                $tgl_berdiri = $_POST['tgl_berdiri'];
                $alamat = $_POST['alamat'];
                $no_telpUKM = $_POST['no_telpUKM'];
                $sektor = $_POST['sektor'];
                $foto = $_FILES['logo_ukm']['name'];
                $tmp_foto = $_FILES['logo_ukm']['tmp_name'];
                $acak = round(microtime(true));
                $logo_ukm = $acak.$foto;
                $lokasi = "../../media/foto/logo/".$logo_ukm;
                $sql = "INSERT into tb_profile (nama_ukm, bentuk_usaha, tgl_berdiri, alamat, no_telpUKM, sektor) values(:nama_ukm, :bentuk_usaha, :tgl_berdiri, :alamat, :no_telpUKM, :sektor)";
                $query= $conn->prepare($sql);
                $dataprofile = array(
                    ':nama_ukm'=> $nama_ukm,
                    ':bentuk_usaha'=> $bentuk_usaha,
                    ':tgl_berdiri'=> $tgl_berdiri,
                    ':alamat'=> $alamat,
                    ':no_telpUKM'=> $no_telpUKM,
                    ':sektor'=> $sektor
                );
                //$query->bindValue( ":id_produk", $id_produk, PDO::PARAM_INT );
                $query->execute($dataprofile);
                $sql = "SELECT * FROM tb_profile where nama_ukm = '$nama_ukm'";
                $query = $conn->prepare($sql);
                $query->execute();
                foreach($query as $data){}
                $id_profile = $data['id_profile'];
                //Upload Foto
                if(move_uploaded_file($tmp_foto, $lokasi)){
                    $sql = "INSERT into tb_logo (id_profile, logo_ukm) values('$id_profile', '$logo_ukm')";
                    $query = $conn->prepare($sql);
                    $query->execute();
                    header('Location: ../index.php?page=profile');
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