<?php 
    session_start();                             

    require_once '../koneksi.php';
    $connection = new ConnectionDB();
    $conn = $connection->getConnection();
    $sql1 = "SELECT * from tb_toko where id_toko = '1'";
    $query1 = $conn->prepare($sql1);
    $query1->execute();
    foreach($query1 as $data1){
        $logo = $data1['logo'];
        $nama = $data1['nama_toko'];
    }
    if(empty($_SESSION['username'])){
        header('location: login.php');
    }else{
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../user/images/<?php echo $logo;?>">
    <title>Cetak Bukti Transaksi</title>
    <!-- Bootstrap Core CSS -->
    <link href="../css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <?php include '../asset/css.php'?>
    <link href="../css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="../css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="../css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="../css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="../css/helper.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
    <!-- Main wrapper  -->
    <div id="main-wrapper">
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <?php
                            $id_pesanan = $_GET['id_pesanan'];
                            $sql = "SELECT * FROM tb_pesanan WHERE id_pesanan='$id_pesanan'";
                            $hasil = $conn->prepare($sql);
                            $hasil->execute();
                            foreach($hasil as $data){
                                $id_pelanggan = $data['id_pelanggan'];
                            }
                            $sq = "SELECT * FROM tb_pelanggan where id_pelanggan='$id_pelanggan'";
                            $hasil1 = $conn->prepare($sq);
                            $hasil1->execute();
                            foreach($hasil1 as $data1){}
                        ?>
                        <div class="card">
                            <div class="card-title">
                                <center><h2><b> Kode Pesanan : <?= $_GET['id_pesanan']?></b></center></h2>
                            </div>
                            <div class="card-body">
                                Nama Pembeli &nbsp &nbsp: &nbsp <?php echo $data1['nama_pelanggan'];?><br>
                                Alamat Pembeli &nbsp: &nbsp <?php echo $data1['alamat'];?><br>
                                Status Pesanan &nbsp &nbsp: &nbsp <?php echo $data['statuspesanan'];?><br>
                                <div class="table-responsive">
                                <br>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" style="vertical-align : middle;" width="30%"><center>Nama Produk</center></th>
                                                <th rowspan="2" style="vertical-align : middle;" width="30%"><center>Harga Produk</center></th>
                                                <th colspan="2" ><center>Penjualan</center></th>
                                            </tr>
                                            <tr>
                                                <th width="10%"><center>Jumlah Order</center></th>
                                                <th width="10%"><center>Sub Total</center></th>
                                            </tr>
                                            </thead>
                                            <?php 
                                            $sql2 = "SELECT * from tb_detailpesanan a, tb_produk b where a.id_produk=b.id_produk and a.id_pesanan='$id_pesanan'";
                                            $hasil2 = $conn->prepare($sql2);
                                            $hasil2->execute();
                                            foreach($hasil2 as $data2){ ?>
                                                <tr>
                                                <td><?= $data2['nama_produk']?></td>
                                                <td><center><?= "Rp. ".number_format($data2['harga_produk'], 2, ',','.') ?></center></td>
                                                <td><center><?= $data2['qty']?></center></td>
                                                <td><?= "Rp. ".number_format($data2['sub_total'], 2, ',','.') ?></td>
                                                </tr>
                                            <?php  } ?>
                                        
                                            <tr>
                                                <td colspan="2"><center>Total Pembelian</center></th>
                                                <td colspan="2"><center><?= "Rp. ".number_format($data['total'], 2, ',','.') ?></center></td>
                                            </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                    </div>                  
                <div class="row bg-white m-l-0 m-r-0 box-shadow ">

                    <!-- column -->
                    
                    <!-- column -->

                    <!-- column -->
                    
                    <!-- column -->
                </div>
                </div>
               
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <div class="app-footer app-footer-default" id="footer"><br><br>
            <br>
            </div>
            <!-- End footer -->
    </div>
</div>
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="../js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../js/lib/bootstrap/js/popper.min.js"></script>
    <script src="../js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="../js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->


    <!-- Amchart -->
     <script src="../js/lib/morris-chart/raphael-min.js"></script>
    <script src="../js/lib/morris-chart/morris.js"></script>
    <script src="../js/lib/morris-chart/dashboard1-init.js"></script>


	<script src="../js/lib/calendar-2/moment.latest.min.js"></script>
    <!-- scripit init-->
    <script src="../js/lib/calendar-2/semantic.ui.min.js"></script>
    <!-- scripit init-->
    <script src="../js/lib/calendar-2/prism.min.js"></script>
    <!-- scripit init-->
    <script src="../js/lib/calendar-2/pignose.calendar.min.js"></script>
    <!-- scripit init-->
    <script src="../js/lib/calendar-2/pignose.init.js"></script>

    <script src="../js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="../js/lib/owl-carousel/owl.carousel-init.js"></script>
    <script src="../js/scripts.js"></script>
    <!-- scripit init-->

    <script src="../js/custom.min.js"></script>
    <script>
        window.onload= window.print;
    </script>

</body>

</html>
    <?php } ?>