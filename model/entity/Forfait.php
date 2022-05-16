<?php

class Forfait
{
    // ATTRIBUTS
    private int $idForfait;
    private string $nomForfait;
    private string $descriptionForfait;
    private int $dureeForfait;
    private int $prixForfait;

    // GETTERS
    /**
     * @return int
     */
    public function getIdForfait (): int
    {
        return $this->idForfait;
    }

    /**
     * @return string
     */
    public function getNomForfait (): string
    {
        return $this->nomForfait;
    }

    /**
     * @return string
     */
    public function getDescriptionForfait (): string
    {
        return $this->descriptionForfait;
    }

    /**
     * @return int
     */
    public function getDureeForfait (): int
    {
        return $this->dureeForfait;
    }

    /**
     * @return int
     */
    public function getPrixForfait (): int
    {
        return $this->prixForfait;
    }

    // SETTERS
    /**
     * @param int $idForfait
     */
    public function setIdForfait (int $idForfait): void
    {
        $this->idForfait = $idForfait;
    }

    /**
     * @param string $nomForfait
     */
    public function setNomForfait (string $nomForfait): void
    {
        $this->nomForfait = $nomForfait;
    }

    /**
     * @param string $descriptionForfait
     */
    public function setDescriptionForfait (string $descriptionForfait): void
    {
        $this->descriptionForfait = $descriptionForfait;
    }

    /**
     * @param int $dureeForfait
     */
    public function setDureeForfait (int $dureeForfait): void
    {
        $this->dureeForfait = $dureeForfait;
    }

    /**
     * @param int $prixForfait
     */
    public function setPrixForfait (int $prixForfait): void
    {
        $this->prixForfait = $prixForfait;
    }

    // CONSTRUCTEUR
    /**
     * @param int $idForfait
     * @param string $nomForfait
     * @param string $descriptionForfait
     * @param int $dureeForfait
     * @param int $prixForfait
     */
    public function __construct(int $idForfait, string $nomForfait, string $descriptionForfait, int $dureeForfait, int $prixForfait)
    {
        $this->setIdForfait($idForfait);
        $this->setNomForfait($nomForfait);
        $this->setDescriptionForfait($descriptionForfait);
        $this->setDureeForfait($dureeForfait);
        $this->setPrixForfait($prixForfait);
    }
}