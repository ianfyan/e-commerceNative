<div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Ubah Profile UMKM</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Ubah Profile UMKM</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                               <center><h4>Ubah Profile UMKM</center></h4>
                               <?php
                                    require_once ("koneksi.php");
                                    $id=$_GET['id'];
                                    $connection = new ConnectionDB();
                                    $conn = $connection -> getConnection();
                                    $sql = "SELECT * from tb_toko where id_toko='$id'";
                                    $hasil = $conn->prepare($sql);
                                    $hasil->execute();
                                    foreach($hasil as $data){}
                                ?>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="aksi/edit_profile.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Kode" name="id_profile" hidden readonly value="<?= $data['id_toko']?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control Nama" placeholder="Atas Nama UKM" name="nama_profile" value="<?= $data['nama_toko']?>" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="No Telepon" name="email_profile" value="<?= $data['email_toko']?>" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="file" name="foto" id="foto" class="form-control" required>
                                        </div>
                                        <br>
                                        <center>
                                            <input type="submit" value="Simpan" class="btn btn-inverse" name="submit">
                                        </center>
                                    </form>
                                </div>
                            </div>
                        </div>

                    <!-- /# column -->
                    
                    <!-- /# column -->
                </div>
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <div class="app-footer app-footer-default" id="footer"><br>
                <div class="app-footer-line darken">               
                    <div class="copyright wide text-center">Copyright &copy; <script type='text/javascript'>var creditsyear = new Date();document.write(creditsyear.getFullYear());</script> UMKM Jatim - All Rights Reserved
                </div>
            </div>
            <!-- End footer -->
        </div>
    </div>
</div>