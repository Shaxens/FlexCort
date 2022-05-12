<?php
class Modele
{
    // ATTRIBUTS
    private int $idModele;
    private string $pseudo;
    private string $dateNaissance;

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

    // CONSTRUCTEUR

    /**
     * @param int $idModele
     * @param String $pseudo
     * @param String $dateNaissance
     */
    public function __construct (int $idModele, string $pseudo, string $dateNaissance)
    {
        $this->idModele = $idModele;
        $this->pseudo = $pseudo;
        $this->dateNaissance = $dateNaissance;
    }
}