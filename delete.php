<?php
/**** Supprimer une randonnée ****/

// Connect to database server
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
//*************************supprimer ************au clic

//recuperer l'id dans lequelle on veut supprimer
/*$document = new DOMDocument();
$document->load( 'read.php' );
$test = $document->getElementsByTagName("table");
;
foreach ($test as $found){
   $theID = $found->getAttribute('id');
    echo $theID;
}*/


$varid=$_GET['id'];
$requete = "DELETE FROM `hiking` WHERE id=$varid";
$response = $conn->prepare($requete);
$response->execute();




//$comp="select * from  hiking where id=1]";
//$requete = "DELETE * FROM hiking WHERE  id=$theID";
//$response = $conn->prepare($requete);
//$response->execute();


//***************
/*$recup="select * from hiking where id";
echo $recup['id'];
// The SQL statement that deletes the record
$strSQL = "DELETE FROM hiking WHERE id ";*/


