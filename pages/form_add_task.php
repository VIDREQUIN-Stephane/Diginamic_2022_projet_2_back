<form action="add_task" method="post" class="formulaire" >
   <div>
      <label for="nomTask">Nom de la tâche :   </label>
      <input id="nomTask" name="nomTask" type="text" placeholder="Champ obligatoire" required>
   </div>
   <div>
      <label for="dateStart">Commencer le :   </label>
      <input id="dateStart" name="dateStart" type="date" value="2022-01-02" min="2022-01-02" max="2122-01-02"> // valide pour un siècle !!! -->
   </div>
   <div>
      <label for="echeance">A rendre pour le :   </label>
      <input id="echeance" name="echeance" type="date" value="2022-01-02" min="2022-01-02" max="2122-01-02"> // valide pour un siècle !!! -->
   </div>
   <div>
      <label for="nomTask">Joindre un commentaire :   </label>
      <textarea id="comment" name="comment" rows="5" cols="150" placeholder="Ce commentaire pourra être complété par la suite."></textarea>
   </div>
      <br/>
      <button href="index.php?page=kanban" type="submit" name="submit">Ajouter ma tâche</button>
</form>
