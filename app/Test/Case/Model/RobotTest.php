<?php
App::uses('Robot', 'Model');

/**
 * Robot Test Case
 */
class RobotTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.robot',
		'app.ticket'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Robot = ClassRegistry::init('Robot');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Robot);

		parent::tearDown();
	}

}
