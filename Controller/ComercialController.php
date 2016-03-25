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

    }

    public function andamento()
    {

    }

    public function aguardando()
    {

    }
}