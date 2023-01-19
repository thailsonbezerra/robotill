<?php
App::uses('AppController', 'Controller');
/**
 * TicketComments Controller
 *
 * @property TicketComment $TicketComment
 * @property PaginatorComponent $Paginator
 */
class TicketCommentsController extends AppController {

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
		$this->TicketComment->recursive = 0;
		$this->set('ticketComments', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TicketComment->exists($id)) {
			throw new NotFoundException(__('Invalid ticket comment'));
		}
		$options = array('conditions' => array('TicketComment.' . $this->TicketComment->primaryKey => $id));
		$this->set('ticketComment', $this->TicketComment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TicketComment->create();
			if ($this->TicketComment->save($this->request->data)) {
				$this->Flash->success(__('The ticket comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The ticket comment could not be saved. Please, try again.'));
			}
		}
		$tickets = $this->TicketComment->Ticket->find('list');
		$this->set(compact('tickets'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->TicketComment->exists($id)) {
			throw new NotFoundException(__('Invalid ticket comment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TicketComment->save($this->request->data)) {
				$this->Flash->success(__('The ticket comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The ticket comment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TicketComment.' . $this->TicketComment->primaryKey => $id));
			$this->request->data = $this->TicketComment->find('first', $options);
		}
		$tickets = $this->TicketComment->Ticket->find('list');
		$this->set(compact('tickets'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->TicketComment->exists($id)) {
			throw new NotFoundException(__('Invalid ticket comment'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->TicketComment->delete($id)) {
			$this->Flash->success(__('The ticket comment has been deleted.'));
		} else {
			$this->Flash->error(__('The ticket comment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
