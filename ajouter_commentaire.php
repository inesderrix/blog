<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <input type="submit" class="bouton" value="Nouveau billet">
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
    
<?php


if (isset($_GET['billet_id']) && isset($_GET['commentaire'])) {
    if (isset($_SESSION['login'])) {

         if (isset($_GET['billet_id']) && isset($_GET['commentaire'])) {
        $billet_id = $_GET['billet_id'];
        $commentaire = $_GET['commentaire'];
        $auteur_id = $_SESSION['id'];
        $date = date('Y-m-d H:i:s');

$db=new PDO('mysql:host=localhost;dbname=blog;port=3306;charset=utf8', 'root', '');
 $requete = "INSERT INTO commentaires (commentaire, auteur_id, billet_id, date) VALUES (:commentaire, :auteur_id, :billet_id, :date)";
        $stmt = $db->prepare($requete);
        $stmt->bindValue(':commentaire', $commentaire, PDO::PARAM_STR);
        $stmt->bindValue(':auteur_id', $auteur_id, PDO::PARAM_INT);
        $stmt->bindValue(':billet_id', $billet_id, PDO::PARAM_INT);
        $stmt->bindValue(':date', $date);
        $stmt->execute();

         header('Location: index.php');
    }}}
?>

  <h1>
        <span>A</span><span>j</span><span>o</span><span>u</span><span>t</span><span>e</span><span>r</span>
        <span> </span>
        <span>u</span><span>n</span>
        <span> </span>
        <span>c</span><span>o</span><span>m</span><span>m</span><span>e</span><span>n</span><span>t</span><span>a</span><span>i</span><span>r</span><span>e</span>
    </h1>
    <div class="form">
        <form action="ajouter_commentaire.php" method="GET">
            <input type="hidden" name="billet_id" value="<?= $_GET['billet_id'] ?>">
            <label for="commentaire">Votre commentaire :</label><br>
            <textarea id="commentaire" name="commentaire" rows="5" required></textarea><br><br>

            <input type="submit" class="btn" value="Ajouter le commentaire">
        </form>
    </div>
    </main>
</body>
</html>

