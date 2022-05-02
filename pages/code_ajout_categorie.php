<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création de catégorie</title>
</head>

<body>
    <form method="post">
        <div>
            <input id="categorie" name="categorie" type="text">
        </div>
        <p>
            <button type="submit" name="submit">Ajouter une catégorie</button>
        </p>
    </form>
    <?php
    include 'config_serveur.php';
    try {
        $dbh = new PDO(DSN, LOGIN, PASSWORD, array(PDO::ATTR_PERSISTENT => true));

        //AFFICHAGE DES TÂCHES
        $query = 'SELECT * FROM categorie';
        $statement = $dbh->prepare($query);
        $statement->execute();

        foreach ($statement as $row) {
            ?> 
                <p><?= $row['Id'] ?> <?= $row['designation'] ?></p>
        
    <?php
        }
        //ENREGISTREMENT D'UNE NOUVELLE TÂCHE      

        if (isset($_POST['submit'])) {
            if (!empty($_POST['categorie'])) {
                //enregistrer la tâche dans la bdd
                $categorie = $_POST['categorie'];
                $statement = $dbh->prepare("insert into categorie values (0,:categorie)");
                $statement->execute(['categorie' => $categorie]);
    ?>
                <p>Tâche <?= $categorie ?> créée</p>
            <?php
                header('location: tp_trekker.php');
            } else { ?>
                <p>entrer quelque chose svp</p> <?php
            }
        }
        $dbh = null;
    }
    catch (Exception $e) {
        // En cas d'erreur, on affiche un message
        echo 'Erreur : ' . $e->getMessage();
    }
    ?>



</body>

</html>