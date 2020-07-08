<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Event\EventInterface;
use Cake\ORM\TableRegistry;

/**
 * Shopping Controller
 *
 * @property \App\Model\Table\ShoppingTable $Shopping
 * @method \App\Model\Entity\Shopping[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ShoppingController extends AppController
{
	public function beforeFilter(EventInterface $event){
	  parent::beforeFilter($event);
	  $this->Auth->allow(['addCart', 'showCart']);
	}
	/**
	 * Index method
	 *
	 * @return \Cake\Http\Response|null|void Renders view
	 */
	public function index()
	{
		if($this->Auth->user('type') != 1){
		  $this->redirect(['controller' => 'pages']);
		}
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
		if($this->Auth->user('type') != 1){
		  $this->redirect(['controller' => 'pages']);
		}
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
		if($this->Auth->user('type') != 1){
		  $this->redirect(['controller' => 'pages']);
		}
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
		if($this->Auth->user('type') != 1){
		  $this->redirect(['controller' => 'pages']);
		}
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
		if($this->Auth->user('type') != 1){
		  $this->redirect(['controller' => 'pages']);
		}
		$this->request->allowMethod(['post', 'delete']);
		$shopping = $this->Shopping->get($id);
		if ($this->Shopping->delete($shopping)) {
			$this->Flash->success(__('The shopping has been deleted.'));
		} else {
			$this->Flash->error(__('The shopping could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'index']);
	}
	public function addCart($id = null){

		$sessionObj = $this->getRequest()->getSession();
		if(isset($sessionObj->read()['cart'])){
			$cart = $sessionObj->read()['cart'];
			if(isset($cart[$id])){
				$cart[$id] = $cart[$id] + 1;
			}
			else{
				$cart[$id] = 1;
			}
		}
		else{            
			$cart = [$id => 1];
		}
		$sessionObj->write('cart', $cart);
		return $this->redirect($this->referer());        
	}
	public function showCart($id = null){
		$sessionObj = $this->getRequest()->getSession();
		if(isset($sessionObj->read()['cart'])){
			$cart = $sessionObj->read()['cart'];
			$productsTable = TableRegistry::get('Products');
			$products = $productsTable->findProducts($cart);
		}
		else{
			$products = null;
			$cart = null;
		}
		$this->set(compact('cart', 'products'));
	}

	public function finishShopping()
	{
		$sessionObj = $this->getRequest()->getSession();
		if(isset($sessionObj->read()['cart'])){
			$success = 0;
			$cart = $sessionObj->read()['cart'];
			$shoppingEpt = $this->Shopping->newEmptyEntity();
			foreach ($cart as $key => $quantity) {
				$insert = ['user_id' => $this->Auth->user('id'), 'product_id' => $key, 'quantity' => $quantity];
				$shopping = $this->Shopping->patchEntity($shoppingEpt, $insert);
				if ($this->Shopping->save($shopping)) {
					unset($cart[$key]);
					$success++;
				}
				else{
					$this->Flash->error(__('Não foi possivel realizar a compra de um item, favor, checar no carrinho de compras'));					
				}
			}	
			$this->Flash->success(__($success . ' Itens foram comprados com sucesso'));
			$sessionObj->write('cart', $cart);	
		}
		return $this->redirect($this->referer());
	}
}
