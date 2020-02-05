<?php
    include("pages/php/fonctions.php"); 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans nom</title>
</head>

<body> 
	<nav class="navbar navbar-expand-lg navbar-light bg-primary d-flex bd-highlight">
		<div>
			<img src="assets/logo_parfumerie.png" alt="logo_parfumerie" class="img-thumbnail" style="background-color: dodgerblue;">
		</div>
		<div>
			<h1 style="margin:10px; color:white; font-size: 60px; font-family:Arial, Helvetica, sans-serif;">Comparfum</h1>
		</div>
				
		<button class="navbar-toggler" type="button"  data-target="#navbarText" aria-controls="navbarText" aria-expanded="true" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="p-2 w-100 bd-highlight">
			<form class="form-inline">
				<input class="form-control mr-sm-2 w-100 p-3"  type="search" placeholder="Search" aria-label="Search" >
			</form>
		</div>
				
		<div class="p-2 flex-shrink-1 bd-highlight navbar-expand-xs">
			<ul class="navbar-nav ">
				<li class="nav-item" style="margin:10px;">
					<button type="button" class="btn btn-default">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</li>
				<li class="nav-item" style="margin:10px;">
					<button type="button" class="btn btn-default">
						<span class="glyphicon glyphicon-user"></span>
					</button>
				</li>
				<li class="nav-item mr-sm-2 " style="margin:10px;">
					<button type="button" class="btn btn-default btn float-right">
						<span class="glyphicon glyphicon-shopping-cart"></span>
					</button>
				</li>
			</ul>
		</div>				
	</nav>

<div class="row">
  <div class="col-xs-6 col-sm-3">
	<div style="background-color:rgb(204, 204, 206);">
		<h6 style="margin-top:20px;">Affiner par mots clés</h6>
		<nav class="navbar navbar-light bg-light">
			<form class="form-inline">
			  <div class="input-group">
				<div class="input-group-prepend">
				  <span class="input-group-text" id="basic-addon1">
					<button type="button" class="btn btn-default">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				  </span>
				</div>
				<input type="text" class="form-control" placeholder="Dolce & Gabbana" aria-label="Dolce & Gabbana" aria-describedby="basic-addon1">
			  </div>
			</form>
		  </nav>
		  </br>
		  <h6>Affiner par marque</h6>
		  <div style="margin-left:20px;">
			<div class="form-check">
					<input type="checkbox" class="form-check-input" id="exampleCheck1">
					<label class="form-check-label" for="exampleCheck1">Guerlain</label>
				</div>
				<div class="form-check">
					<input type="checkbox" class="form-check-input" id="exampleCheck2">
					<label class="form-check-label" for="exampleCheck1">Calvin Klein</label>
				</div>
				<div class="form-check">
					<input type="checkbox" class="form-check-input" id="exampleCheck3">
					<label class="form-check-label" for="exampleCheck1">Chanel</label>
				</div>
				<div class="form-check">
					<input type="checkbox" class="form-check-input" id="exampleCheck4">
					<label class="form-check-label" for="exampleCheck1">Dolce & Gabbana</label>
				</div>
				<div class="form-check">
					<input type="checkbox" class="form-check-input" id="exampleCheck5">
					<label class="form-check-label" for="exampleCheck1">Thierry Mugler</label>
				</div>
			</div>
			</br>
		  <h6>Affiner par prix</h6>
		  <form>
			<div class="form-group">
			  <div>0€ 1000€</div>
			  <input type="range" class="form-control-range" id="formControlRange">
			</div>
		  </form>
		  <h6>Affiner par type</h6>
		  <div style="margin-left:20px;">
			<div class="form-check">
					<input type="checkbox" class="form-check-input" id="Coffret">
					<label class="form-check-label" for="exampleCheck1">Coffret</label>
				</div>
				<div class="form-check">
					<input type="checkbox" class="form-check-input" id="eauParfum">
					<label class="form-check-label" for="exampleCheck1">Eau de parfum</label>
				</div>
				<div class="form-check">
					<input type="checkbox" class="form-check-input" id="eauCologne">
					<label class="form-check-label" for="exampleCheck1">Eau de cologne</label>
				</div>
				<div class="form-check">
					<input type="checkbox" class="form-check-input" id="eauToilette">
					<label class="form-check-label" for="exampleCheck1">Eau de toilette</label>
				</div>
				<div class="form-check">
					<input type="checkbox" class="form-check-input" id="exampleCheck5">
					<label class="form-check-label" for="exampleCheck1">Thierry Mugler</label>
				</div>
			</div>
			</br>
			<h6>Affiner par genre</h6>
		  <div style="margin-left:20px;">
			<div class="form-check">
					<input type="checkbox" class="form-check-input" id="Homme">
					<label class="form-check-label" for="exampleCheck1">Homme</label>
			</div>
			<div class="form-check">
					<input type="checkbox" class="form-check-input" id="Femme">
					<label class="form-check-label" for="exampleCheck1">Femme</label>
			</div>
		</div>
		</br>
	</div>
  </div>
  <div class="col-md-9 col-sm-3">
	  	<div style="margin-top: 20px;">
			<div class="container">
				<div class="row">
					<div class="col-3">
						<img src="index.jpg" class="d-block w-100 h-100">
					</div>
					<div class="col-7">
						<h4> Nom parfum 1</h4>
						<li style="margin-left:40px"><b>Marque : </b>Dolce & Gabbana</li>
						<li style="margin-left:40px"><b>Type : </b>Eau de toilette</li>
						<li style="margin-left:40px"><b>Capacité : </b>100ml</li>      
					</div>
					<div class="col-2">
						2 of 3
					</div>
				</div>
				<div class="row">
					<div class="col-3">
						<img src="index1.jpg" class="d-block w-100 h-100">
					</div>
					<div class="col-7">
						<h4> Nom parfum 2</h4>
						<li style="margin-left:40px"><b>Marque : </b>Dolce & Gabbana</li>
						<li style="margin-left:40px"><b>Type : </b>Eau de toilette</li>
						<li style="margin-left:40px"><b>Capacité : </b>100ml</li>    
					</div>
					<div class="col-2">
						2 of 3
					</div>
				</div>
				<div class="row">
					<div class="col-3">
						<img src="index.jpg" class="d-block w-100 h-100">
					</div>
					<div class="col-7">
						<h4> Nom parfum 3</h4>
						<li style="margin-left:40px"><b>Marque : </b>Dolce & Gabbana</li>
						<li style="margin-left:40px"><b>Type : </b>Eau de toilette</li>
						<li style="margin-left:40px"><b>Capacité : </b>100ml</li>    
					</div>
					<div class="col-2">
						2 of 3
					</div>
				</div>
			</div>
		</div>
  	</div>  
</div>

    </body>
    <script src = "scripts/js/index.js"></script>
</html>