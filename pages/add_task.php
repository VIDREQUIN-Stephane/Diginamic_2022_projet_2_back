<?
   include_once 'config_sever.php'; // code d'acces au serveur.
try{
   if (is_connected()){ // vérifie la connection au serveur
      try{
         if (isset($_POST['nomTache']) AND $_POST['nomTache']!=NULL){ // +++ créer le formulaire de création de tache dans form_add_task +++
         $newTask= new Tache($_POST['nom'], $_POST['depart'], $_POST['echeance'], $_POST['comment']); // je crée la tache en vu de son enregistrement en base
         } else {
            echo 'vous devez donner un nom à votre tâche';
         }
      } catch (Exception $e) {
         echo "Erreur : La classe n'a pas pu être crée";
      }
   };
} catch (Exception $e) {
      // En cas d'erreur, on informe l'usager.
      echo "Erreur : Impossible de se connecter à la base";
}