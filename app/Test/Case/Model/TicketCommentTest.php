<?php
App::uses('TicketComment', 'Model');

/**
 * TicketComment Test Case
 */
class TicketCommentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ticket_comment',
		'app.ticket',
		'app.robot',
		'app.manager',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TicketComment = ClassRegistry::init('TicketComment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TicketComment);

		parent::tearDown();
	}

}
