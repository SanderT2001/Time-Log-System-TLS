<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Before Filter method
     *
     * The method which is being called before anything happens in the controller.
     *
     * @method Allow
     * Allows the register page to be accessed without a logged in user.
     */
    public function beforeFilter(Event $event)
    {
        $this->Auth->Allow(['register']);
    }

    /**
     * Register method
     *
     * After doing a submit on the registration form ('register.ctp') it will create a new table entity (Model\Entity\User.php) with the filled form data.
     * If all correct, it will 'register' (store) the new entity and redirect you to the login form.
     */
    public function register()
    {
        $user = $this->Users->newEntity($this->request->data);

        if ($this->request->is('post'))
        {
            if ($this->Users->save($user))
            {
                // $firstName = $user->first_name;
                // $lastName = $user->last_name;
                // $fullName = $firstname." ".$lastName;
                // $this->set('fullNam1e', $fullName);
                // echo $firstName;
                // echo $lastName;

                //$query = "CREATE TABLE log_".$firstName."_".$lastName."";

                $this->redirect(['action' => 'login']);
            }
        }
    }

    /**
     * Login method
     *
     * After doing a submit on the login form ('login.ctp') it will @method identify, if the correct credentials have been filled in.
     * If so, the last_login_at value in the DataSet will be updated and you'll be redirected to the dashboard.
     * If not, you'll be prompted that you haven't entered the correct credentials.
     */
    public function login()
    {
        if ($this->request->is('post'))
        {
            $user = $this->Auth->identify($this->request->data);

            if ($user)
            {
                $this->Auth->setUser($user);

                $table = TableRegistry::get('Users');
                $field = 'last_login_at';
                $userData = $table->get($this->Auth->user('ID'));

                $userData->$field = Time::now();
                $table->save($userData);

                $this->redirect($this->Auth->redirectUrl('/'));

            }
            else
            {
                $this->Flash->error('The Username or Password is incorrect');
            }
        }
    }

    /**
     * Logout method
     *
     * When pressing on logout, you'll be logged out and redirected to login.
     */
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
}
