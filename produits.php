<?php
    try {
        $connect=new PDO("mysql:host=localhost;dbname=travail","root","");
    } catch (Exception $e) {
        echo "Connexion echoue" . $e->getMessage();
    }
    $resultat=$connect->prepare("SELECT * FROM produit");
    //Notre array prend en paramettre les valeur quon veut mettre dans les ?
    $resultat->execute(array());
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="produits.css">
</head>
<body>
    <section>
        <div class="prod">
            <div>ID</div>
            <div>INTITULE</div>
            <div>PRIX ACHAT</div>
            <div>PRIX VENTE</div>
            <div>STOCK</div>
            <div>ACTION</div>
        </div>
        <?php
            while($ligne=$resultat->fetch(PDO::FETCH_ASSOC)){
        ?>
        <div class="prod">
            <div><?php echo $ligne["id"] . "<br>"; ?></div>
            <div><?php echo $ligne["intitule"] . "<br>"; ?></div>
            <div><?php echo $ligne["achat"] . "<br>"; ?></div>
            <div><?php echo $ligne["vente"] . "<br>"; ?></div>
            <div><?php echo $ligne["nombre"] . "<br>"; ?></div>
            <div>
                <a href="function.php?action=delete&identifiant=<?php echo $ligne["id"] ?>" class="sup">Supprimer</a>
                <a href="formulaire.php?update=<?php echo $ligne["id"] ?>" class="mod">Modifier</a>
            </div>
        </div>
        <?php } ?>
        <div class="ajouter">
            <a href="formulaire.php">Ajouter un produit</a>
        </div>
    </section>
</body>
</html>