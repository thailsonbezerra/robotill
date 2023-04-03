<?php
App::uses('AppController', 'Controller');
class TicketsController extends AppController {

	public function index() {
	
		$conditions = array();

		$inicio = empty($this->request->data['Ticket']['start_date']) ? '0001-01-01' : $this->request->data['Ticket']['start_date'];
		$fim = empty($this->request->data['Ticket']['end_date']) ? date("Y-m-d") : $this->request->data['Ticket']['end_date'];
		
		$conditions['date(Ticket.created) BETWEEN ? AND ?'] = array(
			$inicio,
			$fim
		);

		if (!empty($this->request->data['Ticket']['title'])) {
			$conditions['Ticket.title ILIKE'] = '%' . $this->request->data['Ticket']['title'] . '%';
		}

		if (!empty($this->request->data['Ticket']['type_robot'])) {
			$conditions['Ticket.robot_id'] = $this->request->data['Ticket']['type_robot'];
		}

		if (!empty($this->request->data['Ticket']['status'])) {
			$conditions['Ticket.open'] = $this->request->data['Ticket']['status'] === 'close' ?  false : true; 
		}

		$this->Ticket->order = array('Ticket.created DESC');

		$this->Paginator->settings = array(
			'limit' => 5,
			'order' => array('Ticket.created' => 'desc'),
			'conditions' => $conditions
		);
		$tickets = $this->Paginator->paginate('Ticket');

		$tipo = $this->Ticket->Robot->find(
			'list',
			array(
				'fields' => array('Robot.type')
			)
		);

		$this->set(compact('tickets','tipo'));
	
	}

	public function add() {
		if ($this->request->is('post')) {
			$user_id = $this->Session->read('user_id');
			$manager_id = $this->Session->read('manager_id');


			$users = $this->Ticket->User->find('list', array(
				'fields' => 'User.manager_id',
				'conditions' => array('User.id =' => $user_id)
			));

			$sql_name_curt_manager = "SELECT name_curt from managers WHERE id =". $manager_id;
			$result_name_curt_manager = $this->Ticket->Robot->query($sql_name_curt_manager);
			$name_curt_manager = $result_name_curt_manager[0][0]['name_curt'];

			$robot_id = $this->request->data['Ticket']['robot_id'];
			$sql_type_curt_robot = "SELECT type_curt from robots where id = " . $robot_id;
			$result_type_curt_robot = $this->Ticket->Robot->query($sql_type_curt_robot);
			$type_curt_robot = $result_type_curt_robot[0][0]['type_curt'];

			$this->request->data['Ticket']['user_id'] = $user_id;
			$this->request->data['Ticket']['manager_id'] = $users[$user_id];
			$this->request->data['Ticket']['open'] = true;
			$this->request->data['Ticket']['cod'] = $name_curt_manager.$type_curt_robot;

			$this->Ticket->create();

			if ($this->Ticket->save($this->request->data)) {
				$ticket_id = $this->Ticket->getLastInsertID();
				$data_ticket_comment = [
					'TicketComment' => [
						'comment' => $this->request->data['Ticket']['comment'],
						'user_id' => $user_id,
						'ticket_id' => $ticket_id,
					]
				];

				$this->Ticket->TicketComment->create();
				$this->Ticket->TicketComment->save($data_ticket_comment);
				$this->Ticket->TicketComment->clear();
				$this->Flash->success('Ticket aberto com sucesso.');
				return $this->redirect('/');
			} else {
				$this->Flash->error(__('Não foi possível salvar o Ticket. Por favor, tente novamente.'));
			}
		}


		$robots = $this->Ticket->Robot->find('list', array(
			'fields' => array('Robot.type')
		));
		
		$this->set(compact('robots'));
	}

	public function edit($id = null) {
		if (!$this->Ticket->exists($id)) {
			throw new NotFoundException(__('Ticket Inválido'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->Ticket->id = $id;

			$user_id = $this->Session->read('user_id');
			$manager_id = $this->Session->read('manager_id');


			$users = $this->Ticket->User->find('list', array(
				'fields' => 'User.manager_id',
				'conditions' => array('User.id =' => $user_id)
			));

			$this->request->data['Ticket']['user_id'] = $user_id;
			$this->request->data['Ticket']['manager_id'] = $users[$user_id];
			
			if ($this->Ticket->save($this->request->data)) {
				$data_ticket_comment = [
					'TicketComment' => [
						'comment' => $this->request->data['Ticket']['comment'],
						'user_id' => $user_id,
						'ticket_id' => $id,
					]
				];

				$codigoChamado = $this->Ticket->find('list', array(
					'fields' => 'Ticket.cod',
					'conditions' => array('Ticket.id =' => $id)
				));

				$this->Ticket->TicketComment->create();
				$this->Ticket->TicketComment->save($data_ticket_comment);
				$this->Ticket->TicketComment->clear();

				if($this->request->data['Ticket']['open']){
					$this->Flash->success('Interação ao ticket ' . $codigoChamado[$id] . $id . ' realizada com sucesso.');
				} else {
					$this->Flash->success('Ticket ' . $codigoChamado[$id] . $id . ' fechado com sucesso.');
				}

			

				return $this->redirect('/');
			} else {
				$this->Flash->error(__('Não foi possível salvar o Ticket. Por favor, tente novamente.'));
			}
		} else {
			$options = array('conditions' => array('Ticket.' . $this->Ticket->primaryKey => $id));
			$this->request->data = $this->Ticket->find('first', $options);
		}
		$tickets = $this->Ticket->find('all',array(
			'conditions'=> array('Ticket.id =' => $id))
		);

		$users_ticket_comments = $this->Ticket->User->query('select * from users u inner join ticket_comments tc on (tc.user_id = u.id) where tc.ticket_id = '. $id);
		
		$this->set(compact('tickets', 'users_ticket_comments'));
	}

}
