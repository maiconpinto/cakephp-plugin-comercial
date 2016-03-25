<?php

class Pedido extends ComercialAppModel
{
    public $useTable = 'pedidos';

    public $belongsTo = array('Comercial.Cliente');

    public $hasMany = array(
        'Itens' => array(
            'className' => 'Comercial.Item',
            'foreignKey' => 'pedido_id'
        )
    );

    public function afterSave($created, $options = array())
    {
        if ($created) {
            $this->saveField('status', '1');
        }
    }

    public function statusAndamento($id = null, $sequence = true)
    {
        if (empty($id)) {
            return false;
        }
        
        $this->id = $id;

        $change = ($sequence) ? ($this->field('status') == 1) : true;
        if ($change) {
            $this->saveField('status', 2);
        }

        return true;
    }

    public function statusAguardando($id = null, $sequence = true)
    {
        if (empty($id)) {
            return false;
        }
        
        $this->id = $id;

        $change = ($sequence) ? ($this->field('status') == 2) : true;
        if ($change) {
            $this->saveField('status', 3);
        }

        return true;
    }

}