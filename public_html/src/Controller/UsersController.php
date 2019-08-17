<?php

namespace App\Controller;

/**
 * Users Controller
 *
 * This controller will handle all actions regarding to the User.
 */
class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->Auth->allow(['add']);
    }

    public function index()
    {
        die("HIER");
    }

    public function add()
    {
        if (!$this->request->is('post')) {
            return;
        }

        $user = $this->Users->newEntity();
        $user = $this->Users->patchEntity($user, $this->request->getData());
        if (!$this->Users->save($user)) {
            // @TODO (Sander)
            return $this->Flash->error('Could not create');
        }

        return $this->redirect(['action' => 'login']);
    }

    /**
     * Logs an User in.
     *
     * @uses array $_POST (@see $this->request->getData();) for the given Credentials to Login with.
     */
    public function login()
    {
        if ($this->request->is('post'))
        {
            $user = $this->Auth->identify();
            if (!$user) {
                return $this->Flash->error(__('Invalid Email and/or Password combination'));
            }

            $this->Flash->success(__('Login successfull'));
            $this->Auth->setUser($user);
            return $this->redirect($this->Auth->redirectUrl());
        }
    }

    /**
     * Logs an User out (clearing the information about the User set in Storage).
     */
    public function logout()
    {
        $this->Flash->success(__('Logout successfull'));

        // @see AuthComponent->logout(); Returns the url to redirect to after a logout.
        return $this->redirect($this->Auth->logout());
    }
}
