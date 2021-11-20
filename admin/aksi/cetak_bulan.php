<?php 
    session_start();

    $tahun=$_POST['tahun'];
    $bulan=$_POST['bulan'];

    if(isset($_POST['submit'])){
        if($bulan=="0"){
            $bulanCetak="Januari - Desember";
        }elseif($bulan=="1"){
            $bulanCetak="Januari";
        }elseif($bulan=="2"){
            $bulanCetak="Februari";
        }elseif($bulan=="3"){
            $bulanCetak="Maret";
        }elseif($bulan=="4"){
            $bulanCetak="April";
        }elseif($bulan=="5"){
            $bulanCetak="Mei";
        }elseif($bulan=="6"){
            $bulanCetak="Juni";
        }elseif($bulan=="7"){
            $bulanCetak="Juli";
        }elseif($bulan=="8"){
            $bulanCetak="Agustus";
        }elseif($bulan=="9"){
            $bulanCetak="September";
        }elseif($bulan=="10"){
            $bulanCetak="Oktober";
        }elseif($bulan=="11"){
            $bulanCetak="Desember";
        }else{
            $bulanCetak="Desember";
        }
        if($tahun=="0"){
            $tahunCetak="-";
            if($bulan=="0"){
                $sql = "SELECT * FROM tb_transaksi p INNER JOIN (SELECT a.*, b.id_produk, b.qty, b.sub_total FROM tb_pesanan a INNER JOIN tb_detailpesanan b ON a.id_pesanan=b.id_pesanan) q ON p.id_pesanan=q.id_pesanan INNER JOIN tb_pelanggan g ON q.id_pelanggan=g.id_pelanggan";
                $sq = "SELECT SUM(r.qty) xx, SUM(r.sub_total) yy FROM tb_transaksi p INNER JOIN tb_pesanan q ON p.id_pesanan=q.id_pesanan INNER JOIN tb_detailpesanan r ON q.id_pesanan=r.id_pesanan";
            }else{
                $sql = "SELECT * FROM tb_transaksi p INNER JOIN (SELECT a.*, b.id_produk, b.qty, b.sub_total FROM tb_pesanan a INNER JOIN tb_detailpesanan b ON a.id_pesanan=b.id_pesanan) q ON p.id_pesanan=q.id_pesanan INNER JOIN tb_pelanggan g ON q.id_pelanggan=g.id_pelanggan WHERE MONTH(p.tgl_terima)='$bulan'";
                $sq = "SELECT SUM(r.qty) xx, SUM(r.sub_total) yy FROM tb_transaksi p INNER JOIN tb_pesanan q ON p.id_pesanan=q.id_pesanan INNER JOIN tb_detailpesanan r ON q.id_pesanan=r.id_pesanan WHERE MONTH(p.tgl_terima)='$bulan'";
            }
        }else{
            $tahunCetak=$tahun;
            if($bulan=="0"){
                $sql = "SELECT * FROM tb_transaksi p INNER JOIN (SELECT a.*, b.id_produk, b.qty, b.sub_total FROM tb_pesanan a INNER JOIN tb_detailpesanan b ON a.id_pesanan=b.id_pesanan) q ON p.id_pesanan=q.id_pesanan INNER JOIN tb_pelanggan g ON q.id_pelanggan=g.id_pelanggan WHERE YEAR(p.tgl_terima)='$tahun'";
                $sq = "SELECT SUM(r.qty) xx, SUM(r.sub_total) yy FROM tb_transaksi p INNER JOIN tb_pesanan q ON p.id_pesanan=q.id_pesanan INNER JOIN tb_detailpesanan r ON q.id_pesanan=r.id_pesanan WHERE YEAR(p.tgl_terima)='$tahun'";
            }else{
                $sql = "SELECT * FROM tb_transaksi p INNER JOIN (SELECT a.*, b.id_produk, b.qty, b.sub_total FROM tb_pesanan a INNER JOIN tb_detailpesanan b ON a.id_pesanan=b.id_pesanan) q ON p.id_pesanan=q.id_pesanan INNER JOIN tb_pelanggan g ON q.id_pelanggan=g.id_pelanggan WHERE MONTH(p.tgl_terima)='$bulan' AND YEAR(p.tgl_terima)='$tahun'";
                $sq = "SELECT SUM(r.qty) xx, SUM(r.sub_total) yy FROM tb_transaksi p INNER JOIN tb_pesanan q ON p.id_pesanan=q.id_pesanan INNER JOIN tb_detailpesanan r ON q.id_pesanan=r.id_pesanan WHERE MONTH(p.tgl_terima)='$bulan' AND YEAR(p.tgl_terima)='$tahun'";
            } 
        }
    }

                                

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
    <title>Admin <?php echo $nama;?></title>
    <!-- Bootstrap Core CSS -->
    <link href="../css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->

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
                            $hasil = $conn->prepare($sql);
                            $hasil1 = $conn->prepare($sq);
                            $hasil->execute();
                            $hasil1->execute();
                            foreach($hasil1 as $data1){}
                        ?>
                        <div class="card">
                            <div class="card-title">
                                <center><h2><b> Laporan Penjualan</b></center></h2>
                            </div>
                            <div class="card-body">
                                Tahun &nbsp &nbsp: &nbsp <?php echo $tahunCetak;?><br>
                                Bulan &nbsp &nbsp : &nbsp <?php echo $bulanCetak;?><br>
                                <div class="table-responsive">
                                <br>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" style="vertical-align : middle;"><center>No. Transaksi</center></th>
                                                <th rowspan="2" style="vertical-align : middle;"><center>No. Pesanan</center></th>
                                                <th rowspan="2" style="vertical-align : middle;"><center>Nama Pelanggan</center></th>
                                                <th rowspan="2" style="vertical-align : middle;"><center>Kode Produk</center></th>
                                                <th rowspan="2" style="vertical-align : middle;"><center>Tanggal</center></th>
                                                <th colspan="2"><center>Penjualan</center></th>
                                            </tr>
                                            <tr>
                                                <th><center>Jumlah Order</center></th>
                                                <th><center>Total</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($hasil as $data){ ?>
                                                <tr>
                                                    <td>
                                                         <?php echo $data['id_transaksi'] ?>
                                                    </td>
                                                    <td>
                                                         <?php echo $data['id_pesanan'] ?>
                                                    </td>
                                                    <td>
                                                         <?php echo $data['nama_pelanggan'] ?>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $data['id_produk'] ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $data['tgl_terima'] ?></center>
                                                    </td>
                                                    <td>
                                                         <center><?php echo $data['qty'] ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $data['sub_total'] ?></center>
                                                    </td>
                                                </tr>
                                            <?php  } ?>
                                        </tbody>
                                            <tr>
                                                <th colspan="5"><center>Total Keseluruhan</center></th>
                                                <td><center><?php echo $data1['xx'] ?></center></td>
                                                <td><center><?php echo $data1['yy'] ?></center></td>
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