<?php
class Modele
{
    // ATTRIBUTS
    private int $idModele;
    private string $pseudo;
    private string $dateNaissance;
    private string $descriptionModele;

    // SETTERS

    /**
     * @param int $idModele
     */
    public function setIdModele (int $idModele): void
    {
        $this->idModele = $idModele;
    }

    /**
     * @param String $pseudo
     */
    public function setPseudo (string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @param String $dateNaissance
     */
    public function setDateNaissance (string $dateNaissance): void
    {
        $this->dateNaissance = $dateNaissance;
    }

    /**
     * @param string $descriptionModele
     */
    public function setDescriptionModele(string $descriptionModele): void
    {
        $this->descriptionModele = $descriptionModele;
    }

    //GETTERS

    /**
     * @return int
     */
    public function getIdModele (): int
    {
        return $this->idModele;
    }

    /**
     * @return String
     */
    public function getPseudo (): string
    {
        return $this->pseudo;
    }

    /**
     * @return String
     */
    public function getDateNaissance (): string
    {
        return $this->dateNaissance;
    }

    /**
     * @return string
     */
    public function getDescriptionModele(): string
    {
        return $this->descriptionModele;
    }

    // CONSTRUCTEUR

    /**
     * @param int $idModele
     * @param String $pseudo
     * @param String $dateNaissance
     */
    public function __construct (int $idModele, string $pseudo, string $dateNaissance, string $descriptionModele)
    {
        $this->idModele = $idModele;
        $this->pseudo = $pseudo;
        $this->dateNaissance = $dateNaissance;
        $this->descriptionModele = $descriptionModele;
    }
}