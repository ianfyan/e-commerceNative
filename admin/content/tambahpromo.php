<div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Tambah Promo</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Promo</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                               <center><h4>Tambah Promo</center></h4>

                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="aksi/tambah_promo.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="text" class="form-control Nama" placeholder="Nama Promo" name="nama_promo" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control Harga" placeholder="Syarat Promo" name="syarat_promo" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="file" name="foto" id="" class="form-control" required>
                                        </div>
                                        <center>
                                            <input type="submit" value="OK" class="btn btn-success waves-effect waves-light m-r-10" name="submit">
                                            <a href="index.php?page=daftarpromo"><button type="button" class="btn btn-inverse">Batal</button></a>
                                        </center>
                                    </form>
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