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

        if (isset($_POST['submit'])) {
            if (!empty($_POST['categorie'])) {
                //enregistrer la tâche dans la bdd
                $categorie = $_POST['categorie'];
                $statement = $dbh->prepare("INSERT INTO categorie (id,id_utilisateur,nom_categorie) VALUES (?,?,?)");
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

 <form action="index.php?page=kanban" method="post">
     <div>
         <input id="categorie" name="categorie" type="text">
     </div>
     <p>
         <button type="submit" name="submit">Ajouter une catégorie</button>
     </p>
 </form>