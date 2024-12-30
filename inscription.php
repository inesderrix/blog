<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anonymous+Pro:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
</head>
<header>
    <nav>
        
            <?php session_start();
          

        if (isset($_SESSION["login"])){ ?>
                <p>Bienvenue, <?= $_SESSION["login"]; ?> !</p> 
                 <?php }  ?><form action="index.php" method="get">
        <input type="submit" class="bouton"  value="Accueil">
    </form> <?php 
        if (isset($_SESSION["login"])){  ?>
            <form action="deconnexion.php">
                
                <input class="bouton" type="submit" value="Déconnectez-vous">
            </form>
        
            <?php } else {  ?>
                <form action="inscription.php">
                <input class="bouton" type="submit" value="Inscrivez-vous ici">
            </form>
            <form action="login.php">
                <input   class="bouton" type="submit" value="Connectez-vous ici">
            </form>
             <?php 

}

if (isset($_SESSION["id"]) && $_SESSION["id"] == 1){
 
 ?>
 
<form action="nouveau_billet.php">
    <input type="submit" class="bouton" value="Créer un nouveau billet">
</form>
           
       

        
        <?php } 
        

        if (isset($_SESSION["login"])){ ?>

            <form action="deconnexion.php">
                <input class="bouton" type="submit" value="Déconnectez-vous">
            </form>
            

        
            <?php
}
        ?>

<form action="mention.php" method="get">
        <input type="submit" class="bouton"  value="Mentions légales">
    </form>
    </nav>
</header>
<body>
    <main>

<h1>
    <span>I</span><span>n</span><span>s</span><span>c</span><span>r</span><span>i</span><span>p</span><span>t</span><span>i</span><span>o</span><span>n</span>
</h1>

    
    <div class="form">
   
    <form action="inscription.php" methode="GET">
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" required>

        <label for="mdp">Mot de passe :</label>
        <input type="password" id="mdp" name="mdp" required>
        <button type="submit"  class="btn">Valider</button>
    </form>
<br>
    <form action="login.php">
        
            <input type="submit"  class="btn" value="Déjà inscrit ? Connectez-vous ici">
        
    </form>


<?php


if (isset($_GET['login']) && isset($_GET['mdp'])){

$db=new PDO('mysql:host=localhost;dbname=blog;port=3306;charset=utf8', 'root', '');

$requete="SELECT * FROM utilisateurs WHERE login=:login";
$stmt=$db->prepare($requete);
$stmt->bindValue(':login',$_GET["login"], PDO::PARAM_STR);
$stmt->execute();


if ($utilisateur=$stmt->fetch(PDO::FETCH_ASSOC)){
header('Location:inscription.php?err=login');
}


else {
$requete= "INSERT INTO utilisateurs (id, login, mdp)VALUES (NULL, :lo, :mdp)";
$stmt= $db->prepare($requete);

$stmt->bindValue(':lo', $_GET["login"], PDO::PARAM_STR); 
$hash= password_hash($_GET["mdp"],PASSWORD_DEFAULT); 
$stmt->bindValue(':mdp', $hash, PDO::PARAM_STR); 

$stmt->execute();

$requete="SELECT * FROM utilisateurs WHERE login=:login";
$stmt=$db->prepare($requete);
$stmt->bindParam(':login',$_GET["login"], PDO::PARAM_STR);
$stmt->execute();
$utilisateur=$stmt->fetch(PDO::FETCH_ASSOC);



session_start();
	$_SESSION["login"]=$utilisateur["login"];
    $_SESSION["id"] = $utilisateur["id"];

header('Location: index.php');
}   
}



if (isset($_GET['err']) && $_GET['err'] == 'login') {
    echo "<p style='color:red;'>Ce login est déjà pris. Veuillez en choisir un autre.</p>";
}
?>


</div>
</main>
</body>
</html>