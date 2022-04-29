<?
class Tache{
   private string $nom;
   private string $dateStart;
   private string $echeance;
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
    * Get the value of dateStart
    */ 
    public function getDateStart()
    {
       return $this->dateStart;
    }
 
    /**
     * Set the value of dateStart
     *
     * @return  self
     */ 
    public function setDateStart($dateStart)
    {
       $this->dateStart = $dateStart;
 
       return $this;
    }

    /**
    * Get the value of $echeance
    */ 
   public function getEcheance()
   {
      return $this->echeance;
   }

   /**
    * Set the value of $echeance
    *
    * @return  self
    */ 
   public function setEcheance($echeance)
   {
      $this->echeance = $echeance;

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

   public function __construct(string $nom, ?string $echeance, ?string $comment){
      $this->nom=$nom;
      $this->echeance=$echeance;
      $this->comment=$comment;
   }

   public function __toString()
   {
      echo ("Nom : ".$this->getNom()."<br/>Echeance : ".$this->getecheance()."<br/>Commentaire : ".$this->getComment()."<br/><br/>");
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

