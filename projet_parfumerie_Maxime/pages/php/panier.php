<?php
include_once('../../scripts/php/cookie.php'); 
?>
<!DOCTYPE html>
<html>
    <head>
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
  
		
 <?php
	include("Login.php");
	$Connect = mysqli_connect($Server, $User, $Pwd, $DB);
	
    try{
      
		$Quer ="SELECT * FROM commande natural join produit WHERE num_adherent=$_SESSION[num_adherent]";
        $Resultatrech = $Connect->query($Quer);
		while ($row = mysqli_fetch_array($Resultatrech)){
          if($row['qtestock'] > 0){
			echo '<div class="col-xs-10 col-sm-2">
					</div>
				<div class="col-md-9 col-sm-2">
				<div style="margin-top: 20px;">
					<div class="container">
						<div class="row">
							
								<div class="col-3">
									<img src="',$row['image'],'" class="d-block w-100 h-100">
								</div>

								<div class="col-5">
									<h1> <span name="nom_produit"><b>',$row['nom_produit'],'</b></span></h1>
									<li style="margin-left:40px; font-size: 25px;"><b>Marque : </b>',$row['nom_fournisseur'],'</li>
									<li style="margin-left:40px; font-size: 25px;" ><b>Type :</b>',$row['type'],' </li>
									<li style="margin-left:40px; font-size: 25px;"><b>Capacité :</b>',$row['volume'],' ml </li>      
								</div>
								<div class="col-2">
									<table class="table">
										<thead>
										<tr>
											<th scope="col"><h2>Quantité commandé</h2></th>
										</tr>
										</thead>
										<tbody class="d-flex justify-content-center">
										<tr>
											<th scope="row" name="quantite"> <h4>',$row['quantite'],' </h4> </th>
										</tr>
										</tbody>
									</table>
								</div>
								<div class="col-2">
									<table class="table">
									  <thead>
										<tr>
										  <th scope="col"><h2>Prix</h2></th>
										</tr>
									  </thead>
									  <tbody>
										
									  </tbody>
									</table>
									
								</div>
							
						</div>
						
					</div>
				</div>
				</div>			'; 
			}
		}         
        /*$data = $req->fetchAll();
        $nb_data = count($data);
        if($nb_data < 0){
          header("Refresh:$delai;url=$urli");
        }else{
          header("Refresh:$delai;url=$urlq");
        }*/
    }catch(EXCEPTION $e){
        die("erreur de connection a pdo".$e->getMessage());
    }
	
		//include("Login.php");
		//$Connect = mysqli_connect($Server, $User, $Pwd, $DB);
		if( isset( $_POST['panier']) ){
			$Produit = $_POST['nom_produit'];
			$Query ="UPDATE produit SET  qtestock = '$_POST[stock]'-1 WHERE nom_produit = '$Produit' ";
			//$Quer =" produit SET  qtestock = '$_POST[stock]'-1 WHERE nom_produit = '$Produit' ";

       		$Resultatrech = $Connect->query($Query);
		}
		$Quer ="SELECT  qtestock, nom_produit, image, nom_fournisseur,type,volume, prixVente, quantite FROM produit NATURAL JOIN fournisseur NATURAL JOIN prix natural join commande; ";
        $Resultatrech = $Connect->query($Quer);
		while ($row = mysqli_fetch_array($Resultatrech)){
			if($row['qtestock'] > 0){
			echo '<div class="col-xs-10 col-sm-2">
					</div>
				<div class="col-md-9 col-sm-2">
				<div style="margin-top: 20px;">
					<div class="container">
						<div class="row">
							
								<div class="col-3">
									<img src="',$row['image'],'" class="d-block w-100 h-100">
								</div>

								<div class="col-5">
									<h1> <span name="nom_produit"><b>',$row['nom_produit'],'</b></span></h1>
									<li style="margin-left:40px; font-size: 25px;"><b>Marque : </b>',$row['nom_fournisseur'],'</li>
									<li style="margin-left:40px; font-size: 25px;" ><b>Type :</b>',$row['type'],' </li>
									<li style="margin-left:40px; font-size: 25px;"><b>Capacité :</b>',$row['volume'],' ml </li>      
								</div>
								<div class="col-2">
									<table class="table">
										<thead>
										<tr>
											<th scope="col"><h2>Quantité</h2></th>
										</tr>
										</thead>
										<tbody class="d-flex justify-content-center">
										<tr>
											<th scope="row" name="prix"> <h4>',$row['quantite'],' </h4> </th>
										</tr>
										</tbody>
									</table>
								</div>
								<div class="col-2">
									<table class="table">
									  <thead>
										<tr>
										  <th scope="col"><h2>Prix</h2></th>
										</tr>
									  </thead>
									  <tbody>
										<tr>
											<th scope="row" name="prix"> <h4>',$row['prixVente']*$row['quantite'],'  €</h4> </th>
										</tr>
									  </tbody>
									</table>
									
								</div>
							
						</div>
						
					</div>
				</div>
				</div>			'; 
			}
		
		}
	
		?>
</div>
	</body>
</html>