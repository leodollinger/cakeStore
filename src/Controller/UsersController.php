<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Event\EventInterface;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController{

  public function initialize(): void{
    parent::initialize();
    $this->loadComponent('Security');
  }

  public function beforeFilter(EventInterface $event){
    parent::beforeFilter($event);
    $this->Auth->allow(['register']);
    $this->Security->setConfig('unlockedActions', ['login', 'register']);
  }
  /**
   * Index method
   *
   * @return \Cake\Http\Response|null|void Renders view
   */
  public function index(){
    if($this->Auth->user('type') != 1){
      $this->redirect(['controller' => 'pages']);
    }
    $users = $this->paginate($this->Users);

    $this->set(compact('users'));
  }

  /**
   * View method
   *
   * @param string|null $id User id.
   * @return \Cake\Http\Response|null|void Renders view
   * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
   */
  public function view($id = null){
    if($this->Auth->user('type') != 1){
      $this->redirect(['controller' => 'pages']);
    }
    $user = $this->Users->get($id, [
      'contain' => ['Shopping'],
    ]);
    $this->set(compact('user'));
  }

  /**
   * Add method
   *
   * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
   */
  public function add(){
    if($this->Auth->user('type') != 1){
      $this->redirect(['controller' => 'pages']);
    }
    $user = $this->Users->newEmptyEntity();
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
   * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
   * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
   */
  public function edit($id = null){
    if($this->Auth->user('type') != 1){
      $this->redirect(['controller' => 'pages']);
    }
    $user = $this->Users->get($id, [
      'contain' => [],
    ]);
    if ($this->request->is(['patch', 'post', 'put'])) {
      $user = $this->Users->patchEntity($user, $this->request->getData());
      if($this->Users->save($user)){
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
   * @return \Cake\Http\Response|null|void Redirects to index.
   * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
   */
  public function delete($id = null){
    if($this->Auth->user('type') != 1){
      $this->redirect(['controller' => 'pages']);
    }
    $this->request->allowMethod(['post', 'delete']);
    $user = $this->Users->get($id);
    if($this->Users->delete($user)){
      $this->Flash->success(__('The user has been deleted.'));
    } else {
      $this->Flash->error(__('The user could not be deleted. Please, try again.'));
    }
    return $this->redirect(['action' => 'index']);
  }

  public function login(){
    if($this->request->is('post')){
      $user = $this->Auth->identify();
      if($user){
        $this->Auth->setUser($user);
        if($user['type'] == 0){
          return $this->redirect(['controller' => 'Pages', 'action' => 'index']);
        }
        else{
          return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        }
      }
    }
  }
    
  public function logout(){
    $user = $this->Auth->user();    
    $sessionObj = $this->getRequest()->getSession();
    $sessionObj->destroy();
    return $this->redirect($this->Auth->logout());
  }

    public function register()
    {        
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            if($data['password'] == $data['passwordConf']){
                $user = $this->Users->patchEntity($user, $this->request->getData());
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Usuário criado com sucesso.'));
                    return $this->redirect(['controller' => 'pages', 'action' => 'index']);
                }
                $this->Flash->error(__('Usuário não foi criado. Favor, tente novamente.'));                
            }
            $this->Flash->error(__('Senha e confirmação de senha não batem.'));
    }
    $this->set(compact('user'));
  }
}
