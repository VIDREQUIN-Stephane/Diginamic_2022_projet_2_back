<h1><?= isset($_GET['id']) ? 'Modification d\'une categories' : 'Création d\'une categories' ?></h1>
<?php
   include_once 'config_sever.php';
try
{
	$dbh = new PDO("mysql:host=$host;dbname=$base", $user, $pass);

        //AFFICHAGE DES TÂCHES
        $query = 'SELECT * FROM categorie';
        $statement = $dbh->prepare($query);
        $statement->execute();

        foreach ($statement as $row) {
                        ?>
                <p><?= $row['id_utilisateur'] ?> <?= $row['nom_categorie'] ?></p>
        
    <?php
        }

        //ENREGISTREMENT D'UNE NOUVELLE TÂCHE      
$id_user = $_SESSION['id'];
        var_dump($id_user);



        if (isset($_POST['submit'])) {
            if (!empty($_POST['categorie'])) {
                //enregistrer la tâche dans la bdd
                $categorie = $_POST['categorie'];

                $statement = $dbh->prepare("INSERT INTO categorie (id,id_utilisateur,nom_categorie) VALUES (null,$id_user,$categorie)");


                if (!$statement->execute(['categorie' => $categorie])){
                    print '<h2 class="error">Erreur de suppression des données : ' . $statement->errorCode() . '</h2>';
                }else{
                    print '<h2 class="valid">' . $statement->rowCount() . ' ajout en base de données</h2>';
                }
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

 <form action="index.php?page=categ" method="post">
     <div>
         <input id="categorie" name="categorie" type="text">
     </div>
     <p>
         <button href="index.php?page=kanban" type="submit" name="submit">Ajouter une catégorie</button>
     </p>
 </form>
<?php
var_dump($categorie);
?>