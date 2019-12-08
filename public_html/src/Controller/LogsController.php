<?php

namespace App\Controller;

/**
 * Logs Controller
 *
 * This Controller will handle all actions regarding to the Log Entity.
 */
class LogsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
    }

    public function dashboard()
    {
    }

    public function index()
    {
        $this->set('logs', $this->Logs
                                ->getAll());
    }

    public function add()
    {
        $this->viewBuilder()
             ->setLayout('ajax');
    }
}
