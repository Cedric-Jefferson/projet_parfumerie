<?php
include_once('../../scripts/php/cookie.php'); 
?>
<!DOCTYPE html>
<html>
<head>
		<link type="text/css" href="../../styles/index.css" rel="stylesheet" />
        <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
						<button type="button" class="btn btn-default" onClick="location.href='inscription.php'">
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

<h2>Page admin</h2>
<br/>


<h3>Gestion des utilisateurs</h3>

<a href="admin.php">Retour</a>
</center>
<form name="myform">
  <input type="text" id="myInput" onKeyUp="myFunction()" placeholder="Search for names.." title="Type in a name">
</form>
<br>

<?php

    $bdd=null;
    $dsn = 'mysql:dbname=parfurmerie;host=127.0.0.1';
    $user = 'root';
    $password = '';
    $delai = 0;
    $urli = 'admin_users.php?user='.$_SESSION['nom_usr'].'&session='.$_SESSION['id_session'];
    $urlq = 'admin_users.php';

    try{
        $bdd=new PDO($dsn,$user,$password);

        //$req0 = $bdd->query('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = "users" ');
        $req = $bdd->query("SELECT * FROM Users");
?>
          <table id="myTable">
            <tr class="header">
              <th>id_user</th>
              <th>nom_user</th>
              <th>prenom_user</th>
              <th>num_adherent</th>
              <th>password</th>
              <th>date_de_naissance</th>
              <th>email</th>
              <th>id_usr_forum</th>
              <th>id_session</th>
              <th>
                <form name="myform3" action="admin_users.php" method="post">
                      <input type="submit" id="ajout_id" name="ajout_user" value="Ajouter">
                </form>
              </th>
            </tr>
            <?php
            while ($data = $req->fetch())
            {
            ?>
                <tr>
                  <td><?php echo $data["id_usr"]; ?></td>
                  <td><?php echo $data["nom_usr"]; ?></td>
                  <td><?php echo $data["prenom_usr"]; ?></td>
                  <td><?php echo $data["num_adherent"]; ?></td>
                  <td><?php echo $data["password"]; ?></td>
                  <td><?php echo $data["date_de_naissance"]; ?></td>
                  <td><?php echo $data["email"]; ?></td>
                  <td><?php echo $data["id_usr_forum"]; ?></td>
                  <td><?php echo $data["id_session"]; ?></td>
                  <td>
                    <form name="myform2" action="admin_users.php" method="post">
                      <input type="submit" id="supp_id" name="supp1" value="Supprimer">
                      <input type="hidden" id="user_id" name="supp_user" value="<?php echo $data["id_usr"]; ?>">
                    </form>
                  </td>
                </tr>
            <?php
            }
    }catch(EXCEPTION $e){
      die("erreur de connection a pdo".$e->getMessage());
    }
            ?>
          </table>
          <br>
<?php
        if (isset($_POST['supp_user']) AND isset($_POST['supp1'])) {

          $bdd2=null;
          $dsn = 'mysql:dbname=parfurmerie;host=127.0.0.1';
          $user = 'root';
          $password = '';
          $delai = 0;
          $urli = 'admin_users.php?user='.$_SESSION['nom_usr'].'&session='.$_SESSION['id_session'];
          $urlq = 'admin_users.php';

            //header('Location:"'.$urlq.'"');
            try{
              $id_usr = $_POST['supp_user'];

              $bdd2=new PDO($dsn,$user,$password);
              $req2 = $bdd2->query('DELETE FROM users WHERE id_usr = '.$id_usr.' ');
              while ($data2 = $req2->fetch())
              {
                  echo "<script>alert('User supprimé');</script>";
              }
              /*$data2 = $req2->fetchAll();
              $nb_data2 = count($data2);
              if($nb_data2 < 0){
                header("Refresh:$delai;url=$urli");
              }else{*/
                //header("Refresh:$delai;url=$urlq");
              //}
            }catch(EXCEPTION $e){
              die("erreur de connection a pdo".$e->getMessage());
            }
        }

        if (isset($_POST['ajout_user'])) {
          echo '<div class="ajout_user">
          <h2>Ajouter un utilisateur</h2>
          
          <form name="myform4" action="admin_users.php" method="post" onsubmit="return validateForm()">
            Nom:<br>
            <input type="text" name="nom_usr">
            <br>
            Prénom:<br>
            <input type="text" name="prenom_usr">
            <br>
            Date de naissance:<br>
            <input type="date" name="date_de_naissance">
            <br>
            Mot de passe:<br>
            <input type="password" name="password">
            <br>
            Email:<br>
            <input type="text" name="email">
            <br>
            <input type="submit" value="Submit">
          </form>
          </div>';
        }

        if (isset($_POST["nom_usr"]) && isset($_POST["prenom_usr"]) && isset($_POST["date_de_naissance"]) && isset($_POST["password"]) && isset($_POST["email"])) {
          //Récupération depuis le formulaire des variables à traiter et stocker dans la base données
          $nom_usr = $_POST["nom_usr"];
          $prenom_usr = $_POST["prenom_usr"];
          $date_de_naissance = $_POST["date_de_naissance"];
          $password =  $_POST["password"];
          $email =  $_POST["email"];
          $num_adherent = intval(genere_prefixe_aleatoire(6), 10);
          $id_usr_forum = intval(genere_prefixe_aleatoire(6), 10);
          $id_session = intval(genere_prefixe_aleatoire(6), 10);
      
      
          $bdd2=null;
          $dsn = 'mysql:dbname=parfurmerie;host=127.0.0.1';
          $user = 'root';
          $password = '';
          $delai = 0;
          $urli = 'admin_users.php?user='.$_SESSION['nom_usr'].'&session='.$_SESSION['id_session'];
          $urlq = 'admin_users.php';
      
          try{
              $bdd2=new PDO($dsn,$user,$password);
              $req = $bdd2->prepare('INSERT INTO Users (nom_usr, prenom_usr, num_adherent, password, date_de_naissance, email, id_usr_forum, id_session) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
              $req->execute(array($nom_usr, $prenom_usr, $num_adherent, $password, $date_de_naissance, $email, $id_usr_forum, $id_session));
              echo '<script>alert("Utilisateur enregistré")</script>';
              header("Refresh:$delai;url=$urlq");
          }catch(EXCEPTION $e){
              die("erreur de connection a pdo".$e->getMessage());
          }
      }

?>

<br>
<br>
<br>

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