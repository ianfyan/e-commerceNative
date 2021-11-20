<?php
require_once 'koneksi.php';
$connection = new ConnectionDB();
$conn = $connection->getConnection();
$sql1 = "SELECT * from tb_toko where id_toko = '1'";
$query1 = $conn->prepare($sql1);
$query1->execute();
foreach($query1 as $data1){
    $logo = $data1['logo'];
}
?>
<div class="header" style="background-color: #DCDCDC">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header" style="background-color: #DCDCDC">
                    <a class="navbar-brand" href="index.php">
                        <!-- Logo icon -->
                        <b><img src="../user/images/<?php echo $logo;?>" width="85" height="50" alt="homepage" class="dark-logo" /></b>
                        <!--End Logo icon -->
                        <!-- Logo text
                        <span><img src="images/logo-text.png" alt="homepage" class="dark-logo" /></span>  -->
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a></li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"></a></li>
                       
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">

                        <!-- Search -->
                        
                        <!-- Comment -->
                        
                        <!-- End Comment -->
                        <!-- Messages -->
                        
                        <!-- End Messages -->
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sign-out" style="color: black"></i><b style= "color: black">Logout</b></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i>Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>