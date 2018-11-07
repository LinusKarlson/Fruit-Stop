<?php

require("db_connect.php");

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
	
	
}else{
	
	$output="var snäll och välj en kategori som existerar! alternativen är Frukt   Grönsak   Bär";
	
	
}
	


}

?>
<!doctype html>
<html>

<head>

<title>php-mysql insert</title>
<meta charset="utf-8">

</head>

<body>
<?php if(!empty($output)){ echo "<h3>".$output."<h3>";}?>
<h1>Lägg till en ny elev</h1>

<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

<p><label>Produkt</label><br><input type="text" name="FirstName"></p>
<p><label>Kategori</label><br><input type="text" name="BirthYear"></p>
<p><label>Antal</label><br><input type="text" name="LastName"></p>
<p><label>Beskrivning</label><br><input type="text" name="beskrivning"></p>


<button type="submit">lägg till produkt</button>

</form>

</body>


</html>