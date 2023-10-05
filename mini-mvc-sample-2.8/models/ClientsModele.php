<?php

namespace models;

use models\base\SQL;
use models\classes\Client;


class ClientsModele extends SQL
{
    public function __construct()
    {
        parent::__construct('client', 'id');
    }

    /**
     * Liste les clients présents en base de données
     * @param int $limit
     * @param int $page
     * @return Client[]
     */
    public function liste(int $limit = PHP_INT_MAX, int $page = 0): array
    {
        $query = "SELECT * FROM client LIMIT :limit,:offset;";

        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute([":limit" => $limit * $page, ":offset" => $limit]);

        return $stmt->fetchAll(\PDO::FETCH_CLASS, Client::class);
    }

    /**
     * Retourne une liste de client correspondant au critère de recherche
     * @param string $keyword
     * @param int $limit
     * @param int $page
     * @return Client[]
     */
    public function recherche(string $keyword = "", int $limit = PHP_INT_MAX, int $page = 0): array
    {
        $query = "SELECT * FROM client WHERE nom LIKE :nom OR prenom like :prenom OR email like :email LIMIT :limit,:offset;";

        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute([
            ":nom" => "%$keyword%",
            ":prenom" => "%$keyword%",
            ":email" => "%$keyword%",
            ":limit" => $limit * $page,
            ":offset" => $limit
        ]);

        return $stmt->fetchAll(\PDO::FETCH_CLASS, Client::class);
    }

    /**
     * Ajoute un nouveau client en base de données
     * @param Client $unClient
     * @return bool|string
     */
    public function creerClient(Client $unClient): bool|string
    {
        $query = "INSERT INTO client (id, nom, prenom, email, telephone) VALUES (null, ?, ?, ?, ?)";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute([$unClient->getNom(), $unClient->getPrenom(), $unClient->getEmail(), $unClient->getTelephone()]);

        return $this->getPdo()->lastInsertId();
    }

    public function getByClientId($clientId): Client{
        $query = "SELECT * FROM client WHERE id = ?";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute([$clientId]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, Client::class);
        return $stmt->fetch();
    }
}