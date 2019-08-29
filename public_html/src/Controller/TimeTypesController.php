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
    }

    public function index()
    {
        $this->set('time_types', $this->TimeTypes
                                      ->getAll());
    }
}
