<?php
class Utilisateur 
{
    // ATTRIBUTS    
    private int $id;
    private string $nom;
    private string $prenom;
    private string $mail;
    private string $mdp;

   // CONSTRUCTEUR
   public function __construct(int $id, string $nom, string $prenom, string $mail, string $mdp)
   {
        $this->setId($id);
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setMail($mail);
        $this->setMdp($mdp);
   }

   // GETTERS
   public function getId() {return $this->id;}
   public function getNom() {return $this->nom;}
   public function getPrenom() {return $this->prenom;}
   public function getMail() {return $this->mail;}
   public function getMdp() {return $this->mdp;}


   // SETTERS
   public function setId($id)
   {
        $this->id = $id;
   }
   public function setNom($nom)
   {
        $this->nom = $nom;
   }
   public function setPrenom($prenom)
   {
        $this->prenom = $prenom;
   }
   public function setMail($mail)
   {
        $this->mail = $mail;
   }
   public function setMdp($mdp)
   {
        $this->mdp = $mdp;
   } 

   // METHODES
   public function hydrate(array $donnees)
   {
        foreach ($donnees as $Key => $value)
        {
             $method = 'set'.ucfirst($Key);
             if (method_exists($this, $method))
             {
                  $this->$method($value);
             }
        }
   }


}