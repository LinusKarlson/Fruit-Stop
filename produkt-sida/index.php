<?php 

require('db_connect.php')

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Fruit-Stop</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	
<style>
	
	.box{
		
		margin-left: 25%;
		margin-right: 25%;
		margin-top: 100px;
		
	}
	.center{
		
		text-align: center;
		
	}
	
</style>
</head>

<body>
	
	<div class="box">
		
		
		<div class="jumbotron jumbotron-fluid">
			<h1 class="center">Produkter</h1>
			<hr class="my-4">
			
			<table class="table">
  				<thead>
    				<tr>
      					<th scope="col col-md-2">#</th>
      					<th scope="col col-md-2">Produkt</th>
      					<th scope="col col-md-2">Katerogi</th>
      					<th scope="col col-md-2">Antal st</th>
						<th scope="col col-md-2">Uppdatera</th>
						<th scope="col col-md-2">Radera</th>
    				</tr>
  				</thead>
  				<tbody>
    				<tr>
      					<th scope="row">1</th>
      					<td>Bäron</td>
      					<td>Bär</td>
      					<td>300</td>
						<td><a class="btn btn-outline-warning"  role="button" href="#">Uppdatera</a></td>
						<td><a class="btn btn-outline-danger"   role="button" href="#">Radera</a></td>
    				</tr>
    
 				</tbody>
			</table>
			
		</div>		
		
	</div>
	
	
</body>
</html>