<?php

namespace PluginComercial\Controller;

use PluginComercial\Controller\AppController;

class ComercialController extends AppController
{
    public $uses = array('PluginComercial.Pedido');

    public function index()
    {
        $pedidos = $this->Pedido->find('count');
        $andamento = $this->Pedido->find('count', array('conditions' => array('Pedido.status' => '1')));
        $aguardando = $this->Pedido->find('count', array('conditions' => array('Pedido.status' => '2')));
        $confirmados = $this->Pedido->find('count', array('conditions' => array('Pedido.status' => '3')));
        
        $this->set(compact('pedidos', 'andamento', 'aguardando', 'confirmados'));
    }

    public function pedidos()
    {
        $pedidos = $this->Pedido->find('all');

        $this->set(compact('pedidos'));
    }
    
    public function andamento()
    {
        $pedidos = $this->Pedido->find('all', array('conditions' => array('Pedido.status' => '1')));
        
        $this->set(compact('pedidos'));
    }

    public function aguardando()
    {
        $pedidos = $this->Pedido->find('all', array('conditions' => array('Pedido.status' => '2')));
        
        $this->set(compact('pedidos'));
    }
    
    public function confirmados()
    {
        $pedidos = $this->Pedido->find('all', array('conditions' => array('Pedido.status' => '3')));
        
        $this->set(compact('pedidos'));
    }
}