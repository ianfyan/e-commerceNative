<div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Tabel Semua Transaksi</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Semua Transaksi</li>
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
                            $sql = "SELECT * from tb_transaksi natural join tb_pesanan natural join tb_pelanggan";
                            $hasil = $conn->prepare($sql);
                            $hasil->execute();
                        ?>
                        <div class="card">
                            <div class="card-title">
                                <center><h4>Semua Transaksi </center></h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                    
                                        <thead>
                                            <tr>
                                                <th><center>Kode</center></th>
                                                <th><center>Nama Pelanggan</center></th>
                                                <th><center>Total</center></th>
                                                <th><center>Tanggal Pesan</center></th>
                                                <th><center>Tanggal Terima</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($hasil as $data){ ?>
                                                <tr>
                                                    <td>
                                                         <?php echo $data['id_pesanan'] ?>
                                                    </td>
                                                    <td>
                                                         <?php echo $data['nama_pelanggan'] ?>
                                                    </td>
                                                    <td style="text-align: center;">
                                                         <?php echo $data['total'] ?>
                                                    </td>
                                                    <td style="text-align: center;">
                                                         <?php echo $data['tanggal'] ?>
                                                    </td>
                                                     <td style="text-align: center;">
                                                         <?php echo $data['tgl_terima'] ?>
                                                    </td>
                                                </tr>
                                            <?php  } ?>
                                        </tbody>
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