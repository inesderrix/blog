<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
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
  <?php    }      
if (isset($_SESSION["id"]) && $_SESSION["id"] == 1){
 
 ?>
 
<form action="nouveau_billet.php">
    <input type="submit" class="bouton" value="Créer un nouveau billet">
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
    <span>M</span><span>o</span><span>d</span><span>i</span><span>f</span><span>i</span><span>e</span><span>r</span> <span>l</span><span>e</span> <span>b</span><span>i</span><span>l</span><span>l</span><span>e</span><span>t</span>
</h1>


<div class="form">
<?php


$db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');


if (isset($_GET['id_billet']) && isset($_GET['titre']) && isset($_GET['contenu'])) {
    $id_billet = $_GET['id_billet'];
    $titre = $_GET['titre'];
    $contenu = $_GET['contenu'];


    $requete = "UPDATE billets SET titre = :titre, contenu = :contenu WHERE id_billet = :id_billet";
    $stmt = $db->prepare($requete);
    $stmt->bindParam(':titre', $titre, PDO::PARAM_STR);
    $stmt->bindParam(':contenu', $contenu, PDO::PARAM_STR);
    $stmt->bindParam(':id_billet', $id_billet, PDO::PARAM_INT);

    if ($stmt->execute()) {
       
        header("Location: index.php");
        exit();
    } 
}

if (isset($_GET['id_billet'])) {
    $id_billet = $_GET['id_billet'];

    
    $requete = "SELECT * FROM billets WHERE id_billet = :id_billet";
    $stmt = $db->prepare($requete);
    $stmt->bindValue(':id_billet', $id_billet, PDO::PARAM_INT);
    $stmt->execute();
    $billet = $stmt->fetch(PDO::FETCH_ASSOC);

   
    if ($billet) {
        ?>
        

        <form action="modifier_billet.php" method="GET">
            <input type="hidden" name="id_billet" value="<?= $billet['id_billet'] ?>">

            <label for="titre">Titre du billet :</label><br>
            <input type="text" id="titre" name="titre" value="<?= htmlspecialchars($billet['titre']) ?>" required><br><br>

            <label for="contenu">Contenu du billet :</label><br>
            <textarea id="contenu" name="contenu" rows="10" cols="50" required><?= htmlspecialchars($billet['contenu']) ?></textarea><br><br>

            <input type="submit"  class="btn" value="Mettre à jour le billet">
        </form>
</div>
        <?php
    } 
}
?>

</main>
</body>
</html>
