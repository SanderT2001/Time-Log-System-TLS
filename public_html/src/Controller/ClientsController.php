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
    }

    public function index()
    {
        $this->set('clients', $this->Clients
                                   ->getAll());
    }

    public function add()
    {
        die('ADD');
    }
}
