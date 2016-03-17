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

    public function produtos($pedido_id = null)
    {
        if (empty($pedido_id)) {
            $this->Flash->success('Pedido não informado, por favor, cadastre-o.');
            return $this->redirect(array('action' => 'novo'));
        }

        $pedido = $this->Pedido->findById($pedido_id);
        $this->loadModel('Produto');
        $produtos = $this->Produto->find('all');

        $this->set(compact('pedido', 'produtos'));

    }
}