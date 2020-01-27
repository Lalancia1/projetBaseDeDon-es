

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

//************recuperer les informations du formulaire et les insérer dans la base données******


if (isset($_POST['submit'])) {
        global $conn;
        echo "j y suis";
        $recup1 = $_POST['name'];
        $recup2 = $_POST['difficulty'];
        $recup3 = $_POST['distance'];
        $recup4 = $_POST['duration'];
        $recup5 = $_POST['height_difference'];
        $recup6 = $_POST['available'];
        $query = "INSERT INTO hiking(name,difficulty,distance,duration,height_difference,available)VALUES('$recup1', '$recup2','$recup3','$recup4','$recup5')";
        $requete = $conn->prepare($query);
        echo 'ici <br>';
        if($requete->execute()){
            echo "<b  style='border:2px maroon solid; width:100px;height:60px'> NOTRE NOUVELLE RANDONNEE EST INSEREE</b>";
        }
    }else{
        echo "remplissez le formulaire";
    }
//***************securité:que les champs distances,duration height_difference sont uniquement des chiffres*****************
/*global $conn;
$requete = $conn->prepare($query);
$recup3 = $_POST['distance'];
$recup4 = $_POST['duration'];
$recup5 = $_POST['height_difference'];

if (isset($_POST['distance']) && (is_numeric($recup3))) {
    echo 'la distance de la randonnée est:' . "<br>" . $recup3;
} else {
    echo 'vous n avez pas bien rempli distance';
}

if (isset($_POST['duration']) && (is_numeric($recup4))) {
    echo 'la durée dela randonnée est:' . "<br>" . $recup4;
} else {
    echo 'vous n avez pas bien rempli duration';
}

if (isset($_POST['height_difference']) && (is_numeric($recup5))) {
    echo 'le dénivelé dela randonnée est:' . "<br>" . $recup5;
} else {
    echo 'vous n avez pas bien rempli height_difference';
}

if ($requete->execute()) {
    echo "c'est un chiffre";
} else {
    echo "ce n'est pas un chiffre";
}

*/
//*********************************************************************
$comp="select * from  hiking where name='salazie'";
$request= mysqli_query($conn,$comp);
while($ene=mysqli_fetch_assoc($request)) {
global $conn;

?>
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
<form action="" method="POST">
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" value="<?php echo $ene['name'] ?>">
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
        <input type="text" name="distance" value="<?php echo $ene['distance'] ?>">
    </div>
    <div>
        <label for="duration">Durée</label>
        <input type="duration" name="duration" value="<?php echo $ene['duration'] ?>">
    </div>
    <div>
        <label for="height_difference">Dénivelé</label>
        <input type="text" name="height_difference" value="<?php echo $ene['height_difference'] ?>">
    </div>
    <div>
        <label for="available">available</label>
        <input type="available" name="available" value="<?php echo $ene['available'] ?>">
    </div>
    <button type="submit" name="submit">Envoyer</button>
</form>
</body>
<?php
}
?>
</html>
