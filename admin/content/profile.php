<div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Profile UMKM</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Profile UMKM</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row justify-content-center">
                <div class="col-lg-6">
                    <?php
                        require_once ("koneksi.php");
                        $connection = new ConnectionDB();
                        $conn = $connection -> getConnection();
                        $sql = "SELECT * from tb_toko where id_toko='1'";
                        $hasil = $conn->prepare($sql);
                        $hasil->execute();
                        foreach($hasil as $data){}
                    ?>
                        <div class="card">
                            <div class="card-title">
                                <center><h4>Profile UMKM</center></h4>
                            </div>
                            <div class="card-body">
                                <div>
                                    <br><br>
                                    <center><?="<img src='../user/images/".$data['logo']."'style='width:200px; height:200px;'>"?></center>
                                    <br><br><br>
                                </div>
                                <div class="table-responsive">
                                    <table class="table" border="0">
                                    <tr>
                                        <td width="10px">Nama Toko</td>
                                        <td width="5px">:</td>
                                        <td width="100px"><?php echo $data['nama_toko'];?></td>
                                    </tr>
                                    <tr>
                                        <td>E-mail Toko</td>
                                        <td>:</td>
                                        <td><?php echo $data['email_toko'];?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <br>
                                            <center>
                                            <a href="editprofile.php?id=<?php echo $data['id_toko'] ?>"><button type="button" class="btn btn-inverse">Edit Profil Toko</button></a>
                                            </center>
                                        </td>
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
            <!--v> End footer -->
        </di