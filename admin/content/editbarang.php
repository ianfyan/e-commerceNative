<div class="page-wrapper">
            <!-- Bread crumb -->
            
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                               <center><h4>Form Edit Produk</center></h4>
                               <?php
                                    require_once ("koneksi.php");
                                    $id=$_GET['id'];
                                    $connection = new ConnectionDB();
                                    $conn = $connection -> getConnection();
                                    $sql = "SELECT * from tb_produk where id_produk=$id";
                                    $hasil = $conn->prepare($sql);
                                    $hasil->execute();
                                    foreach($hasil as $data){}
                                ?>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <div class="row"> 
                                        <div class="col-md-10" style="padding-right:1px">
                                            <form action="aksi/edit_barang.php  " method="post">
                                                <div class="form-group">
                                                    <input type="text" class="form-control Kode " placeholder="Kode" name="id_produk" value="<?php echo $data['id_produk'] ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control Nama" placeholder="Nama" name="nama_produk" value="<?php echo $data['nama_produk'] ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <?php
                                                        $sql1 = "SELECT * from tb_kategori";
                                                        $hasil1 = $conn->prepare($sql1);
                                                        $hasil1->execute();
                                                    ?>
                                                    <select name="kategori" id="" class="form-control" required>
                                                        <?php foreach($hasil1 as $data1){ ?>
                                                        <option value="<?php echo $data1['id_kategori'] ?>" <?php if ($data1['id_kategori'] == $data['id_kategori']) {
                                                            echo "selected";
                                                        } ?> ><?php echo $data1['nama_kategori'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control Harga" placeholder="Harga" name="harga" value="<?php echo $data['harga_produk'] ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control Jumlah" placeholder="Jumlah" name="jumlah" value="<?php echo $data['jumlah_produk'] ?>" required>
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