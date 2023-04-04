<?php
App::uses('AppController', 'Controller');

class RobotsController extends AppController {

	public function index() {
		$this->Paginator->settings = array(
			'limit' => 20,
			'order' => array('Robot.created' => 'desc'),
		);
		$robots = $this->Paginator->paginate('Robot');

		$this->set(compact('robots'));
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
				$this->Flash->success(__('O robô foi salvo.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('O robô não pôde ser salvo. Por favor, tente novamente.'));
			}
		}
	}

	public function edit($id = null) {
		if (!$this->Robot->exists($id)) {
			throw new NotFoundException(__('Robô inválido'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Robot->save($this->request->data)) {
				$this->Flash->success(__('O robô foi salvo.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('O robô não pôde ser salvo. Por favor, tente novamente.'));
			}
		} else {
			$options = array('conditions' => array('Robot.' . $this->Robot->primaryKey => $id));
			$this->request->data = $this->Robot->find('first', $options);
		}
	}

	public function delete($id = null) {
		if (!$this->Robot->exists($id)) {
			throw new NotFoundException(__('Robô inválido'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Robot->delete($id)) {
			$this->Flash->success(__('O robô foi excluído.'));
		} else {
			$this->Flash->error(__('O robô não pôde ser excluído. Por favor, tente novamente.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
