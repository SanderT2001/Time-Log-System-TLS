<?php

namespace App\Controller;

/**
 * Projects Controller
 *
 * This Controller will handle all actions regarding to the Project Entity.
 */
class ProjectsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
    }

    public function index()
    {
        $this->set('projects', $this->Projects
                                    ->getAll());
    }
}
