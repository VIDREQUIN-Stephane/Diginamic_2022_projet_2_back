<?
class Tache{
   private string $nom;
   private string $duree;
   private string $comment;

   /**
    * Get the value of nom
    */ 
   public function getNom()
   {
      return $this->nom;
   }

   /**
    * Set the value of nom
    *
    * @return  self
    */ 
   public function setNom($nom)
   {
      $this->nom = $nom;

      return $this;
   }

   /**
    * Get the value of duree
    */ 
   public function getDuree()
   {
      return $this->duree;
   }

   /**
    * Set the value of duree
    *
    * @return  self
    */ 
   public function setDuree($duree)
   {
      $this->duree = $duree;

      return $this;
   }

   /**
    * Get the value of comment
    */ 
   public function getComment()
   {
      return $this->comment;
   }

   /**
    * Set the value of comment
    *
    * @return  self
    */ 
   public function setComment($comment)
   {
      $this->comment = $comment;

      return $this;
   }

   public function __construct(string $nom, ?string $duree, ?string $comment){
      $this->nom=$nom;
      $this->duree=$duree;
      $this->comment=$comment;
   }

   public function __toString()
   {
      echo ("Nom : ".$this->getNom()."<br/>Duree : ".$this->getDuree()."<br/>Commentaire : ".$this->getComment()."<br/><br/>");
   }

   /**
    * Permet de créer ou de compléter le commentaire de la tache.
    * 
    * @param string $newComment
    */
   public function majComment(string $newComment){
      if (strlen($this->comment)==0){
         $this->setComment($newComment);
      } else {
         $this->comment=$this->comment."<br/>".$newComment;
      }
   }




}

