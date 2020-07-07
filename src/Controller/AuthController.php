<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\ORM\Table;
use Cake\Event\EventInterface;

class AuthController extends AppController
{
	public function login(){
		$userTable = TableRegistry::get('Users');
		$user = $userTable->newEmptyEntity();
		if ($this->request->is('post')) {
			var_dump($this->Auth->password('asdasd'));
			die;
			// $user = $this->Auth->identify();

			$user = $userTable->patchEntity($user, $this->request->getData());

			if ($userTable->save($user)) {
				$this->Flash->success(__('The user has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The user could not be saved. Please, try again.'));
		}
		$this->set(compact('user'));
	}

	public function logout(){

	}

	public function register(){
		$userTable = TableRegistry::get('Users');
		$user = $userTable->newEmptyEntity();
		if ($this->request->is('post')) {
			$user = $userTable->patchEntity($user, $this->request->getData());
			if ($userTable->save($user)) {
				$this->Flash->success(__('The user has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The user could not be saved. Please, try again.'));
		}
		$this->set(compact('user'));
	}

}
