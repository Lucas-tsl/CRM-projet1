<?php
namespace models\classes;

use models\AdresseModel;
use models\ProduitsModele;

class Client
{
    private string $id;
    private string $nom;
    private string $prenom;
    private string $email;
    private string $telephone;
    private ProduitsModele $produitModele;
    private AdresseModel $adresseModele;

    function __construct()
    {
        $this->produitModele = new ProduitsModele();
        $this->adresseModele = new AdresseModel();
    }

    /**
     * Retourne la liste des adresses du client
     * @return Adresse[]
     */
    public function lesAdresses(): array {
        return $this->adresseModele->lesAdressesClient($this->id);
    }

    /**
     * Retourne la liste des produits du client
     * @return Produit[]
     */
    public function lesProduits(): array
    {
        return $this->produitModele->lesProduitsClient($this->id);
    }

    /**
     * Affichage des informations de base du client
     * @return string
     */
    public function generalInfo(): string
    {
        return join(",", array_filter([$this->id, $this->nom, $this->prenom]));
    }

    /**
     * Affichage des informations de contact d'un client.
     * @return string
     */
    public function contactInfo(): string
    {
        return join(",", array_filter([$this->email, $this->telephone]));
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
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getTelephone(): string
    {
        return $this->telephone;
    }

    /**
     * @param string $telephone
     */
    public function setTelephone(string $telephone): void
    {
        $this->telephone = $telephone;
    }

}