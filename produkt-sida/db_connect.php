<?php 
/*
db_connect.php
definierar variablar
*/
$Host="localhost";
$Username="DHG17";
$Password="lvk01LVK";
$DB="fruit-stop";


try{
	
	$conn = new PDO("mysql:host=$Host;dbname=$DB;charset=utf8",$Username,$Password);
	//ställer in PDO felmeddelanden
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//echo"Databaskontakten Lyckades!!";
	
}
catch(PDOException $e){
	echo "Databaskontakten Misslyckades". $e->getMessage();
}

?>





























