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

    public function beforeValidate($options = array()) {
        if (!empty($this->data['Pedido']['cliente_id'])) {
            unset($this->data['Cliente']);
        }

        return true;
    }
    
    public function afterSave($created, $options = array())
    {
        if ($created) {
            $this->saveField('status', '1');
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
            $this->saveField('status', 2);
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
            $this->saveField('status', 3);
        }

        return true;
    }
    
    public function getProximoNumero()
    {
        $pedido = $this->find('first', array('order' => array('Pedido.id' => 'DESC')));
        return isset($pedido['Pedido']['id']) ? $pedido['Pedido']['id'] + 1 : 1;
    }
    
    public function getSaveProximoNumero($id_user = null)
    {
        $id = $this->getProximoNumero();
        $this->id = $id;
        $this->saveField('numero', $id);

        if (!empty($id_user)) {
            $this->saveField('user_id', $id_user);
        }
        
        return $id;
    }
}