<?php 
session_start();

require('db_connect.php');

if(isset($_GET['action'])){
	
	$action = $_GET['action'];
	


//om inte inloggad
if($action == "nosession"){
	
	$output="Var snäll och logga in";
	
}
if($action=="logout"){
	
	$output="Tack för besöket";
	unset($_SESSION['user']);
}


}
if(isset($_POST) && !empty($_POST)){
	
	$sql="SELECT * FROM users WHERE UserName=:user_email AND Password=:user_password LIMIT 1";
	
	$row= [
	
	':user_email' => $_POST['username'],
	':user_password' => md5($_POST["password"])	
	];
	
	$res=$conn->prepare($sql);
	$res->execute($row);
	if($res->fetchColumn() <1){
		
		$output="fel användarnamn eller lösenord";
		
	}else{
		
		//$output="rätt användarnamn och lösenord";
		
		$_SESSION['user']=1;
		
		header("location: ../produkt-sida/index.php");
		
	}
}

//echo $output;
?>

<!doctype html>
<html>
	<head>
	<title>Fruit-Stop</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
	<style>
		
		.jumb{
			
			margin-left: 37%;
			width: 500px;
			margin-top: 150px;
			
		}
		label{
			
			margin-right: 110px;
			margin-left: 20px;
			
		}
		
		input{
			
			margin-right: 40px;
			margin-left: 20px;
		}
		
		button{
			
			margin-left: 370px
			
		}
		
		p{
			
			float: right;
			
		}
		
		.form-control{
			
			width: 200px;
			
		}
		
		
	</style>
		
</head>


	<body>
		
	<div class="jumb">
		<div class="jumbotron jumbotron-fluid">
			<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
				<?php if (isset($output)){echo "<h3 class='alert alert-warning'>".$output."</h3>";} ?>	
				<h2>Inlogning</h2>
				<div class="row">
					<div class="col col-md-6">
				<label for="username">Användarnamn</label>				
				<input class="form-control" type="text" name="username" id="username" maxlength="12" minlength="2" required>
				</div>
					
					<div class="col col-md-6">
				<label for="password">Lösenord</label><br>
				<input class="form-control" type="password" name="password" id="password" minlength="6" maxlength="22" required>
				</div>
				</div>
				<hr class="my-4">	
	    		<button class="btn btn-primary btn-lg"  role="button" type="submit">Logga in</button>
				<p>Fruit-Stop</p>
			</form>
		</div>
	</div>
	</body>

</html>