<?php
namespace PluginComercial\Model\Table;

use Cake\ORM\Table;

class ItensTable extends Table
{

    public function initialize(array $config)
    {
        $this->displayField('nome');

        $this->belongsTo('Pedido', [
            'className' => 'PluginComercial.Pedidos',
            'foreignKey' => 'pedido_id'
        ]);
    }
}
