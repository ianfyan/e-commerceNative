<?php 
    require_once ("koneksi.php");
    class Login{
        function masuk(){
            $connection = new ConnectionDB();
            $conn = $connection->getConnection();
            try{
                if(isset($_POST['submit'])){
                    if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email']) || empty($_POST['no_telp']) || empty($_POST['nama'])){
                        header('location: login.php?error=true');
                    }else{
                        $email = $_POST['email'];
                        $username = $_POST['username'];
                        $nama = $_POST['nama'];
                        $no_telp = $_POST['no_telp'];
                        $alamat = $_POST['alamat'];
                        $tgl_lhr=$_POST['tgl_lhr'];
                        $password = md5($_POST['password']);
                        $sql = "INSERT INTO tb_pelanggan VALUES ('', '$nama','$username','$email','$tgl_lhr', '$alamat', '$no_telp', '$password') ";
                        $query = $conn->prepare($sql);
                        $query->execute();
                        $sql = "SELECT * FrOm tb_pelanggan where email='$email'";
                        $query = $conn->prepare($sql);
                        $query->execute();
                        foreach($query as $data){}
                        session_start();
                        $_SESSION['username'] = $username;
                        $_SESSION['id_pelanggan'] = $data['id_pelanggan'];
                        $_SESSION['nama'] = $data['nama_pelanggan'];
                        if(isset($_SESSION['sesi'])){
                            $id_cart = $_SESSION['sesi'];
                            $alamat = $data['alamat'];
                            $no_hp = $data['no_telp'];
                            $nama = $data['nama_pelanggan'];
                            $sql = "INSERT into tmp_pengiriman (id_cart, nama_pelanggan, alamat, no_hp) values ('$id_cart', '$nama', '$alamat', '$no_hp')";
                            $result = $conn->prepare($sql);
                            $result->execute();
                        }
                        header('location:login.php');
                    }
                }
            }catch (PDOException $e){
                echo "ERROR : " .$e->getMessage();
            }
        }
    }
    $login = new Login();
    $login->masuk();
?>