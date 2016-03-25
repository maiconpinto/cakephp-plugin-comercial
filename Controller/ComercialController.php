<?php

App::uses('ComercialAppController', 'Comercial.Controller');

class ComercialController extends ComercialAppController
{
    public $uses = array('Comercial.Pedido');

    public function index()
    {
        $pedidos = $this->Pedido->find('count');
        $pendentes = $this->Pedido->find('count', array('conditions' => array('Pedido.status' => '1')));
        $andamento = $this->Pedido->find('count', array('conditions' => array('Pedido.status' => '2')));
        $aguardando = $this->Pedido->find('count', array('conditions' => array('Pedido.status' => '3')));
        
        $this->set(compact('pedidos', 'pendentes', 'andamento', 'aguardando'));
    }

    public function pedidos()
    {
        $pedidos = $this->Pedido->find('all');

        $this->set(compact('pedidos'));
    }

    public function pendentes()
    {
        $pedidos = $this->Pedido->find('all', array('conditions' => array('Pedido.status' => '1')));
        
        $this->set(compact('pedidos'));
    }

    public function andamento()
    {
        $pedidos = $this->Pedido->find('all', array('conditions' => array('Pedido.status' => '2')));
        
        $this->set(compact('pedidos'));
    }

    public function aguardando()
    {
        $pedidos = $this->Pedido->find('all', array('conditions' => array('Pedido.status' => '3')));
        
        $this->set(compact('pedidos'));
    }
}