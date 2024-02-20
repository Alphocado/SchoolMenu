<?php 
try{
  $query = "SELECT DISTINCT nama_pemesan FROM history";
  $stmt = $pdo->prepare($query);
  $stmt->execute();
  $distinctPemesanArray = $stmt->fetchAll(PDO::FETCH_COLUMN);
}catch (PDOException $e) {
	echo "Connection failed".$e->getMessage();
} 

?>