<?php
class Utilisateur 
{
    // ATTRIBUTS
    private string $nom;
    private string $prenom;
    private string $mail;
    private string $mdp;

   // CONSTRUCTEUR
   public function __construct(string $nom, string $prenom, string $mail, string $mdp)
   {
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setMail($mail);
        $this->setMdp($mdp);
   }

   // GETTERS
   public function getNom() {return $this->nom;}
   public function getPrenom() {return $this->prenom;}
   public function getMail() {return $this->mail;}
   public function getMdp() {return $this->mdp;}


   // SETTERS
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