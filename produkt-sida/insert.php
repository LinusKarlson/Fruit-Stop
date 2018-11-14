<?php
session_start();
require('db_connect.php');

if(!isset($_SESSION['user'])){
	echo 'test';
	header('Location: ../inloggning/index.php?action=nosession');
}
$antal="";
if(isset($_POST)&& !empty($_POST)){
	
	
	if($_POST['BirthYear']=="Bär"||$_POST['BirthYear']=="bär"){
		
		$antal="2";
		
	}else if($_POST['BirthYear']=="Frukt"||$_POST['BirthYear']=="frukt"){
		
		$antal="1";
		
	} else if($_POST['BirthYear']=="Grönsak"||$_POST['BirthYear']=="grönsak"){
		
		$antal="3";
		
}
	if($antal != ""){
	$sql ="INSERT INTO produkter (produkt,kategori,antal,beskrivning) VALUES(:FirstName,:BirthYear,:antal,:beskrivning)";
	$result=$conn->prepare($sql);
	$res=$result->execute(
	
		array(
		":FirstName"=>$_POST["FirstName"],
		":antal"=>$_POST["LastName"],
		":BirthYear"=>$antal,
		":beskrivning"=>$_POST["beskrivning"]
		)
	
	);
	
	if($res){
		$output="Ny Produkt tillagd";
	}else{
		$output="Ups, nånting gick fel...";
	}
	
	
}
if($antal>0){
	
	$output="var snäll och välj en kategori som existerar!";
	
	
}
	


}

?>
<!doctype html>
<html>

<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<title>php-mysql insert</title>
<meta charset="utf-8">
<style>
.box{
		
		margin-left: 34%;
		margin-right: 34%;
		margin-top: 100px;
		
	}
.to-the-right{
	margin-right:128px;
	
}

.to-the-left{
	
	margin-left:148px;
	
}


</style>
</head>

<body>

<div class="jumbotron box">
<?php if (isset($output)){echo "<h3 class='alert alert-warning'>".$output."</h3>";} ?>

<h1>Lägg till en ny produkt</h1>
<hr class="my-4">
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

<label class="to-the-right">Produkt</label><label>Kategori</label><br>
<input type="text" name="FirstName" required>
<input type="text" name="BirthYear" required><br>


<label>Antal</label><label class="to-the-left">Beskrivning</label><br>
<input type="text" name="LastName" required>
<input type="text" name="beskrivning"><br><br>


<button class="btn btn-outline-success" type="submit">lägg till produkt</button>
<a class="btn btn-outline-danger" href="index.php">Tillbaka</a>
</div>
</form>

</body>


</html>