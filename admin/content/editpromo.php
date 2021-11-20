<div class="page-wrapper">
            <!-- Bread crumb -->
            
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                               <center><h4>Form Edit Promo</center></h4>
                               <?php
                                    require_once ("koneksi.php");
                                    $id=$_GET['id'];
                                    $connection = new ConnectionDB();
                                    $conn = $connection -> getConnection();
                                    $sql = "SELECT * from tb_promo where id_promo=$id";
                                    $hasil = $conn->prepare($sql);
                                    $hasil->execute();
                                    foreach($hasil as $data){}
                                ?>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <div class="row">
                                        <div class="col-md-10" style="padding-right:1px">
                                            <form action="aksi/edit_promo.php  " method="post">
                                                <div class="form-group">
                                                    <input type="text" class="form-control Kode " placeholder="Kode" name="id_promo" readonly value="<?php echo $data['id_promo'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control Nama" placeholder="Nama" name="nama_promo" value="<?php echo $data['promo'] ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control Harga" placeholder="Harga" name="syarat_promo" value="<?php echo $data['syarat_promo'] ?>" required>
                                                </div>
                                                <center>
                                                    <input type="submit" value="Save"  class="btn btn-success waves-effect waves-light m-r-10" name="submit">
                                                </center>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    
                    <!-- /# column -->
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
    </div>
</div>