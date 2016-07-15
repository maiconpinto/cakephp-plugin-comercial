<?php
namespace PluginComercial\Model\Table;

use Cake\ORM\Table;

class ClientesTable extends Table
{
    public function initialize(array $config)
    {
        $this->displayField('nome');

        $this->addBehavior('Timestamp');

        $this->hasMany('Pedidos', [
            'className' => 'PluginComercial.Pedidos',
            'foreignKey' => 'pedido_id'
        ]);
    }
}
