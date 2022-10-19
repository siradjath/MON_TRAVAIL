<?php
    try {
        $connect=new PDO("mysql:host=localhost;dbname=travail","root","");
    } catch (Exception $e) {
        echo "Connexion echoue" . $e->getMessage();
    }
    if(isset($_GET["update"])){
        $resultat = $GLOBALS["connect"] ->prepare("SELECT * FROM produit WHERE id=?");
        $resultat ->execute(array($_GET["update"]));
        $ligne = $resultat ->fetch(PDO::FETCH_ASSOC);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="formulaire.css">
</head>
<body>
    <section>
        <form action="function.php" method="POST">
            <input type="hidden" name="action" value="<?php if(isset($ligne)) echo "update" ;else echo "insert";?>">
            <?php if(isset($ligne)){ ?>
                <input type="hidden" name="id" value="<?php echo $ligne["id"] ?>">
            <?php } ?>
            <div class="input-group">
                <input type="text" name="int" required placeholder="Intitule" <?php if(isset($ligne)){ ?> value="<?php echo $ligne["intitule"] ; ?>" <?php } ?>>
            </div>
            <div class="input-group">
                <input type="text" name="achat" required placeholder="Prix_Achat" <?php if(isset($ligne)){ ?> value="<?php echo $ligne["achat"]; ?>" <?php } ?>>
            </div>
            <div class="input-group">
                <input type="text" name="vente" required placeholder="Prix_Vente" <?php if(isset($ligne)){ ?> value="<?php echo $ligne["vente"]; ?>" <?php } ?>>
            </div>
            <div class="input-group">
                <input type="text" name="desc" required placeholder="Description" <?php if(isset($ligne)){ ?> value="<?php echo $ligne["description"]; ?>" <?php } ?>>
            </div>
            <div class="input-group">
                <input type="text" name="nombre" required placeholder="Nombre" <?php if(isset($ligne)){ ?> value="<?php echo $ligne["nombre"]; ?>" <?php } ?>>
            </div>
            <input type="submit" value="Enregistrer">
        </form>
    </section>
    <div class="ShowProduit">
            <a href="produits.php">Voir tous les produits</a>
        </div>
    
</body>
</html>