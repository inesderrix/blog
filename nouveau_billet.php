<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau Billet</title>
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
                <form action="index.php" method="get">
        <input type="submit" class="bouton"  value="Accueil">
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

        if (isset($_SESSION["login"])){ ?>

            <form action="deconnexion.php">
                <input class="bouton" type="submit" value="Déconnectez-vous">
            </form>
            

        
            <?php
}
    
if (isset($_SESSION["id"]) && $_SESSION["id"] == 1){
 
 ?>
 
<form action="nouveau_billet.php">
    <input type="submit" class="bouton" value="Créer un nouveau billet">
</form>
 <?php
}?>
           
      

<form action="mention.php" method="get">
        <input type="submit" class="bouton"  value="Mentions légales">
    </form>
    </nav>
</header>
<body>
    <main>
    <?php



$db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');

if (isset($_GET["titre"]) && isset($_GET["contenu"])){
    $requete ="INSERT INTO billets (titre, contenu, date) VALUES (:titre, :contenu, NOW())";
    $stmt =$db->prepare($requete);
    $stmt->bindValue(':titre', $_GET["titre"], PDO::PARAM_STR);
    $stmt->bindValue(':contenu', $_GET["contenu"], PDO::PARAM_STR);

    $stmt->execute();

header('Location: index.php');

}


?>
   <h1>
    <span>C</span><span>r</span><span>é</span><span>a</span><span>t</span><span>i</span><span>o</span><span>n</span> <span>d</span><span>'</span><span>u</span><span>n</span> <span>n</span><span>o</span><span>u</span><span>v</span><span>e</span><span>a</span><span>u</span> <span>b</span><span>i</span><span>l</span><span>l</span><span>e</span><span>t</span>
</h1>

<div class="form">
    <form action="nouveau_billet.php" method="GET">
        <label for="titre">Titre du billet :</label><br>
        <input type="text" id="titre" name="titre" required><br><br>

        <label for="contenu">Contenu du billet :</label><br>
        <textarea id="contenu" name="contenu" rows="20" cols="50" required></textarea><br><br>

        <input type="submit" class="btn" value="Créer le billet">
    </form>

    </div>
    </main>
</body>
</html>