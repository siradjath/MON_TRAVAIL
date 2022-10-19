<?php
    try {
        $connect=new PDO("mysql:host=localhost;dbname=travail","root","");
    } catch (Exception $e) {
        echo "La Connexion echoue" . $e->getMessage();
    }

    function insert($intitule,$prix_achat,$prix_vente,$description,$nombre){
        $requete = "INSERT INTO produit(intitule,achat,vente,description,nombre,date) VALUES(?,?,?,?,?,now())";
        $resultat = $GLOBALS["connect"] ->prepare($requete);  
        $resultat->execute(array($intitule,$prix_achat,$prix_vente,$description,$nombre));
        header("location:produits.php");
    } 
    function delete($identifiant){
        $requete = "DELETE FROM produit where id=?";
        $resultat = $GLOBALS["connect"] ->prepare($requete);
        $resultat->execute(array($identifiant));
        header("location:produits.php");
    }
    function update($intitule,$prix_achat,$prix_vente,$description,$nombre,$id){
        $requete = "UPDATE produit SET intitule=?,achat=?,vente=?,description=?,nombre=? WHERE id=?";
        $resultat = $GLOBALS["connect"] ->prepare($requete);
        $resultat ->execute(array($intitule,$prix_achat,$prix_vente,$description,$nombre,$id));
        header("location:produits.php");
    } 
    if(isset($_REQUEST["action"])){
        switch ($_REQUEST["action"]) {
            case 'insert':
                insert($_POST["int"],$_POST["achat"],$_POST["vente"],$_POST["desc"],$_POST["nombre"]);           
                break;
            case 'delete':{
                delete($_GET["identifiant"]);
                break;
            }   
            case 'update':{
                update($_POST["int"],$_POST["achat"],$_POST["vente"],$_POST["desc"],$_POST["nombre"],$_POST["id"]);
                break;
            } 
        }
    }
    
?>