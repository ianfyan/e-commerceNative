<section class="bgwhite p-t-55 p-b-65">
	<div class="container">
		<div class="col-md-12">
            <center><h3 style="margin-bottom:25px">Pilih Metode Pembayaran</h3></center>
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="fa fa-money" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                COD (Bayar Di Tempat) <span class="fa-chevron-down fa-lg" style="margin-left: 15px"></span>
                            </button>
                        </h5>
                        </div>

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <div class="wrap-table-shopping-cart bgwhite">
                                    <table class="table-shopping-cart">
                                        <tr class="table-head">
                                            <th class="column-1">Cash On Delivery</th>
                                            <th><a href="aksi/pesanan_cod.php"><button class="btn btn-primary col-md-11">Konfirmasi</button></a></th>
                                        </tr>
                                    </table>
                                </div>
                        </div>
                    </div>
                    <br>

                    <div class="card">
                        <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="fa fa-list-alt" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Transfer Via Bank <span class="fa-chevron-down fa-lg" style="margin-left: 65px"></span>
                            </button>
                        </h5>
                        </div>

                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                            <div class="container-table-cart pos-relative">
                                <div class="wrap-table-shopping-cart bgwhite">
                                    <table class="table-shopping-cart">
                                        <tr class="table-head">
                                            <th class="column-1">Nama Bank</th>
                                            <th>No Rekening</th>
                                            <th>Atas Nama</th>
                                            <th></th>
                                        </tr>
                                    <?php
                                        require_once ('koneksi.php');
                                        $connection = new ConnectionDB();
                                        $conn = $connection -> getConnection();
                                        $sql = "SELECT * from tb_rekening";
                                        $query = $conn->prepare($sql);
                                        $query->execute();
                                        foreach($query as $data){
                                    ?>
                                        <tr class="table-row">
                                            <td class="column-1"><?= $data['nama_bank']?></td>
                                            <td><?= $data['no_rek'] ?></td>
                                            <td><?= $data['an']?></td>
                                            <td><a href="aksi/pesanan_baru.php?payment=<?= $data['id_rekening']?>"><button class="btn btn-primary col-md-11">Konfirmasi</button></a></td>
                                        </tr> 
                                    <?php } ?>
                                    </table>

                                    <?php
                                        require_once ('koneksi.php');
                                        $connection = new ConnectionDB();
                                        $conn = $connection -> getConnection();
                                        $id_pesanan = $_GET['pesanan'];
                                        $sql = "SELECT * from tb_pesanan where id_pesanan='$id_pesanan'";
                                        $query = $conn->prepare($sql);
                                        $query->execute();
                                        foreach($query as $data){}
                                    ?>
                        
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>

                </div>

                <br>
                    <div class="size15 trans-0-4" style="margin-bottom:40px">
                        <!-- Button -->
                        <a href="store.php?page=order-sukses"><button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                            Buat Pesanan
                        </button></a>
                    </div>
        </div>
	</div>
</section>
