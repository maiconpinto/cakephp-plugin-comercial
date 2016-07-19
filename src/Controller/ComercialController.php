<?php

namespace PluginComercial\Controller;

use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use PluginComercial\Controller\AppController;

class ComercialController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }

    public function beforeFilter(Event $event)
    {
        // $this->Pedidos = TableRegistry::get('Pedidos');
        parent::beforeFilter($event);
    }

    public function index()
    {
        $pedidos     = $this->Pedidos->find('all')->count();
        $andamento   = $this->Pedidos->find('all')->where(['Pedidos.status' => '1'])->count();
        $aguardando  = $this->Pedidos->find('all')->where(['Pedidos.status' => '2'])->count();
        $confirmados = $this->Pedidos->find('all')->where(['Pedidos.status' => '3'])->count();
        $this->set(compact('pedidos', 'andamento', 'aguardando', 'confirmados'));
    }

    public function pedidos()
    {
        $this->loadModel('PluginComercial.Pedidos');
        $query = $this->Pedidos;

        $numero = !empty($this->request->data['numero']) ? $this->request->data['numero'] : false;
        $status = !empty($this->request->data['status']) ? $this->request->data['status'] : false;

        if ($numero && $status) {
            $query = $this->Pedidos->find('all')
                ->where(['Pedidos.numero' => $numero, 'Pedidos.status' => $status]);
        }

        if ($numero) {
            $query = $this->Pedidos->find('all')
                ->where(['Pedidos.numero' => $numero]);
        }

        if ($status) {
            $query = $this->Pedidos->find('all')
                ->where(['Pedidos.status' => $status]);
        }

        $pedidos = $this->paginate($query);

        $this->set(compact('pedidos'));
    }

    public function andamento()
    {
        $pedidos = $this->Pedidos->find('all')->where(['Pedidos.status' => '1']);

        $this->set(compact('pedidos'));
    }

    public function aguardando()
    {
        $pedidos = $this->Pedidos->find('all')->where(['Pedidos.status' => '2']);

        $this->set(compact('pedidos'));
    }

    public function confirmados()
    {
        $pedidos = $this->Pedidos->find('all')->where(['Pedidos.status' => '3']);

        $this->set(compact('pedidos'));
    }
}
