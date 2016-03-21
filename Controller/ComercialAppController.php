<?php

App::uses('AppController', 'Controller');

class ComercialAppController extends AppController {

    public function isAuthorized($user)
    {
        if ($this->Auth->login()) {
            return true;
        }

        return false;
    }

    public function beforeFilter()
    {
        $this->theme = 'admin';
    }

    public function getReferer()
    {
        $explode = explode('/', $this->request->referer(false));

        $pedido_id = array_pop($explode);
        $method = array_pop($explode);

        switch($method) {
            case 'produtos':

                return array('plugin' => 'comercial', 'admin' => false, 'controller' => 'pedidos', 'action' => 'produtos', $pedido_id);
                break;
            case 'conferir':
                return array('plugin' => 'comercial', 'admin' => false, 'controller' => 'pedidos', 'action' => 'conferir', $pedido_id);
                break;
            default:
                return array('plugin' => 'comercial', 'admin' => false, 'controller' => 'comercial', 'action' => 'index');
                break;
        }
    }
}
