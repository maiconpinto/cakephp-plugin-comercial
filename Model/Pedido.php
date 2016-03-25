<?php

class Pedido extends ComercialAppModel
{
    public $useTable = 'pedidos';

    public function afterSave($created, $options = array())
    {
        if ($created) {
            $this->saveField('status', '1');
        }
    }

    public function statusConferindo($id = null)
    {
        if (empty($id)) {
            return false;
        }
        
        $this->id = $id;
        if ($this->field('status') == 1) {
            $this->saveField('status', 2);
        }
        return true;
    }

}