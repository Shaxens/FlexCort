<?php

class Forfait
{
    // ATTRIBUTS
    private int $idForfait;
    private string $nomForfait;
    private string $descriptionForfait;
    private int $dureeForfait;
    private int $prixForfait;



    /**
     * @param string $nomForfait
     * @param string $descriptionForfait
     * @param int $dureeForfait
     * @param int $prixForfait
     */
    public function __construct(string $nomForfait, string $descriptionForfait, int $dureeForfait, int $prixForfait)
    {
        $this->idForfait = 0;
        $this->nomForfait = $nomForfait;
        $this->descriptionForfait = $descriptionForfait;
        $this->dureeForfait = $dureeForfait;
        $this->prixForfait = $prixForfait;
    }
}