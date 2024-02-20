<?php 
require_once('database/db.php');
require_once('php/selectAllMenu.php');
?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Coffee 36</title>

		<!-- CSS -->
		<link href="css/templatemo-style.css" rel="stylesheet"/>
		<link rel="stylesheet" href="css/main.css">
</head>
<body> 

	<div class="container">

		<main>

		<!-- pilihan menu -->
			<div class="tm-paging-links tm-info-section">
				<nav>
					<ul>
						<li class="tm-paging-item"><a href="#" class="tm-paging-link active">Drink</a></li>
						<li class="tm-paging-item"><a href="#" class="tm-paging-link">Food</a></li>
						<li class="tm-paging-item"><a href="#" class="tm-paging-link">Snack</a></li>
					</ul>
				</nav>
			</div>

			<!-- Gallery -->
			<div class="row tm-gallery">
				<?php 
				if($pbls):
				?>
				<!-- drink -->
				<div id="tm-gallery-page-drink" class="tm-gallery-page">
					<?php 
					
					foreach($pbls as $pbl):
						if($pbl['tipe'] == "drink"):
					?>
					<article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
						<figure>
							<!-- gambar -->
							<img src="img/menu/<?=$pbl['gambar']?>.jpg" alt="Image" class="img-fluid tm-gallery-img" />
							<figcaption>
								<!-- judul -->
								<h4 class="tm-gallery-title"><?=$pbl['judul']?></h4>
								<!-- deskripsi -->
								<p class="tm-gallery-description"><?=$pbl['deskripsi']?></p>
								<!-- harga -->
								<p class="tm-gallery-price">RP. <?=$pbl['harga']?></p>
								<button class="tambahkan" onclick="tambah('<?=$pbl['gambar']?>','<?=$pbl['judul']?>',<?=$pbl['harga']?>)">Tambahkan</button>
							</figcaption>
						</figure>
					</article>
					<?php 
						endif; 
					endforeach;
					?>
				</div> <!-- drink -->
				<!-- food -->
				<div id="tm-gallery-page-food" class="tm-gallery-page hidden">
					
					<?php 
					foreach($pbls as $pbl):
						if($pbl['tipe'] == "food"):
					?>
					<article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
						<figure>
							<!-- gambar -->
							<img src="img/menu/<?=$pbl['gambar']?>.jpg" alt="Image" class="img-fluid tm-gallery-img" />
							<figcaption>
								<!-- judul -->
								<h4 class="tm-gallery-title"><?=$pbl['judul']?></h4>
								<!-- deskripsi -->
								<p class="tm-gallery-description"><?=$pbl['deskripsi']?></p>
								<!-- harga -->
								<p class="tm-gallery-price">RP. <?=$pbl['harga']?></p>
								<button class="tambahkan" onclick="tambah('<?=$pbl['gambar']?>','<?=$pbl['judul']?>',<?=$pbl['harga']?>)">Tambahkan</button>
							</figcaption>
						</figure>
					</article>
					<?php 
						endif;
					endforeach;
					?>
				</div> <!-- food -->
				<!-- snack -->
				<div id="tm-gallery-page-snack" class="tm-gallery-page hidden">
					<?php 
					foreach($pbls as $pbl):
						if($pbl['tipe'] == "snack"):
					?>
					<article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
						<figure>
							<!-- gambar -->
							<img src="img/menu/<?=$pbl['gambar']?>.jpg" alt="Image" class="img-fluid tm-gallery-img" />
							<figcaption>
								<!-- judul -->
								<h4 class="tm-gallery-title"><?=$pbl['judul']?></h4>
								<!-- deskripsi -->
								<p class="tm-gallery-description"><?=$pbl['deskripsi']?></p>
								<!-- harga -->
								<p class="tm-gallery-price">RP. <?=$pbl['harga']?></p>
								<button class="tambahkan" onclick="tambah('<?=$pbl['gambar']?>','<?=$pbl['judul']?>',<?=$pbl['harga']?>)">Tambahkan</button>
							</figcaption>
						</figure>
					</article>
					<?php 
						endif;
					endforeach;
					?>
				</div> <!-- snack -->

				<?php endif; ?>
			</div>
			
			<form class="input_place" action="database/send.php" method="post">
				<div class="belanjaan">
					<h1>Belanjaan</h1>
					<h3>Total: <span id="total_harga">0</span></h3>

					<div class="list-belanjaan" id="list_belanjaan">
					</div>
					
					<h2>Atas nama</h2>
					<input type="text" class="input_pemilik" name="input_pemilik" required>
					<input type="number" id="total_harga_input" hidden>
				</div>
				<button class="tombol" id="submitButton" disabled>Pesan</button>
			</form>
		</main>
	</div>

	<!-- script -->
	<script src="js/jquery.min.js"></script>
	<script src="js/parallax.min.js"></script>
	<script src="js/default.js"></script>
	<script src="js/main.js"></script>
</body>
</html>

<?php $pdo = null; ?>