<div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">LAPORAN</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Laporan Penjualan</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <?php
                            require_once ("koneksi.php");
                            $connection = new ConnectionDB();
                            $conn = $connection -> getConnection();
                            $sql = "SELECT * FROM tb_transaksi p INNER JOIN (SELECT a.*, b.id_produk, b.qty, b.sub_total FROM tb_pesanan a INNER JOIN tb_detailpesanan b ON a.id_pesanan=b.id_pesanan) q ON p.id_pesanan=q.id_pesanan INNER JOIN tb_pelanggan g ON q.id_pelanggan=g.id_pelanggan";
                            $sq = "SELECT SUM(r.qty) xx, SUM(r.sub_total) yy FROM tb_transaksi p INNER JOIN tb_pesanan q ON p.id_pesanan=q.id_pesanan INNER JOIN tb_detailpesanan r ON q.id_pesanan=r.id_pesanan";
                            $hasil = $conn->prepare($sql);
                            $hasil1 = $conn->prepare($sq);
                            $hasil->execute();
                            $hasil1->execute();
                            foreach($hasil1 as $data1){}
                        ?>
                        <div class="card">
                            <div class="card-title">
                                <a href="index.php?page=cetakbulan"><button class="btn btn-primary"><i class="fa fa-plus"></i> Cetak Laporan</button></a>
                                <center><h4><b> Laporan Penjualan</b></center></h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
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
                <div class="app-footer-line darken">               
                    <div class="copyright wide text-center">Copyright &copy; <script type='text/javascript'>var creditsyear = new Date();document.write(creditsyear.getFullYear());</script> UMKM Jatim - All Rights Reserved
                </div>
            </div>
            <!-- End footer -->
        </div>