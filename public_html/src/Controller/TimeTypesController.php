<?php

namespace App\Controller;

/**
 * TimeTypes Controller
 *
 * This Controller will handle all actions regarding to the TimeType Entity.
 */
class TimeTypesController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        // Make the current User ID available to the Table Object, so it can be added to every query automatically.
        $this->TimeTypes->userId = $this->Auth
                                        ->user()['ID'];
    }

    public function index()
    {
        $this->set('time_types', $this->TimeTypes
                                      ->getAll());
    }
}
