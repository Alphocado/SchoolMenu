<?php 
require_once '../../database/db.php';
unlink('../../img/menu/'.$_POST['nama_gambar'].'.jpg');
$stmt = $pdo->prepare("DELETE FROM menu WHERE gambar = :gambar");
$stmt->bindParam(':gambar', $_POST['nama_gambar'], PDO::PARAM_STR);
$stmt->execute();
header("Location: index.php"); 
?>