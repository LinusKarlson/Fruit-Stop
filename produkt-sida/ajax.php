<?php
include('db_connect.php');
 
 
if(isset($_GET['kategori']) && !empty($_GET['kategori'])){
  $id = $_GET['kategori'];
    $q_select = "SELECT produkter.id,produkt,kategori.kategori,antal,beskrivning FROM produkter INNER JOIN kategori ON produkter.kategori=kategori.id WHERE kategori.kategori=:id";
    $stmt = $conn->prepare($q_select);
    $stmt->execute([':id' => $id]);
 
} else {
  $q_select = "SELECT produkter.id,produkt,kategori.kategori,antal,beskrivning FROM produkter INNER JOIN kategori ON produkter.kategori=kategori.id ";
  $stmt = $conn->query($q_select);
  $stmt->execute();
}
 
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($res, JSON_UNESCAPED_UNICODE);
 
print_r($json);

?>