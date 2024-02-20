<?php 

// INSERT
// menangkap semua input
if(!(empty($_FILES) && empty($_POST))){
  // input data
  $imgUpload = $_FILES['imgUpload'];
  $imgCode = htmlspecialchars($_POST['imgCode']);
  $judulInput = htmlspecialchars($_POST['judulInput']);
  $hargaInput = htmlspecialchars($_POST['hargaInput']);
  $typeMenu = htmlspecialchars($_POST['type_menu']);
  $namaGambar = $imgUpload['name'];
  $descInput = htmlspecialchars(isset($_POST['deskripsiInput']) ? $_POST['deskripsiInput'] : '');

  try {
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM menu WHERE nama_gambar = :namaGambar OR judul = :judul");
    $stmt->bindParam(':namaGambar', $namaGambar);
    $stmt->bindParam(':judul', $judulInput);
    $stmt->execute();
    $count = $stmt->fetchColumn();
    if($count > 0){
      header("Location: index.php?error=".'Maaf sudah ada data yang sama telah dimasukkan');
      exit;
    } else {
      try{
        $stmt = $pdo->prepare("INSERT INTO menu (gambar, judul, deskripsi, harga, tipe, nama_gambar) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $imgCode);
        $stmt->bindParam(2, $judulInput);
        $stmt->bindParam(3, $descInput);
        $stmt->bindParam(4, $hargaInput);
        $stmt->bindParam(5, $typeMenu);
        $stmt->bindParam(6, $namaGambar);
        $stmt->execute();
        move_uploaded_file($imgUpload['tmp_name'], "../../img/menu/" . $imgCode . ".jpg");
      } catch (PDOException $e) {
        die('Database error: ' . $e->getMessage());
      }
    }
  } catch (PDOException $e) {
    die('Database error: ' . $e->getMessage());
  }
}
?>