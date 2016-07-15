<?php
namespace PluginComercial\Model\Table;

use Cake\ORM\Table;
use Cake\Model\Table\ArrayObject;
use Cake\Event\Event;

class PedidosTable extends Table
{
    public function initialize(array $config)
    {
        $this->belongsTo('Clientes', [
            'className' => 'PluginComercial.Clientes',
            'foreignKey' => 'cliente_id'
        ]);

        $this->hasMany('Itens', [
            'className' => 'PluginComercial.Itens',
            'foreignKey' => 'pedido_id'
        ]);
    }

    public function beforeMarshal(Event $event, \ArrayObject $data, \ArrayObject $options) {
        if (!empty($data['Pedidos']['cliente_id'])) {
            unset($data['Cliente']);
        }
    }

    public function afterSave($created, $options = array())
    {
        if ($created) {
            $this->status = 1;
        }
    }

    public function statusAguardando($id = null, $sequence = true)
    {
        if (empty($id)) {
            return false;
        }

        $this->id = $id;

        $change = ($sequence) ? ($this->field('status') == 1) : true;
        if ($change) {
            $this->status = 2;
        }

        return true;
    }

    public function statusConfirmado($id = null, $sequence = true)
    {
        if (empty($id)) {
            return false;
        }

        $this->id = $id;

        $change = ($sequence) ? ($this->field('status') == 2) : true;
        if ($change) {
            $this->status = 3;
        }

        return true;
    }

    public function getProximoNumero()
    {
        $pedido = $this->find('all', array('order' => array('Pedidos.id' => 'DESC')))->first();
        return isset($pedido['Pedidos']['id']) ? $pedido['Pedidos']['id'] + 1 : 1;
    }

    public function getSaveProximoNumero($id_usuario = null)
    {
        $id = $this->getProximoNumero();
        $this->id = $id;
        $this->numero = $id;

        if (!empty($id_usuario)) {
            $this->usuario_id = $id_usuario;
        }

        return $id;
    }
}
