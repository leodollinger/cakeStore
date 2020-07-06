<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Shopping Controller
 *
 * @property \App\Model\Table\ShoppingTable $Shopping
 * @method \App\Model\Entity\Shopping[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ShoppingController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Products'],
        ];
        $shopping = $this->paginate($this->Shopping);

        $this->set(compact('shopping'));
    }

    /**
     * View method
     *
     * @param string|null $id Shopping id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $shopping = $this->Shopping->get($id, [
            'contain' => ['Users', 'Products'],
        ]);

        $this->set(compact('shopping'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $shopping = $this->Shopping->newEmptyEntity();
        if ($this->request->is('post')) {
            $shopping = $this->Shopping->patchEntity($shopping, $this->request->getData());
            if ($this->Shopping->save($shopping)) {
                $this->Flash->success(__('The shopping has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The shopping could not be saved. Please, try again.'));
        }
        $users = $this->Shopping->Users->find('list', ['limit' => 200]);
        $products = $this->Shopping->Products->find('list', ['limit' => 200]);
        $this->set(compact('shopping', 'users', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Shopping id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $shopping = $this->Shopping->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $shopping = $this->Shopping->patchEntity($shopping, $this->request->getData());
            if ($this->Shopping->save($shopping)) {
                $this->Flash->success(__('The shopping has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The shopping could not be saved. Please, try again.'));
        }
        $users = $this->Shopping->Users->find('list', ['limit' => 200]);
        $products = $this->Shopping->Products->find('list', ['limit' => 200]);
        $this->set(compact('shopping', 'users', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Shopping id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $shopping = $this->Shopping->get($id);
        if ($this->Shopping->delete($shopping)) {
            $this->Flash->success(__('The shopping has been deleted.'));
        } else {
            $this->Flash->error(__('The shopping could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
