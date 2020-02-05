<?php
include_once('../../scripts/php/cookie.php'); 
include_once('entete.php');
?>
<!DOCTYPE html>
<html>
<head>
	<link type="text/css" href="../../styles/index.css" rel="stylesheet" />
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<center>

<h2>Page admin</h2>
<br/>

<h3>Gestion des produits</h3>
</center>
<a href="admin.php">Retour</a>

<form name="myform5">
  <input type="text" id="myInput" onKeyUp="myFunction()" placeholder="Search for names.." title="Type in a name">
</form>
<br>

<?php

    $bdd=null;
    $dsn = 'mysql:dbname=parfurmerie;host=127.0.0.1';
    $user = 'root';
    $password = '';
    $delai = 0;
    $urli = 'admin_produits.php?user='.$_SESSION['nom_usr'].'&session='.$_SESSION['id_session'];
    $urlq = 'admin_produits.php';

    try{
        $bdd=new PDO($dsn,$user,$password);

        //$req0 = $bdd->query('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = "produits" ');
        $req = $bdd->query("SELECT * FROM produits");
?>
          <table id="myTable">
            <tr class="header">
              <th>id_produit</th>
              <th>nom_produit</th>
              <th>type</th>
              <th>volume</th>
              <th>id_fournisseur</th>
              <th>description</th>
              <th>qtestock</th>
              <th>image</th>
              <th>genre</th>
              <th>
                <form name="myform7" action="admin_produits.php" method="post">
                      <input type="submit" id="ajout_id" name="ajout_produit" value="Ajouter">
                </form>
              </th>
            </tr>
            <?php
            while ($data = $req->fetch())
            {
            ?>
                <tr id="table_produits">
                  <td><?php echo $data["id_produit"]; ?></td>
                  <td><?php echo $data["nom_produit"]; ?></td>
                  <td><?php echo $data["type"]; ?></td>
                  <td><?php echo $data["volume"]; ?></td>
                  <td><?php echo $data["id_fournisseur"]; ?></td>
                  <td><?php echo $data["description"]; ?></td>
                  <td><?php echo $data["qtestock"]; ?></td>
                  <td><img class="image" src="../../<?php echo $data["image"]; ?>" style="width:30%"></td>
                  <td><?php echo $data["genre"]; ?></td>
                  <td>
                    <form name="myform6" action="admin_produits.php" method="post">
                      <input type="submit" id="supp_id" name="supp2" value="Supprimer">
                      <input type="hidden" id="produit_id" name="supp_produit" value="<?php echo $data["id_produit"]; ?>">
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
          
          <?php
        if (isset($_POST['supp_produit']) AND isset($_POST['supp2'])) {

          $bdd2=null;
          $dsn = 'mysql:dbname=parfurmerie;host=127.0.0.1';
          $user = 'root';
          $password = '';
          $delai = 0;
          $urli = 'admin_produits.php?user='.$_SESSION['nom_usr'].'&session='.$_SESSION['id_session'];
          $urlq = 'admin_produits.php';

            //header('Location:"'.$urlq.'"');
            try{
              $id_produit = $_POST['supp_produit'];

              $bdd2=new PDO($dsn,$user,$password);
              $req2 = $bdd2->query('DELETE FROM produits WHERE id_produit = '.$id_produit.' ');
              while ($data2 = $req2->fetch())
              {
                  echo "<script>alert('Produit supprimé');</script>";
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

        if (isset($_POST['ajout_produit'])) {
          echo '<div class="ajout_produit">
          <h2>Ajouter un produit</h2>
          
          <form name="myform8" action="admin_produits.php" method="post" onsubmit="return validateForm()">
            Nom du produit:<br>
            <input type="text" name="nom_produit">
            <br>
            Type de produit :<br>
            <select name="type">
              <option value="Eau de parfum">Eau de parfum</option>
              <option value="Eau de toilette">Eau de toilette</option>
              <option value="Déodorant">Déodorant</option>
              <option value="Parfum">Parfum</option>
              <option value="Bodyspray">Bodyspray</option>
            </select>
            <br>
            Description:<br>
            <input type="text" name="description" placeholder="Donnez une description brève du produit...">
            <br>
            Volume:<br>
            <input type="number" name="volume">
            <br>
            Fournisseur:<br>
            <input type="number" name="id_fournisseur">
            <br>
            Quantité en stock:<br>
            <input type="number" name="qtestock">
            <br>
            Genre:<br>
            <select name="genre">
              <option value="Homme">Homme</option>
              <option value="Femme">Femme</option>
              <option value="Tous">Tous</option>
              <option value="Enfants">Enfants</option>
            </select>
            <br>
            Chemin vers une image du produit (ex: assets/assassins_creed_odyssey.jpg):<br>
            <input type="text" name="image">
            <br>
            <input type="submit" value="Submit">
            <a href="#table_produits">Annuler</a>
          </form>
          </div>';
        }

        if (isset($_POST["nom_produit"]) AND isset($_POST["type"]) AND isset($_POST["description"]) AND isset($_POST["volume"]) AND isset($_POST["id_fournisseur"]) AND isset($_POST["qtestock"]) AND isset($_POST["image"]) AND isset($_POST["genre"])) {
          //Récupération depuis le formulaire des variables à traiter et stocker dans la base données
          echo '<script>alert("Test")</script>';
      
          $bdd2=null;
          $dsn = 'mysql:dbname=parfurmerie;host=127.0.0.1';
          $user = 'root';
          $password = '';
          $delai = 0;
          $urli = 'admin_produits.php?user='.$_SESSION['nom_usr'].'&session='.$_SESSION['id_session'];
          $urlq = 'admin_produits.php';
      
          try{

              $bdd2=new PDO($dsn,$user,$password);
              $bdd2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $req = $bdd2->prepare('INSERT INTO produits (nom_produit, type, volume, id_fournisseur, description, qtestock, image, genre) 
              VALUES (:nom_produit, :type, :volume, :id_fournisseur, :description, :qtestock, :image, :genre)');
              $req->bindParam(':nom_produit', $nom_produit);
              $req->bindParam(':type', $type);
              $req->bindParam(':volume', $volume);
              $req->bindParam(':id_fournisseur', $id_fournisseur);
              $req->bindParam(':description', $description);
              $req->bindParam(':qtestock', $qtestock);
              $req->bindParam(':image', $image);
              $req->bindParam(':genre', $genre);

              $nom_produit = $_POST["nom_produit"];
              $type = $_POST["type"];
              $volume = $_POST["volume"];
              $id_fournisseur = $_POST["id_fournisseur"];
              $description = $_POST["description"];
              $qtestock = $_POST["qtestock"];
              $image = $_POST["image"];
              $genre = $_POST["genre"];

              $req->execute();

              echo '<script>alert("produit enregistré")</script>';

              header("Refresh:$delai;url=$urlq");
          }catch(EXCEPTION $e){
              die("erreur de connection a pdo".$e->getMessage());
          }
      }

?>


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