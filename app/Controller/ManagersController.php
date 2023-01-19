<?php
App::uses('AppController', 'Controller');
/**
 * Managers Controller
 *
 * @property Manager $Manager
 * @property PaginatorComponent $Paginator
 */
class ManagersController extends AppController {

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
		$this->Manager->recursive = 0;
		$this->set('managers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Manager->exists($id)) {
			throw new NotFoundException(__('Invalid manager'));
		}
		$options = array('conditions' => array('Manager.' . $this->Manager->primaryKey => $id));
		$this->set('manager', $this->Manager->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Manager->create();
			if ($this->Manager->save($this->request->data)) {
				$this->Flash->success(__('The manager has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The manager could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Manager->exists($id)) {
			throw new NotFoundException(__('Invalid manager'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Manager->save($this->request->data)) {
				$this->Flash->success(__('The manager has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The manager could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Manager.' . $this->Manager->primaryKey => $id));
			$this->request->data = $this->Manager->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->Manager->exists($id)) {
			throw new NotFoundException(__('Invalid manager'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Manager->delete($id)) {
			$this->Flash->success(__('The manager has been deleted.'));
		} else {
			$this->Flash->error(__('The manager could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
