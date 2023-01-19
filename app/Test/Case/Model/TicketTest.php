<?php
App::uses('Ticket', 'Model');

/**
 * Ticket Test Case
 */
class TicketTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ticket',
		'app.robot',
		'app.manager',
		'app.user',
		'app.ticket_comment'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Ticket = ClassRegistry::init('Ticket');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ticket);

		parent::tearDown();
	}

}
