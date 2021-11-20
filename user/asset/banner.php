<section class="banner bgwhite p-t-40 p-b-40">
        <div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Produk Kami
				</h3>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
					<?php
						$sq1 = "SELECT * from tb_kategori where id_kategori = '1'";
						$que1 = $conn->prepare($sq1);
						$que1->execute();
						foreach($que1 as $item1){
					?>
						<img src="images/<?php echo $item1['gambar_kategori'];?>" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="index.php?page=1" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
							<?php
									echo $item1['nama_kategori'];
								}
							?>
							</a>
						</div>
					</div>

					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
					<?php
						$sq2 = "SELECT * from tb_kategori where id_kategori = '2'";
						$que2 = $conn->prepare($sq2);
						$que2->execute();
						foreach($que2 as $item2){
					?>
						<img src="images/<?php echo $item2['gambar_kategori'];?>" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="index.php?page=2" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
							<?php
									echo $item2['nama_kategori'];
								}
							?>
							</a>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
					<?php
						$sq3 = "SELECT * from tb_kategori where id_kategori = '3'";
						$que3 = $conn->prepare($sq3);
						$que3->execute();
						foreach($que3 as $item3){
					?>
						<img src="images/<?php echo $item3['gambar_kategori'];?>" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="index.php?page=3" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
							<?php
									echo $item3['nama_kategori'];
								}
							?>
							</a>
						</div>
					</div>

					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
					<?php
						$sq4 = "SELECT * from tb_kategori where id_kategori = '4'";
						$que4 = $conn->prepare($sq4);
						$que4->execute();
						foreach($que4 as $item4){
					?>
						<img src="images/<?php echo $item4['gambar_kategori'];?>" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="index.php?page=4" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
							<?php
									echo $item4['nama_kategori'];
								}
							?>
							</a>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<?php
						$sq2 = "SELECT * from tb_kategori where id_kategori = '5'";
						$que2 = $conn->prepare($sq2);
						$que2->execute();
						foreach($que2 as $item2){
					?>
						<img src="images/<?php echo $item2['gambar_kategori'];?>" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="index.php?page=1" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
							<?php
									echo $item2['nama_kategori'];
								}
							?>
							</a>
						</div>
					</div>

					<!-- block2 -->

				</div>
			</div>
		</div>
	</section>