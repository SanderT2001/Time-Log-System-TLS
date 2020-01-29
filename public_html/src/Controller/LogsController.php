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

        $log = $this->Logs->newEntity();
        if ($this->request->is('post')) {
            $log = $this->Logs->patchEntity($log, $this->request->getData());

            if ($this->Logs->save($log)) {
                $this->Flash->success(__('Log successfully created!'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('Could not create a new log.'));
        }
        $this->set('log', $log);
    }
}
