<?php
session_start();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
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
        
            <?php 
        
        if (isset($_SESSION["login"])){ ?>
                <p>Bienvenue, <?= $_SESSION["login"]; ?> !</p>
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

$db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');

 $afficherTous = isset($_GET['afficher_tous']) && $_GET['afficher_tous'] === 'true'; 

  
    if ($afficherTous) {
        $requete = "SELECT * FROM billets ORDER BY id_billet DESC";
    } else {
       
        $requete = "SELECT * FROM billets ORDER BY id_billet DESC LIMIT 3";
    }

$stmt = $db->prepare($requete);
$stmt->execute();
$billets = $stmt->fetchAll(PDO::FETCH_ASSOC);

 if (!$afficherTous){ 
 
 ?>

    <form action="index.php" method="get">
        <input type="hidden" name="afficher_tous" value="true">
        <input type="submit" class="bouton"  value="Afficher tous les billets">
    </form>

    
<?php 
}
else { ?>
    <form action="index.php" method="get">
        <input type="hidden" name="afficher_tous" value="false">
        <input type="submit" class="bouton" value="Afficher les derniers billets">
    </form>
        
<?php 
}


if (isset($_SESSION["id"]) && $_SESSION["id"] == 1){
 
 ?>
 
<form action="nouveau_billet.php">
    <input type="submit" class="bouton" value="Nouveau billet">
</form>
           
       

        
        <?php } ?>
        <form action="mention.php" method="get">
        <input type="submit" class="bouton"  value="Mentions légales">
    </form>
    </nav>
</header>
<body>
    <a href="#" alt="remonter en haut de la page" ><p class="haut">Haut de page</p>
    </a>
   <main>

    <h1>
    <span>C</span><span>i</span><span>n</span><span>é</span><span>g</span><span>r</span><span>a</span><span>p</span><span>h</span><span>i</span><span>e</span>
    <span> </span>
    <span>C</span><span>r</span><span>i</span><span>m</span><span>i</span><span>n</span><span>e</span><span>l</span><span>l</span><span>e</span>
</h1>

    <p class="alinea">Bienvenue sur mon blog ! Passionné par le cinéma, je vous invite à découvrir ici des films qui nous plongent dans l'univers fascinant des thrillers psychologiques.Les films que je vous propose ici ne se contentent pas de raconter des histoires de crime, mais nous plongent dans les profondeurs de l'âme humaine, questionnant la morale, l’obsession et l’injustice. Que vous soyez un amateur de suspense ou un cinéphile passionné, ces récits puissants et souvent dérangeants sauront captiver votre esprit et vous laisser une empreinte durable.


</p>
    <h2>Derniers billets</h2>


  <?php 



foreach ($billets as $billet){

?>
<div class="billet">
    <h3><?= $billet['titre'] ?></h3>
    <p class="alinea"><?= $billet['contenu'] ?></p>
      <div class="info">
    <p><?= $billet['date'] ?></p>
     <?php
        $requetecom = "SELECT COUNT(*) as count FROM commentaires WHERE billet_id = :billet_id";
        $stmtcom = $db->prepare($requetecom);
        $stmtcom->bindValue(':billet_id', $billet['id_billet'], PDO::PARAM_INT);
        $stmtcom->execute();
        $countcom = $stmtcom->fetch(PDO::FETCH_ASSOC)['count'];
        
        ?>
    <form action="index.php" method="GET">
                    <input type="hidden" name="billet_id" value="<?= $billet['id_billet'] ?>">
                    <input type="submit" class="bouton" value="Commentaires : <?= $countcom ?>">
</form>






<?php 

if (isset($_SESSION["id"]) && $_SESSION["id"] == 1){
 
?>
     
<form action="modifier_billet.php">
    
    <input type="hidden" name="id_billet" value="<?= $billet['id_billet'] ?>">
    <input class="bouton" type="submit"  value="Modifier">
</form>
<form action="supprimer_billet.php">
    <input type="hidden" name="id_billet" value="<?= $billet['id_billet'] ?>">
    <input  class="bouton" type="submit"  value="Supprimer">
</form>
<?php 
}
 
?>

</div>



<div class='commentaires'>

     <?php 
                if (isset($_GET['billet_id']) && $_GET['billet_id'] == $billet['id_billet']) {
                    $requeteCommentaires = "SELECT commentaires.commentaire, commentaires.date, utilisateurs.login 
            FROM commentaires 
            JOIN utilisateurs ON commentaires.auteur_id = utilisateurs.id 
            WHERE commentaires.billet_id = :billet_id 
            ORDER BY commentaires.date DESC";
                    $stmtCommentaires = $db->prepare($requeteCommentaires);
                    $stmtCommentaires->bindValue(':billet_id', $billet['id_billet'], PDO::PARAM_INT);
                    $stmtCommentaires->execute();
                    $commentaires = $stmtCommentaires->fetchAll(PDO::FETCH_ASSOC);
                    
                        foreach ($commentaires as $commentaire) {
                              ?>
                               <hr>
                            <div class='commentaire'>
                                <div class="phototext">
                                <img src="img/profil.png" alt="">
                               
                            <p class="alinea"><?=$commentaire['commentaire'] ?></p>
                            </div>
                            <p class="datecom"> <?="Poté le ".$commentaire['date']. " par ".$commentaire["login"];?></p>
                        
                        </div>
                          <?php 
                        
                    }
            
                }
                ?>

                <hr>
        <?php 
if (isset($_SESSION["id"])) { 
    ?>

    <form action="ajouter_commentaire.php" method="GET">
    
    <input type="hidden" name="billet_id" value="<?= $billet['id_billet']?>">
    <input type="submit" class="bouton" value="Ajouter un commentaire">
    </form>

        <?php
}
else{
  ?>

   <p>Si vous souhaitez ajouter un commentaire connectez-vous !</p>

        <?php
}
?>

</div>
</div>


 <?php 

}
 
 ?>

<div class="affichebi"> 

 <?php 
if (!$afficherTous){ 
 
 ?>


    <form action="index.php" method="get">
        <input type="hidden" name="afficher_tous" value="true">
        <input type="submit" class="bouton"  value="Afficher tous les billets">
    </form>

    
<?php 
}
else { ?>
    <form action="index.php" method="get">
        <input type="hidden" name="afficher_tous" value="false">
        <input type="submit" class="bouton" value="Afficher les derniers billets">
    </form>
       
<?php 
}
?>
</div> 

    </main>
</body>
</html>