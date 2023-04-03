<?php
App::uses('AppController', 'Controller');

class RobotsController extends AppController {

	public function index() {
		$this->Robot->recursive = 0;
		$this->set('robots', $this->Paginator->paginate());
	}

	public function view($id = null) {
		if (!$this->Robot->exists($id)) {
			throw new NotFoundException(__('Robô inválido'));
		}

		$managers = $this->Robot->Ticket->Manager->find('list', array('fields' => 'name_curt'));
		$robot = $this->Robot->find('first', array('conditions' => array('Robot.' . $this->Robot->primaryKey => $id)));

		$this->set(compact('robot','managers') );
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Robot->create();
			if ($this->Robot->save($this->request->data)) {
				$this->Flash->success(__('The robot has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The robot could not be saved. Please, try again.'));
			}
		}
	}

	public function edit($id = null) {
		if (!$this->Robot->exists($id)) {
			throw new NotFoundException(__('Invalid robot'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Robot->save($this->request->data)) {
				$this->Flash->success(__('The robot has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The robot could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Robot.' . $this->Robot->primaryKey => $id));
			$this->request->data = $this->Robot->find('first', $options);
		}
	}

	public function delete($id = null) {
		if (!$this->Robot->exists($id)) {
			throw new NotFoundException(__('Invalid robot'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Robot->delete($id)) {
			$this->Flash->success(__('The robot has been deleted.'));
		} else {
			$this->Flash->error(__('The robot could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
