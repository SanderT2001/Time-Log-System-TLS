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

        // Make the current User ID available to the Table Object, so it can be added to every query automatically.
        $this->Projects->userId = $this->Auth
                                      ->user()['ID'];
    }

    public function index()
    {
        $this->set('projects', $this->Projects
                                    ->getAll());
    }
}
