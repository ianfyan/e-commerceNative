<?php
require_once ("../koneksi.php");
class masukan {
    function masukdb(){
        $connection = new ConnectionDB();
        $conn = $connection->getConnection();

        try{
            if(isset($_POST['submit'])){
                $id_profile = $_POST['id_profile'];
                $nama_profile = $_POST['nama_profile'];
                $email_profile = $_POST['email_profile'];
                $foto = $_FILES['foto']['name'];
                $tmp_foto = $_FILES['foto']['tmp_name'];
                $acak = round(microtime(true));
                $fotobaru = $acak.$foto;
                $gambar = "logo/".$fotobaru;
                $lokasi = "../../user/images/logo/".$fotobaru;
                if(move_uploaded_file($tmp_foto, $lokasi)){
                    $sql = "UPDATE tb_toko set nama_toko=:nama_profile, email_toko=:email_profile, logo=:gambar where id_toko=:id_profile";
                    $query= $conn->prepare($sql);
                    $dataprofile = array(
                        ':id_profile' => $id_profile,
                        ':nama_profile'=> $nama_profile,
                        ':email_profile'=> $email_profile,
                        ':gambar'=> $gambar
                    );
                    $query->bindValue( ":id_profile", $id_profile, PDO::PARAM_INT );
                    $query->execute($dataprofile);
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