<?php

class PedidosController extends ComercialAppController
{
    public function novo() 
    {
        if ($this->request->is('post')) {
            $this->Pedido->create();

            if ($this->Pedido->save($this->request->data)) {
                $this->Flash->success('Informe os produtos deste pedido');
                return $this->redirect(array('action' => 'produtos', $this->Pedido->id));
            }
            $this->Flash->error('Não foi possível cadastrar seu pedido, tente novamente.');
        }
    }
}