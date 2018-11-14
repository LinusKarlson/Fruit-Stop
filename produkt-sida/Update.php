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
	$sql="UPDATE produkter SET
								produkt=:firstname,
								kategori=:lastname,
								antal=:birthyear,
								beskrivning=:beskrivning
		WHERE id=:id";
								
	$row=[
	
		":id"=>$_POST['id'],
		":firstname"=>$_POST['FirstName'],
		":birthyear"=>$_POST['LastName'],
		":lastname"=>$antal,
		":beskrivning"=>$_POST['beskrivning']
	
	];
	
	$res=$conn->prepare($sql)->execute($row);
	
	
	if($res){
		$output="Produkten uppdaterad";
	}else{
		$output="Ups, nånting gick fel...";
	}
	
	
}else{
	
	$output="var snäll och välj en kategori som existerar!";
	
}


}


if(isset($_GET['id'])){
	
	$sql = "SELECT produkter.id,produkt,kategori.kategori,antal,beskrivning FROM produkter INNER JOIN kategori ON produkter.kategori=kategori.id WHERE produkter.id=:id";
	$row = [ ':id' => $_GET['id']
	];
	
	$res= $conn->prepare($sql);
	$res->execute($row);
	
	$student=$res->fetch(PDO::FETCH_ASSOC);
}

?>
<!doctype html>
<html>

<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
.form-control{
		display: inline;
		width: 110px;
		
</style>
<title>php-mysql insert</title>
<meta charset="utf-8">

</head>

<body>
<div class="jumbotron box">

	<?php if (isset($output)){echo "<h3 class='alert alert-warning'>".$output."</h3>";} ?>
	<h1>Uppdatera produkten</h1>
	<hr class="my-4">
	<form method="post" action="<?php echo $_SERVER["PHP_SELF"]."?id=".$student['id']; ?>">

		<input type="hidden" name="id" value="<?php echo $student['id']; ?>" >


		<label class="to-the-right">Produkt</label><label>Kategori</label><br>
		<input type="text" name="FirstName" value="<?php echo $student['produkt'] ?>" required>
		<select class="form-control" name="BirthYear">
			<option>Bär</option>
			<option>Frukt</option>
			<option>Grönsak</option>
			</select>			<br>
		
		
		<label>Antal</label><label class="to-the-left">Beskrivning</label><br>
		<input type="text" name="LastName" value="<?php echo $student['antal'] ?>" required>
		<input type="text" name="beskrivning" value="<?php echo $student['beskrivning'] ?>"><br><br>

		<button class="btn btn-outline-success" type="submit">Uppdatera produkt </button>
		<a class="btn btn-outline-danger" href="index.php">Tillbaka</a>
	</form>
</div>
</body>


</html>