<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="/php-pdo/read.php">Liste des données</a>
	<h1>Ajouter</h1>
	<form action="" method="post">
		<div>
			<label for="name">Name</label>

			<input type="text" name="name" value="">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="très facile">Très facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="très difficile">Très difficile</option>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration"  class='prerempli' name="duration" value="">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="">
		</div>
		<button type="button" name="button">Envoyer</button>
	</form>
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

    $query ='UPDATE hiking SET name="python" WHERE name="papp"';//j'ai remplacé  la randonnée papp par la randonnée python
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
 //**************************************
    $query ='UPDATE hiking SET name="mont cameroun" WHERE name="gkgkkg"';//j'ai remplacé  la randonnée papp par la randonnée python
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    //***********************************
    $query ='UPDATE hiking SET name="python de la fournaise" WHERE name="eieieiie"';//j'ai remplacé  la randonnée papp par la randonnée python
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
//*******faire que les champs soient préremplis********************************
    if(isset($_POST['name']) AND isset($_POST['difficulty']) AND isset($_POST['distance']) AND isset($_POST['duration']) AND isset($_POST['height_difference'] ))
    {
        echo "ça marche";
        $prt="Select python from hiking ";

        print "<input type='text' name='name' value='$prt'>";
    }
else {
    echo "rempli les champs";
}
    ?>
<!--**************************************sécurité***********-->
  <?php  global $conn;
    //$requete = $conn->prepare($query);


    $recup3 = $_POST['distance'];
    $recup4 = $_POST['duration'];
    $recup5 = $_POST['height_difference'];

    if (isset($_POST['distance'])&& (is_numeric( $recup3))) {
    echo 'la distance de la randonnée est:'."<br>". $recup3;
    } else{
    echo 'vous n avez pas bien rempli distance';
    }

    if(isset($_POST['duration'])&&(is_numeric( $recup4))){
    echo 'la durée dela randonnée est:'."<br>". $recup4;
    }else{
    echo 'vous n avez pas bien rempli duration';
    }

    if(isset($_POST['height_difference'])&&(is_numeric($recup5))){
    echo 'le dénivelé dela randonnée est:'."<br>".$recup5;
    }
    else{
    echo 'vous n avez pas bien rempli height_difference';
    }

    if($requete->execute()) {
    echo "c'est un chiffre";
    }else{
    echo "ce n'est pas un chiffre";
    }

?>
</body>
</html>
