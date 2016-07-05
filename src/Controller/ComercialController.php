<?php

namespace PluginComercial\Controller;

use PluginComercial\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;

class ComercialController extends AppController
{
    private $Pedido;

    public function beforeFilter(Event $event)
    {
        $this->Pedido = TableRegistry::get('Pedidos');
        parent::beforeFilter($event);
    }

    public function index()
    {
        $pedidos = $this->Pedido->find('all')->count();
        $andamento = $this->Pedido->find('all')->where(['Pedidos.status' => '1'])->count();
        $aguardando = $this->Pedido->find('all')->where(['Pedidos.status' => '2'])->count();
        $confirmados = $this->Pedido->find('all')->where(['Pedidos.status' => '3'])->count();
        $this->set(compact('pedidos', 'andamento', 'aguardando', 'confirmados'));
    }

    public function pedidos()
    {
        $pedidos = $this->Pedido->find('all')->all();

        $this->set(compact('pedidos'));
    }

    public function andamento()
    {
        $pedidos = $this->Pedido->find('all')->where(['Pedidos.status' => '1']);

        $this->set(compact('pedidos'));
    }

    public function aguardando()
    {
        $pedidos = $this->Pedido->find('all')->where(['Pedidos.status' => '2']);

        $this->set(compact('pedidos'));
    }

    public function confirmados()
    {
        $pedidos = $this->Pedido->find('all')->where(['Pedidos.status' => '3']);

        $this->set(compact('pedidos'));
    }
}
