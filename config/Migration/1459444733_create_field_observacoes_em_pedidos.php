<?php
class CreateFieldObservacoesEmPedidos extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'create_field_observacoes_em_pedidos';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
			'create_field' => array(
				'pedidos' => array(
					'observacoes' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1', 'after' => 'status'),
				),
			),
		),
		'down' => array(
			'drop_field' => array(
				'pedidos' => array('observacoes'),
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
