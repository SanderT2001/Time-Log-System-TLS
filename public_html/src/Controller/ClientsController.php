<?php

namespace App\Controller;

/**
 * Clients Controller
 *
 * This Controller will handle all actions regarding to the Client Entity.
 */
class ClientsController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        // Make the current User ID available to the Table Object, so it can be added to every query automatically.
        $this->Clients->userId = $this->Auth
                                        ->user()['ID'];
    }

    public function index()
    {
        $this->set('clients', $this->Clients
                                   ->getAll());
    }
}
