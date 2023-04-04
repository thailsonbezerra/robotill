<?php
App::uses('AppController', 'Controller');
class ManagersController extends AppController {

	public $components = array('Paginator');


	public function index() {
		$this->Paginator->settings = array(
			'limit' => 20,
			'order' => array('Manager.created' => 'desc'),
		);
		$managers = $this->Paginator->paginate('Manager');

		$this->set(compact('managers'));
	}


	public function view($id = null) {
		if (!$this->Manager->exists($id)) {
			throw new NotFoundException(__('Gestor inválido'));
		}
		$options = array('conditions' => array('Manager.' . $this->Manager->primaryKey => $id));
		$manager = $this->Manager->find('first', $options);
		$robots = $this->Manager->Ticket->Robot->find('list',array('fields'=> 'type_curt'));
		$this->set(compact('manager','robots'));
	}


	public function add() {
		if ($this->request->is('post')) {
			$this->Manager->create();
			if ($this->Manager->save($this->request->data)) {
				$this->Flash->success(__('O Gestor foi salvo.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('O Gestor não pôde ser salvo. Por favor, tente novamente.'));
			}
		}
	}


	public function edit($id = null) {
		if (!$this->Manager->exists($id)) {
			throw new NotFoundException(__('Gestor inválido'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Manager->save($this->request->data)) {
				$this->Flash->success(__('O Gestor foi salvo.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('O Gestor não pôde ser salvo. Por favor, tente novamente.'));
			}
		} else {
			$options = array('conditions' => array('Manager.' . $this->Manager->primaryKey => $id));
			$this->request->data = $this->Manager->find('first', $options);
		}

		$managers = $this->Manager->find('list');
		$this->set(compact('managers'));
	}


	public function delete($id = null) {
		if (!$this->Manager->exists($id)) {
			throw new NotFoundException(__('Gestor inválido'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Manager->delete($id)) {
			$this->Flash->success(__('O Gestor foi excluído.'));
		} else {
			$this->Flash->error(__('O Gestor não pôde ser excluído. Por favor, tente novamente.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
