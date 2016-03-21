<?php

class Item extends ComercialAppModel
{
    public $useTable = 'itens';

    public $belongsTo = array('Produto');

    public function findByPedidoIdAndProdutoId($pedido_id = null, $produto_id = nuull)
    {
        if (empty($pedido_id) || empty($produto_id)) {
            return false;
        }

        return $this->find('first', array(
            'conditions' => array('pedido_id' => $pedido_id, 'produto_id' => $produto_id),
            'recursive' => -1,
            'callbacks' => false
        ));
    }

    public function findByPedidoId($pedido_id = null)
    {
        if (empty($pedido_id)) {
            return false;
        }

        return $this->find('all', array('conditions' => array('pedido_id' => $pedido_id)));
    }
}