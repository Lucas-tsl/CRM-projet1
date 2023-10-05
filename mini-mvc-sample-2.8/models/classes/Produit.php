<?php

namespace models\classes;

use models\ProduitsModele;

class Produit
{
    private string $id;
    private string $nom;
    private string $description;
    private int $prix;
    private ProduitsModele $produitModele;

    public function __construct()
    {
        $this->produitModele = new ProduitsModele();
    }

    /**
     * Retourne la liste des clients ayant commandé ce produit.
     * @return Client[]
     */
    public function lesClients(): array
    {
        return $this->produitModele->lesClientProduits($this->id);
    }

    public function toString(): string
    {
        return join(",", array_filter([$this->id, $this->nom, $this->description]));
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getPrix(): int
    {
        return $this->prix;
    }

    /**
     * @param int $prix
     */
    public function setPrix(int $prix): void
    {
        $this->prix = $prix;
    }
}