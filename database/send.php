<?php
require_once 'db.php';

function transformForDatabase($postData) {
    // Initialize the pesanan array
    $pesananList = array();

    // Iterate through the posted data
    foreach ($postData as $key => $value) {
        // Check if the key has the structure 'category/key'
        if (preg_match('/^([^\/]+)\/(.+)$/', $key, $matches)) {
            $category = $matches[1];
            $itemKey = $matches[2];

            // Create or update the item in the $pesananList array
            if (!isset($pesananList[$category])) {
                $pesananList[$category] = array();
            }

            // Update the values based on the key
            switch ($itemKey) {
                case 'nama_pesanan':
                    $pesananList[$category]['nama_pesanan'] = $value;
                    break;
                case 'harga':
                    $pesananList[$category]['harga'] = intval($value);
                    break;
                case 'jumlah':
                    $pesananList[$category]['jumlah'] = intval($value);
                    break;
            }
        }
    }

    // Reindex the array numerically
    $pesananList = array_values($pesananList);

    return $pesananList;
}
$postData = $_POST;
$pesananList = transformForDatabase($postData);

// pesanan list
var_dump($pesananList);
// waktu pesanan
var_dump($_POST['waktu_pesanan']);
// input pemilik
var_dump($_POST['input_pemilik']);
// total harga
$total=0;
for($i = 0; $i < count($pesananList); $i++){
  $total += $pesananList[$i]['harga'];
}

for($i = 0; $i < count($pesananList); $i++){
  $stmt = $pdo->prepare("INSERT INTO history (nama_pesanan, jumlah_pesanan, nama_pemesan, total_harga, harga, kapan) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bindParam(1, $pesananList[$i]['nama_pesanan']);
  $stmt->bindParam(2, $pesananList[$i]['jumlah']);
  $stmt->bindParam(3, $_POST['input_pemilik']);
  $stmt->bindParam(4, $total);
  $stmt->bindParam(5, $pesananList[$i]['harga']);
  $stmt->bindParam(6, $_POST['waktu_pesanan']);
  $stmt->execute();
}
header('Location: ../index.php');

?>
