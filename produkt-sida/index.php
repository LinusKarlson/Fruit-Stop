<?php 
session_start();
require('db_connect.php');

if(!isset($_SESSION['user'])){
	echo 'test';
	header('Location: ../inloggning/index.php?action=nosession');
} else if(isset($_GET['delete'])){
	 
	 $sql="DELETE FROM produkter WHERE id=:id";
	 $row=[ ':id'=>$_GET['delete'] ];
	 
	 $res=$conn->prepare($sql)->execute($row);
	 
	 if($res){
		 
		 $output="produkten är borttagen";
		 
	 }else{
		 
		 $output="Någonting gick fel";
		 
	 }
	 
 }
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
	
	<div class="box" id="app">
		
		
		<div class="jumbotron jumbotron-fluid">
			<h1 class="center">Produkter</h1>
			<hr class="my-4">
			
			<?php if (isset($output)){echo "<h3 class='alert alert-warning'>".$output."</h3>";} ?>
			
			<a class="btn btn-outline-primary" @click="allRecords()"  class="hi">Välj alla produkter</a>
			
			<input type="text" list="randlist" name="randlist" v-model="kategori" >
				<datalist id="randlist">
				<option value="Bär">
				<option value="Frukt">
				<option value="Grönsak">
				</datalist>
			<a class="btn btn-outline-primary" @click="recordByKategori()">Välj kategori</a>
			<a class="btn btn-outline-success"  role="button" href="insert.php">Lägg till</a>
			
			<table class="table">
  				<thead>
    				<tr>
      					
      					<th scope="col col-md-2">Produkt</th>
      					<th scope="col col-md-2">Katerogi</th>
      					<th scope="col col-md-2">Antal</th>
						<th scope="col col-md-2">Beskrivning</th>
						<th scope="col col-md-2">Uppdatera</th>
						<th scope="col col-md-2">Radera</th>
    				</tr>
  				</thead>
  				<tbody>
    				<tr v-for="student in students">
      				
      					<td>{{ student.produkt }}</td>
						<td>{{ student.kategori }}</td>
						<td>{{ student.antal }}</td>
						<td>{{ student.beskrivning }}</td>
						<td><a class="btn btn-outline-warning"  role="button" v-bind:href="'Update.php?id=' + student.id">Uppdatera</a></td>
						<td><a class="btn btn-outline-danger"   role="button" v-bind:href="'<?php echo $_SERVER['PHP_SELF']. "?delete=" ?>' + student.id">Radera</a></td>
    				</tr>
    
 				</tbody>
			</table>
			
		</div>		
		
	</div>
	
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
<script src="app.js"></script>
</body>
</html>