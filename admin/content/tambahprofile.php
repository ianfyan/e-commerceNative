<div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Tambah Profile</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Profile</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                               <center><h4>Tambah Profile</center></h4>

                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="aksi/tambah_profile.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="text" class="form-control Nama" placeholder="Nama UKM" name="nama_ukm" required>
                                        </div>
                                        <div class="form-group">
                                            <?php
                                                require_once ("koneksi.php");
                                                $connection = new ConnectionDB();
                                                $conn = $connection -> getConnection();
                                                $sql = "SELECT * from tb_profile";
                                                $hasil = $conn->prepare($sql);
                                                $hasil->execute();
                                            ?>
                                            <select name="bentuk_usaha" id="" class="form-control" required>
                                                <option value="">--Pilih Bentuk usaha--</option>
                                                <option <?php if($data['bentuk_usaha']=='CV'){ echo "selected";} ?> value="CV"value="">CV</option>
                                                <option <?php if($data['bentuk_usaha']=='Koperasi'){ echo "selected";} ?>value="Koperasi">Koperasi</option>
                                                <option <?php if($data['bentuk_usaha']=='Firma'){ echo "selected";} ?>value="Firma">Firma</option>
                                                <option <?php if($data['bentuk_usaha']=='Perorangan'){ echo "selected";} ?>value="Perorangan">Perorangan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="date" class="form-control" placeholder="Tanggal Berdiri" name="tgl_berdiri" required>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="Alamat" name="alamat" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="No Telepon" name="no_telpUKM" required>
                                        </div>
                                        <div class="form-group">
                                        <select name="sektor" id="" class="form-control" required>
                                                <option value="">--Pilih Sektor--</option>
                                                <option <?php if($data['sektor']=='Pertanian'){ echo "selected";} ?> value="Pertanian">Pertanian
                                                </option>
                                                <option <?php if($data['sektor']=='Pertambangan & penggalian'){ echo "selected";} ?> value="Pertambangan & penggalian">Pertambangan & penggalian
                                                </option>
                                                <option <?php if($data['sektor']=='Industri pengolahan'){ echo "selected";} ?> value="Industri pengolahan">Industri pengolahan
                                                </option>
                                                <option <?php if($data['sektor']=='Listrik, gas, dan air'){ echo "selected";} ?> value="Listrik, gas, dan air">Listrik, gas, dan air
                                                </option>
                                                <option <?php if($data['sektor']=='kontruksi'){ echo "selected";} ?> value="kontruksi">kontruksi</option>
                                                <option <?php if($data['sektor']=='transportasi'){ echo "selected";} ?> value="transportasi">transportasi
                                                </option>
                                                <option <?php if($data['sektor']=='Perdagangan hotel dan restoran'){ echo "selected";} ?> value="Perdagangan hotel dan restoran">Perdagangan hotel dan restoran
                                                </option>
                                                <option <?php if($data['sektor']=='keuangan'){ echo "selected";} ?> value="keuangan">keuangan
                                                </option>
                                                <option <?php if($data['sektor']=='jasa-jasa'){ echo "selected";} ?> value="jasa-jasa">jasa-jasa</option>
                                            </select>
                                        </div> 
                                        <div class="form-group">
                                            <input type="file" name="logo_ukm" id="" class="form-control" required>
                                        </div>
                                        <center>
                                            <input type="submit" value="OK" class="btn btn-success waves-effect waves-light m-r-10" name="submit">
                                            <a href="index.php?page=tentang"><button type="button" class="btn btn-inverse">Batal</button></a>
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