<h1><?= isset($_GET['id']) ? 'Modification d\'une categorie' : 'Création d\'une categorie' ?></h1>
<?php
   include_once 'config_sever.php';
try
{
	$dbh = new PDO("mysql:host=$host;dbname=$base", $user, $pass);

        //ENREGISTREMENT D'UNE NOUVELLE TÂCHE
$id_user = $_SESSION['id'];




        if (isset($_POST['submit'])) {
            if (!empty($_POST['categorie'])) {
                //enregistrer la tâche dans la bdd
                $categorie = $_POST['categorie'];
                echo $id_user;
                echo $categorie;



                $statement = $dbh->prepare("INSERT INTO categorie (id_utilisateur, nom_categorie) VALUES ( :user, :cat)");


                $statement->execute(['user' => $id_user, 'cat' => $categorie]);
    ?>
                <p>Tâche <?= $categorie ?> créée</p>
            <?php
                header('location: index.php?page=kanban');
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
         <button href="index.php?page=categ" type="submit" name="submit">Ajouter une catégorie</button>
     </p>
 </form>