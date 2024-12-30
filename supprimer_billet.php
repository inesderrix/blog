<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer</title>
</head>
<body>

    <?php
session_start();

$db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');

if (isset($_GET['id_billet'])) {
    $id_billet = $_GET['id_billet'];

$requete ="DELETE FROM billets WHERE id_billet = :id_billet";
$stmt =$db->prepare($requete);
$stmt->bindValue(':id_billet',$id_billet, PDO::PARAM_INT);


if ($stmt->execute()) {
        header("Location: index.php");
}
}
?>
</body>
</html>