<?php
namespace controllers;
use utils\Template;
use models\ClientsModele;

use controllers\base\WebController;

class ClientController extends WebController
{
    private $clientModel;
    function __construct()
    {
        $this->clientModel =new ClientsModele();
    }

    function listeClient()
    {
        $clients = $this->clientModel->liste(25, 0);
        return Template::render("views/global/liste/ficheClient.php", array("clients" => $clients));
    }

    public function fiche($id)
    {
        // À compléter avec les bons appels de méthode.
        // …
        $clients = $this->clientModel->getByClientId($id);
        return Template::render("views/global/liste/client-card.php", array("clients" => $clients));
    }


}