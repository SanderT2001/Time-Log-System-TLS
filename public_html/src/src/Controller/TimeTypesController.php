<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TimeTypes Controller
 *
 * @property \App\Model\Table\TimeTypesTable $TimeTypes
 *
 * @method \App\Model\Entity\TimeType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TimeTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $timeTypes = $this->paginate($this->TimeTypes);

        $this->set(compact('timeTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Time Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $timeType = $this->TimeTypes->get($id, [
            'contain' => ['Logs']
        ]);

        $this->set('timeType', $timeType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $timeType = $this->TimeTypes->newEntity();
        if ($this->request->is('post')) {
            $timeType = $this->TimeTypes->patchEntity($timeType, $this->request->getData());
            if ($this->TimeTypes->save($timeType)) {
                $this->Flash->success(__('The time type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The time type could not be saved. Please, try again.'));
        }
        $this->set(compact('timeType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Time Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $timeType = $this->TimeTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $timeType = $this->TimeTypes->patchEntity($timeType, $this->request->getData());
            if ($this->TimeTypes->save($timeType)) {
                $this->Flash->success(__('The time type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The time type could not be saved. Please, try again.'));
        }
        $this->set(compact('timeType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Time Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $timeType = $this->TimeTypes->get($id);
        if ($this->TimeTypes->delete($timeType)) {
            $this->Flash->success(__('The time type has been deleted.'));
        } else {
            $this->Flash->error(__('The time type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
