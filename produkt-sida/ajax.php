<?php
include('db_connect.php');
 
 
if(isset($_GET['id']) && !empty($_GET['id'])){
  $id = $_GET['id'];
    $q_select = "SELECT * FROM students WHERE id=:id";
    $stmt = $conn->prepare($q_select);
    $stmt->execute([':id' => $id]);
 
} else {
  $q_select = "SELECT produkt,kategori.kategori,antal,beskrivning FROM produkter INNER JOIN kategori ON produkter.kategori=kategori.id ";
  $stmt = $conn->query($q_select);
  $stmt->execute();
}
 
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($res, JSON_UNESCAPED_UNICODE);
 
print_r($json);

?>