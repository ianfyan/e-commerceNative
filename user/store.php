<?php
	session_start();
	require_once 'koneksi.php';
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
		header('location: index.php?page=daftar');
	}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="icon" type="image/png" sizes="16x16" href="images/<?php echo $logo;?>">
	<title><?php echo $nama;?></title>
    <?php include 'asset/css.php'?>
</head>
<body class="animsition">

	<!-- Header -->
	<?php 
		include 'asset/header_user.php';
		?>

	<!-- Slide1 -->
	
	<?php 
		error_reporting(0);
		if($_GET['page']==''){
			include 'asset/main.php';
		}
		if($_GET['page']=='1'){
			include 'content/batik.php';
		}
		if($_GET['page']=='2'){
			include 'content/kulit.php';
		}
		if($_GET['page']=='3'){
			include 'content/keramik.php';
		}
		if($_GET['page']=='4'){
			include 'content/kayu.php';
		}
		if($_GET['page']=='5'){
			include 'content/lain.php';
		}
		if($_GET['page']=='tentang'){
			include 'content/tentang.php';
		}
		if($_GET['page']=='bantuan'){
			include 'content/bantuan.php';
		}
		if($_GET['page']=='masuk'){
			include 'content/masuk.php';
		}
		if($_GET['page']=='daftar'){
			include 'content/daftar.php';
		}
		if($_GET['page']=='cart'){
            include 'content/cart.php';
		}
		if($_GET['page']=='pembayaran'){
			include 'content/pembayaran.php';
		}
		if($_GET['page']=='order-sukses'){
			include 'content/order-sukses.php';
		}
		if($_GET['page']=='cari'){
			include 'content/pencarian.php';
		}
	?>

	<!-- Iklan -->



	<!-- Shipping -->
	<?php include 'asset/shipping.php'?>


	<!-- Footer -->
    <?php include 'asset/footer.php'?>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>


<!-- import javascript dan JQuery -->
<?php include 'asset/js.php'?>

</body>
</html>
<?php } ?>