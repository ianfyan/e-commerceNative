<?php
    session_start();
    $id = $_GET['id'];
    require_once '../koneksi.php';
    $connection = new ConnectionDB();
    $conn = $connection->getConnection();
    $statustransaksi = 'Pesanan di Batalkan';
    //Memanggil Data dari tb_pesanan
    $sql = "SELECT * from tb_pesanan where id_pesanan = '$id'";
    $result = $conn->prepare($sql);
    $result->execute();
    foreach($result as $pesanan);
    //Prepare Data
    $id_pesanan = $pesanan['id_pesanan'];
    $id_pelanggan = $_SESSION['id_pelanggan'];
    $nama_pelanggan = $pesanan['nama_pelanggan'];
    $alamat = $pesanan['alamat'];
    $no_hp = $pesanan['no_hp'];
    $total = $pesanan['total'];
    $id_rekening = $pesanan['id_rekening'];
    $tanggal = date('Y-m-d');
    $id_transaksi='TR'.$id_pesanan;
    //Proses Pindah Data ke tb_transaksi
    $sql = "INSERT into tb_transaksi values ('$id_transaksi','$id_pesanan','$tanggal')";
    $result = $conn->prepare($sql);
    $result->execute();
    //Proses Mencopy Data ke tb_detail_transaksi
    $sql = "SELECT * from tb_detailpesanan where id_pesanan='$id_pesanan'";
    $result = $conn->prepare($sql);
    $result->execute();
    foreach($result as $detail){
        $id_produk = $detail['id_produk'];
        $qty = $detail['qty'];
        $id_detail = $detail['id_detail'];
        $total = $detail['sub_total'];
        $sql = "INSERT into tb_detailtransaksi values ('$id_detail', '$id_pesanan', '$id_produk', '$qty', '$total')";
        $result = $conn->prepare($sql);
        $result->execute();
    }
    $sql = "UPDATE tb_pesanan set statuspesanan='Pesanan Di Batalkan' where id_pesanan = '$id_pesanan'";
    $result = $conn->prepare($sql);
    $result->execute();
    unset($_SESSION['sesi']);
    header('location: ../user.php');
?>