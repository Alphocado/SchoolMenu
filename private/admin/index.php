<?php 
// waktu sekarang
$date = new DateTimeImmutable();
// format waktu (kalau perlu)
$time = $date->format('YmdHis');

try {
  require_once('../../database/db.php');
  require_once('../../php/insertNewMenu.php');
  // LIST
  require_once('../../php/selectAllMenu.php');
  // nama pemesan only
  require_once('../../php/namaPemesan.php');
} catch (Exception $e) {
  die('Error loading required files: ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Input</title>
  <link rel="stylesheet" href="../../css/bootstrap-5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="../../css/app.css">
</head>
<body>

<!-- menangkap error -->
  <?php if(isset($_GET['error'])): ?>
    <script>alert("<?=$_GET['error']?>")</script>
  <?php endif; ?>
  <ul class="list-group list-group-horizontal d-flex justify-content-center pt-3">
    <li class="paging-link list-group-item">Insert</li>
    <li class="paging-link list-group-item active">Karcis</li>
    <li class="paging-link list-group-item">List</li>
  </ul>

  <div class="container switch-page hidden" id="switch-page-insert" style="width: 700px;">
    <!-- input menu -->
    <form action="" method="post" enctype="multipart/form-data">
      <!-- gambar input -->
      <div class="mb-3">
        <label for="imgUpload" class="form-label">Input gambar: </label>
        <input type="file" class="form-control" id="imgUpload" name="imgUpload" accept=".jpg" required>
      </div>
      <!-- judul input -->
      <div class="mb-3">
        <label for="judulInput" class="form-label">Judul: </label>
        <input type="text" id="judulInput" name="judulInput" class="form-control" require>
      </div>
      <!-- harga -->
      <div class="mb-3">
        <label for="hargaInput" class="form-label">Harga: </label>
        <input type="text" id="hargaInput" name="hargaInput" class="form-control" step="1.0" require>
      </div>
      <!-- type -->
      <div class="mb-3">
        <div class="form-check">
          <input class="form-check-input" type="radio" id="drink" name="type_menu" value="drink" require>
          <label class="form-check-label" for="drink">Drink</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" id="food" name="type_menu" value="food">
          <label class="form-check-label" for="food">Food</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" id="snack" name="type_menu" value="snack">
          <label class="form-check-label" for="snack">Snack</label> 
        </div>
      </div>
      <!-- deskripsi (optional input) -->
      <div class="form-floating mb-3">
        <textarea class="form-control" name="deskripsiInput" id="deskripsiInput" cols="30" rows="10" style="height: 100px"></textarea>
        <label for="deskripsiInput">Deskripsi (optional)</label>
      </div>

      <!-- gambar input code -->
      <input type="text" name="imgCode" value="<?=$date->format('YmdHis')?>" hidden>

      <input class="btn btn-primary" type="submit" name="submit" value="Submit">
    </form>
  </div>

  <div class="container switch-page mt-3 d-flex flex-wrap" id="switch-page-karcis">

    <?php 
    for($i = 0; $i < count($distinctPemesanArray); $i++):
      $stmt = $pdo->prepare("SELECT nama_pemesan, total_harga, kapan FROM history WHERE nama_pemesan = :nama_pemesan");
      $stmt->bindParam(':nama_pemesan', $distinctPemesanArray[$i]);
      $stmt->execute();
      $loop_karcis = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div class="d-flex jusify-content-center flex-fill m-3">
      <ul class="list-group" style="width: 18rem;">
        <li class="list-group-item d-flex justify-content-between align-items-center active">
          <?=$loop_karcis[0]['kapan']?>
        </li>

        <?php 
          $sql = "SELECT nama_pesanan, jumlah_pesanan, harga FROM history WHERE nama_pemesan = '".$distinctPemesanArray[$i]."'";
          $stmt = $pdo->query($sql);
          $loop_pesan = $stmt->fetchAll(PDO::FETCH_ASSOC);
          foreach ($loop_pesan as $pesan):
        ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <?=$pesan['nama_pesanan']?>: Rp.<?=$pesan['harga']?>          
          <span class="badge bg-primary rounded-pill"><?=$pesan['jumlah_pesanan'] ?></span>        
        </li>

        <?php endforeach; ?>

        <li class="list-group-item d-flex justify-content-between align-items-center">
          Nama: <?=$loop_karcis[0]['nama_pemesan']?>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          Total: Rp.<?=$loop_karcis[0]['total_harga']?>
        </li>
      </ul>
    </div>
    <?php endfor; ?>
  </div>

  <div class="container switch-page hidden d-flex flex-wrap gap-5 mt-5" id="switch-page-list">

    <?php if($pbls): foreach($pbls as $pbl): ?>

    <div class="card" style="width: 18rem;">
      <img src="../../img/menu/<?=$pbl['gambar']?>.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?=$pbl['judul']?></h5>
        <p class="card-text"><?=$pbl['deskripsi']?></p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Harga: <?=$pbl['harga']?></li>
        <li class="list-group-item">Tipe: <?=$pbl['tipe']?></li>
        <li class="list-group-item">Code gambar: <?=$pbl['gambar']?></li>
      </ul>
      <form action="hapus.php" method="post" class="card-body">
        <input type="text" value="<?=$pbl['gambar']?>" name="nama_gambar" hidden>
        <button type="submit" class="btn btn-danger card-link">Hapus</button>
      </form>
    </div>

    <?php endforeach; endif; ?>
  </div>

  <!-- script -->
<script src="../../css/bootstrap-5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="../../js/jquery.min.js"></script>
<script src="../../js/admin.js"></script>
</body>
</html>

<?php $pdo = null; ?>