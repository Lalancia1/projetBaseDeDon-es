<?php
$servername="localhost";
$username="root";
$password='';
$dbname="reunion_island";
$mysqli = new mysqli("localhost", "$username", "$password", "$dbname");
$conn =new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error){
echo "faute";
die("connect failed:".$conn->connect_error);
}
else{
$conn->select_db($dbname);
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <h1>Liste des randonnées</h1>

  </body>
</html>
<!--ma liste de radonnées a générer je commence par installer ma balise<table>,avant de faire la requête à mysqli pour
générer une  tableau associatif avec le while de la connection ,et ensuite <td> -->
<table  border="1">
    <tr>
<?php
$generer='select * from hiking';
$request= mysqli_query($conn,$generer);
while($tableau=mysqli_fetch_assoc($request)) {
    global $conn;
$NbrLigne = 5;
?>
            <td ><?= $tableau['name'] ?></td>
            <td><button id="<?= $tableau['id']  ?>"><a href="delete.php?id=<?= $tableau['id'] ?>" name="send">supprimer</a></button></td>
<?php } ?>
        </tr><br>
    </table>
<!--je dois inserer une autre colonne dans la table hiking-->
<!--INSERT INTO nom_de_table (nom_colonne1, nom_colonne2, …) VALUES ('valeur 1', 'valeur 2', …).-->

<?php



?>
