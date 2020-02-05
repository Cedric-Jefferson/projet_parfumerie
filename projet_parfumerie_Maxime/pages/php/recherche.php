<?php
include_once("../../scripts/php/cookie.php"); 
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
   
<div><button  class="btn btn-primary" type="submit" onClick="location.href='accueil.php'">
							<span class="glyphicon glyphicon-chevron-left"><center>retour</center></span>
						</button></div>
<center>
<h2>Rechercher un produit</h2>
<br>
<br>


<form name="myform" action="recherche.php" method="post">
  <select name="critere">
    <option value="nom_produit">Par nom</option>
    <option value="type">Par type</option>
    <option value="volume">Par volume</option>
    <option value="id-fournisseur">Par id_fournisseur</option>
    <option value="qtestock">Par quantité</option>
    <option value="genre">Par genre</option>
  </select><br>
  <br>
  <input type="text" id="myInput" name="search" onKeyUp="myFunction()" placeholder="Search.." title="Type in a name">
  <button type="button" class="btn btn-primary">Rechercher</button>
</form>


<?php
/*if (isset($_POST['critere'])) {
          echo '<form name="myform" action="recherche.php" method="post">
                  <input type="text" id="myInput" name="search" onkeyup="myFunction()" placeholder="Search.." title="Type in a name">
                  <input type="hidden" id="crit" name="crit" value="'.$_POST["critere"].'">
                </form>';
}*/




if (isset($_POST['search']) AND isset($_POST['critere'])) {
    //Récupération depuis le formulaire des variables à traiter et stocker dans la base données

    $bdd=null;
    $dsn = 'mysql:dbname=parfumerie;host=127.0.0.1';
    $user = 'root';
    $password = '';
    $delai = 0;
    $urli = 'recherche.php?user='.$_SESSION['nom_usr'].'&session='.$_SESSION['id_session'];
    $urlq = 'recherche.php';
	
    try{
        $bdd=new PDO($dsn,$user,$password);
        $search = $_POST['search'];
        $critere = $_POST['critere'];
        //$req0 = $bdd->query('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = "users" ');
        $req = $bdd->query("SELECT * FROM produit WHERE $critere LIKE '%$search%'");
      
		/*$Quer ="SELECT * FROM produit WHERE $critere LIKE '%$search%'";
        $Resultatrech = $Connect->query($Quer);*/
		
	  
	  ?>
          <table id="myTable">
            <tr class="header">
            <th>id_produit</th>
              <th>nom_produit</th>
			   <th>image</th>
              <th>type</th>
              <th>volume</th>
              <th>id_fournisseur</th>
              <th>description</th>
              <th>Quantié stock</th>
             
              <th>genre</th>
            </tr>
            <?php
			//$data = $req->fetch()
			//$data = mysqli_fetch_array($req)
            while ($data = $req->fetch()){
			//while ($data = mysqli_fetch_array($Resultatrech)){
            
            ?>
                <tr>
                <td><?php echo $data["id_produit"]; ?></td>
                  <td><?php echo $data["nom_produit"]; ?></td>
				  <td><img class="image" src="../../<?php echo $data["image"]; ?>" style="width:30%"></td>
                  <td><?php echo $data["type"]; ?></td>
                  <td><?php echo $data["volume"]; ?></td>
                  <td><?php echo $data["id_fournisseur"]; ?></td>
                  <td><?php echo $data["description"]; ?></td>
                  <td><?php echo $data["qtestock"]; ?></td>
                  <td><?php echo $data["Genre"]; ?></td>
                </tr>
            <?php
            }
            ?>
          </table>
<?php           
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
}


?> 
</center>
</html>

<script>
/*function validateForm() {
  var nom_produit = document.forms["myform"]["search"].value;
  if (nom_produit == "") {
    alert("Le nom du produit n'est pas rempli");
    return false;
  }
  alert("Bonjour");
} */
</script>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

</body>
</html>