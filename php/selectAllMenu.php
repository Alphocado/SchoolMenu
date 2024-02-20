<?php 
try {
	$sql = "SELECT * FROM menu";
	$stmt = $pdo->query($sql);
	$pbls = $stmt->fetchAll(PDO::FETCH_ASSOC);	
} catch (PDOException $e) {
	echo "Connection failed".$e->getMessage();
} 

?>