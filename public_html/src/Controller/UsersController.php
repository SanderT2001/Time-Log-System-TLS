<?php

namespace App\Controller;

/**
 * Users Controller
 *
 * This Controller will handle all actions regarding to the User Entity.
 */
class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->Auth->allow([
            'add',
            'login'
        ]);
    }

    /**
     * Creates a new User.
     *
     * @uses array $_POST (@see $this->request->getData();) for the User info to create.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post'))
        {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if ($this->Users->save($user)) {
                $this->Flash->success(__('User successfully created!'));
                return $this->redirect(['action' => 'login']);
            }

            $this->Flash->error(__('Could not create a new user.'));
        }
        $this->set('user', $user);
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
