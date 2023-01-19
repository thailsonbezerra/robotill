<?php
App::uses('Manager', 'Model');

/**
 * Manager Test Case
 */
class ManagerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.manager',
		'app.ticket',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Manager = ClassRegistry::init('Manager');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Manager);

		parent::tearDown();
	}

}
