<?php
   include_once 'config_sever.php'; // code d'acces au serveur.

      try{
          $bdd = new PDO("mysql:host=$host;dbname=$base", $user, $pass);
         if (isset($_POST['nomTache']) AND $_POST['nomTache']!=NULL){ // +++ créer le formulaire de création de tache dans form_add_task +++
         $newTask= new Tache($_POST['nom'], $_POST['depart'], $_POST['echeance'], $_POST['comment']); // je crée la tache en vu de son enregistrement en base
         } else {
            echo 'vous devez donner un nom à votre tâche';
         }

}catch (exception $e)
      {
          die('Erreur : ' . $e->getMessage());
      }