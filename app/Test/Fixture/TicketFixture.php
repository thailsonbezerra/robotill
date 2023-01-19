<?php
/**
 * Ticket Fixture
 */
class TicketFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 11, 'key' => 'primary'),
		'open' => array('type' => 'boolean', 'null' => true, 'default' => true),
		'cod' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'robot_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'manager_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('unique' => true, 'column' => 'id')
		),
		'tableParameters' => array()
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'open' => 1,
			'cod' => 'Lorem ipsum dolor sit amet',
			'created' => '2023-01-19 12:06:55',
			'modified' => '2023-01-19 12:06:55',
			'robot_id' => 1,
			'manager_id' => 1
		),
	);

}
