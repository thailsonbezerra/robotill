<?php
App::uses('AppController', 'Controller');
class UsersController extends AppController
{
	
	public function index()
	{
		if(intval($this->Auth->user('role')) !== 0){
			$manager_id = $this->Auth->user('manager_id');
			$users = $this->User->find('all', array('conditions' => array('User.manager_id' => $manager_id)));
		} else {
			$this->Paginator->settings = array(
				'limit' => 10,
				'order' => array('User.created' => 'desc'),
			);
			$users = $this->Paginator->paginate('User');

		}
		
		$this->set(compact('users'));
	}

	public function view($id = null)
	{
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Usuário inválido'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

	
	public function add()
	{
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('O usuário foi criado com sucesso.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('O usuário não pôde ser edicionado. Por favor, tente novamente.'));
			}
		}
		$managers = $this->User->Manager->find('list');
		$this->set(compact('managers'));
	}

	
	public function edit($id)
	{
		$user = $this->User->findById($id);
		if (!$user) {
			throw new NotFoundException(__('Usuário inválido'));
		}

		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('O usuário foi salvo.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('O usuário não pôde ser editado. Por favor, tente novamente.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$managers = $this->User->Manager->find('list');
		$this->set(compact('user','managers'));
	}

	
	public function delete($id = null)
	{
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Usuário inválido'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete($id)) {
			$this->Flash->success(__('O usuário foi excluído.'));
		} else {
			$this->Flash->error(__('O usuário não pôde ser excluído. Por favor, tente novamente.'));
		}
		return $this->redirect(array('action' => 'index'));
	}


	public function login()
	{
		$this->layout = 'login';
		if($this->request->is('post')){
			if($this->Auth->login()){
				$user_id = $this->Auth::user('id');
				$manager_id = $this->Auth::user('manager_id');
				$this->Session->write('user_id',$user_id);
				$this->Session->write('manager_id', $manager_id);
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Flash->error(__('Usuário ou senha incorretos.'));
		}
	}

	public function logout(){
		$this->Auth->logout();
		$this->redirect('/login');
	}

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('login', 'logout');
		$this->loadModel('Manager');
		$this->Manager->recursive = -1;
	}
}
