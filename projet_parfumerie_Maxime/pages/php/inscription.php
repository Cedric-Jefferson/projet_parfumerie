<?php
?>
<!DOCTYPE html>
<html>
<head>
		<link type="text/css" href="../../styles/index.css" rel="stylesheet" />
        <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         <meta charset="utf-8" />
        <title>Comparfum</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css"> 
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/javascript.util/0.12.12/javascript.util.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<script src="javascript.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-primary d-flex bd-highlight">
		<div>
			<img src="logo_parfumerie.png" alt="logo_parfumerie" class="img-thumbnail" style="background-color: dodgerblue;" onclick="location.href='accueil.php'">
		</div>
		<div>
			<h1 style="margin:10px; color:white; font-size: 60px; font-family:Arial, Helvetica, sans-serif;">Comparfum</h1>
		</div>
		
		<button class="navbar-toggler" type="button"  data-target="#navbarText" aria-controls="navbarText" aria-expanded="true" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
			<div class="p-2 w-100 bd-highlight">
				<form class="form-inline" method="POST" action="recherche.php">
					<div class=" d-flex w-100">
						<input class="form-control mr-sm-2 w-100 p-3"  type="search" placeholder="Search" aria-label="Search" name="mot" >
						<button  class="btn btn-default" type="submit">
							<span class="glyphicon glyphicon-search"></span>
						</button>
					</div>
					
				</form>
			</div>
			
			<div class="p-2 flex-shrink-1 bd-highlight navbar-expand-lg">
				<ul class="navbar-nav ">
					<li class="nav-item" style="margin:10px;">
						<button type="button" class="btn btn-default" onclick="location.href='connexion.php'">
						<span class="glyphicon glyphicon-user"></span>
						</button>
					</li>
					<form class="form-inline" method="POST" action="panier.php">
					<li class="nav-item mr-sm-2 " style="margin:10px;">
						<button type="submit" class="btn btn-default btn float-right">
						<span class="glyphicon glyphicon-shopping-cart"></span>
						</button>
						
					</li>
					</form>
				</ul>
			</div>

	</nav>
<center>
<h2>Inscription</h2>

<form name="myform" action="../../scripts/php/verifinscription.php" method="post" onSubmit="return validateForm()">
  <div class=>Nom<br>
  <input type="text" name="nom_usr">
  <br>
  <br>
  Prénom<br>
  <input type="text" name="prenom_usr">
  <br>
  <br>
  Date de naissance<br>
  <input type="date" name="date_de_naissance">
  <br>
  <br>
  Mot de passe<br>
  <input type="password" name="password">
  <br>
  <br>
  Email<br>
  <input type="text" name="email">
  <br>
  <br>
  <input type="submit" value="Inscription">
</form> 

</div>
</center>
<script>
function validateForm() {
  var nom_usr = document.forms["myform"]["nom_usr"].value;
  var prenom_usr = document.forms["myform"]["prenom_usr"].value;
  var date_de_naissance = document.forms["myform"]["date_de_naissance"].value;
  var password = document.forms["myform"]["password"].value;
  var email = document.forms["myform"]["email"].value;
  if (nom_usr == "" || prenom_usr == "" || date_de_naissance == "" || password == "" || email == "") {
    alert("Certains champs ne sont pas remplis");
    return false;
  }
  alert("Bonjour");
} 
</script>

</body>
</html>