<?php
   include_once 'config_sever.php'; // code d'acces au serveur.

      try{
         if (isset($_POST['nomTask']) AND $_POST['nomTask']!=NULL){ // +++ créer le formulaire de création de tache dans form_add_task +++
         $newTask= new Tache($_POST['nomTask'], $_POST['dateStart'], $_POST['echeance'], $_POST['comment']); // je crée la tache en vu de son enregistrement en base
         } else {
            echo 'vous devez donner un nom à votre tâche';
         }

}catch (exception $e)
      {
          die('Erreur : ' . $e->getMessage());
      }