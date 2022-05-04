<?php
   include_once 'config_sever.php'; // code d'acces au serveur.


   try{
      if (is_connected()){
         try{
            if (isset($_POST['nomTask']) AND $_POST['nomTask']!=NULL){
            $newTask= new Tache($_POST['nomTask'], $_POST['dateStart'], $_POST['echeance'], $_POST['comment']); // je crée la tache en vu de son enregistrement en base
            } else {
               echo 'vous devez donner un nom à votre tâche';
            }
         } catch (exception $e) {
             echo 'La tâche n\'a pas pu être crée';
         }
      } else {
         echo 'vous devez vous connecter';
      }
   } catch (exception $e) {
          echo 'erreur de connection à la base';
   }