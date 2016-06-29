<?php
class AddFieldUserIdToPedidos extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'AddFieldUserIdToPedidos';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
			'create_field' => array(
				'pedidos' => array(
					'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'after' => 'observacoes'),
				),
			),
		),
		'down' => array(
			'drop_field' => array(
				'pedidos' => array('user_id'),
			),
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function after($direction) {
		return true;
	}
}
