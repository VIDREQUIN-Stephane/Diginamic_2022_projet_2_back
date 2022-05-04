<?php
   include_once 'config_sever.php'; // code d'acces au serveur.

      try{
         if (isset($_POST['nomTask']) AND $_POST['nomTask']!=NULL){
         $newTask= new Tache($_POST['nomTask'], $_POST['dateStart'], $_POST['echeance'], $_POST['comment']);
         } else
         {
            echo 'vous devez donner un nom à votre tâche';
         }

}catch (exception $e)
      {
          die('Erreur : ' . $e->getMessage());
      }