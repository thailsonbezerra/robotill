<?php
App::uses('AppController', 'Controller');
/**
 * Tickets Controller
 *
 * @property Ticket $Ticket
 * @property PaginatorComponent $Paginator
 */
class TicketsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Ticket->recursive = 0;
		$this->set('tickets', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Ticket->exists($id)) {
			throw new NotFoundException(__('Invalid ticket'));
		}
		$options = array('conditions' => array('Ticket.' . $this->Ticket->primaryKey => $id));
		$this->set('ticket', $this->Ticket->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Ticket->create();
			if ($this->Ticket->save($this->request->data)) {
				$this->Flash->success(__('The ticket has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The ticket could not be saved. Please, try again.'));
			}
		}

		$user_id =$this->Session->read('user_id');

		$robots = $this->Ticket->Robot->find('list', array(
			'fields' => array('Robot.type')
		));
		$managers = $this->Ticket->Manager->find('list',array(
			'fields'=>'Manager.name_curt'
		));
		$users = $this->Ticket->User->find('list',array(
			'fields'=>'User.manager_id',
			'conditions' => array('User.id =' => $user_id)
		));
		
		$this->request->data['Ticket']['open'] = true;
		$this->request->data['Ticket']['user_id']= $user_id;
		$this->request->data['Ticket']['manager_id']= $users=[$user_id];
		$this->set(compact('robots', 'managers','users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Ticket->exists($id)) {
			throw new NotFoundException(__('Invalid ticket'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Ticket->save($this->request->data)) {
				$this->Flash->success(__('The ticket has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The ticket could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Ticket.' . $this->Ticket->primaryKey => $id));
			$this->request->data = $this->Ticket->find('first', $options);
		}
		$robots = $this->Ticket->Robot->find('list');
		$managers = $this->Ticket->Manager->find('list');
		$this->set(compact('robots', 'managers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->Ticket->exists($id)) {
			throw new NotFoundException(__('Invalid ticket'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Ticket->delete($id)) {
			$this->Flash->success(__('The ticket has been deleted.'));
		} else {
			$this->Flash->error(__('The ticket could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
