<?php
class SetDefaultsPedidos extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'set_defaults_pedidos';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
			'alter_field' => array(
				'pedidos' => array(
					'cliente_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false),
					'status' => array('type' => 'integer', 'null' => false, 'default' => '1', 'unsigned' => false),
					'observacoes' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
				),
			),
		),
		'down' => array(
			'alter_field' => array(
				'pedidos' => array(
					'cliente_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
					'status' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
					'observacoes' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
				),
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
