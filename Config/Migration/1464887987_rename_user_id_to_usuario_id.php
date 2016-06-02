<?php
class RenameUserIdToUsuarioId extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'rename_user_id_to_usuario_id';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
			'create_field' => array(
				'pedidos' => array(
					'usuario_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'after' => 'observacoes'),
				),
			),
			'drop_field' => array(
				'pedidos' => array('user_id'),
			),
		),
		'down' => array(
			'drop_field' => array(
				'pedidos' => array('usuario_id'),
			),
			'create_field' => array(
				'pedidos' => array(
					'user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
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
