<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
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
    <span>C</span><span>o</span><span>n</span><span>n</span><span>e</span><span>x</span><span>i</span><span>o</span><span>n</span>
</h1>

    
<div class="form">
<?php 


if (isset($_SESSION["login"]))
{ 
echo "Bonjour {$_SESSION["login"]}"; 
}


?>

	<form action="traite_login.php" methode="GET">
		
		<label for="login">Login:</label>
        <input type="text" id="login" name="login" required> <br><br>
        

	<?php 
	if (isset($_GET["err"]) && $_GET["err"]=="login") { echo "<p style='color:red;'>ATTENTION MAUVAIS LOGIN</p>";}
	?>
		<label for="mdp">Mot de passe :</label>
        <input type="password"  id="mdp" name="mdp" required>
<?php 

if (isset($_GET["err"]) && $_GET["err"]=="mdp") { echo "<p style='color:red;'>ATTENTION MAUVAIS MOT DE PASSE</p>";}

?>
<br><br>

<button type="submit"  class="btn">Valider</button>

</form>
<br>
 <form action="inscription.php">
        
            <input type="submit" class="btn" value="Pas encore inscrit ? Inscrivez-vous ici">
        
    </form>

    </div>
</main>
</body>
</html>
