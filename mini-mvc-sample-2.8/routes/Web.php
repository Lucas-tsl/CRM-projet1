<?php

namespace routes;

use utils\Template;
use routes\base\Route;
use controllers\ClientController;
use controllers\SampleWebController;

class Web
{
    function __construct()
    {
        $main = new SampleWebController();
        $client = new ClientController();
        

        // Appel la méthode « home » dans le contrôleur $main.
        Route::Add('/', [$main, 'home']);
        Route::Add('/exemple', [$main, 'exemple']);
        Route::Add('/exemple2/{parametre}', [$main, 'exemple']);
        
        // Clients
       // Route::Add('/client/{id}', [$client, 'client']);
        Route::Add('/liste/ficheClient', [$client, 'listeClient']);

        Route::Add('/liste/client-card/{$id}', [$client, 'fiche']);

        ///Route::Add('/client-card/{$id}', [$client, 'fiche']);



        // Appel la fonction inline dans le routeur.
        // Utile pour du code très simple, où un tes, l'utilisation d'un contrôleur est préférable.
        Route::Add('/about', function () {
            return Template::render('views/global/about.php');
        });

        //        Exemple de limitation d'accès à une page en fonction de la SESSION.
        //        if (SessionHelpers::isLogin()) {
        //            Route::Add('/logout', [$main, 'home']);
        //        }
    }
}

