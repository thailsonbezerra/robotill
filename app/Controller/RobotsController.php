<?php
App::uses('AppController', 'Controller');
/**
 * Robots Controller
 *
 * @property Robot $Robot
 * @property PaginatorComponent $Paginator
 */
class RobotsController extends AppController {

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
		$this->Robot->recursive = 0;
		$this->set('robots', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Robot->exists($id)) {
			throw new NotFoundException(__('Invalid robot'));
		}
		$options = array('conditions' => array('Robot.' . $this->Robot->primaryKey => $id));
		$robot = $this->Robot->find('first', $options);

		$managers = $this->Robot->Ticket->Manager->find('list', array('fields' => 'name_curt'));
		$this->set(compact('robot','managers') );
	}

/**
 * add method
 *
 * @return void
 */
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

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
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

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
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
