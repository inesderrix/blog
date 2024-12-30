<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    
<?php
session_start();

$db=new PDO('mysql:host=localhost;dbname=blog;port=3306;charset=utf8', 'root', '');
$db->query('SET NAMES utf8');


if (isset($_GET["login"]) && isset($_GET["mdp"])){

$requete="SELECT * FROM utilisateurs WHERE login=:login";
$stmt=$db->prepare($requete);
$stmt->bindParam(':login',$_GET["login"], PDO::PARAM_STR);
$stmt->execute();




if ($utilisateur=$stmt->fetch(PDO::FETCH_ASSOC)){
	 if (password_verify($_GET["mdp"], $utilisateur["mdp"])){
	

	$_SESSION["login"]=$utilisateur["login"];
    $_SESSION["id"] = $utilisateur["id"];
	header('Location: index.php');
	} 
	else {
            header('Location: login.php?err=mdp');
        }
    } 
else {

    header('Location: login.php?err=login');
}

}



?>



</body>
</html>