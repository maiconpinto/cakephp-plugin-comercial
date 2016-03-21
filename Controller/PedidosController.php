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

    public function produto($produto_id = null, $pedido_id = null)
    {
        if (empty($produto_id)) {
            $this->Flash->error('Produto não informado');
            $this->redirect(array('plugin' => 'comercial', 'admin' => false, 'controller' => 'comercial', 'action' => 'index'));
        }

        if (empty($pedido_id)) {
            $this->Flash->error('Pedido não informado');
            $this->redirect(array('plugin' => 'comercial', 'admin' => false, 'controller' => 'comercial', 'action' => 'index'));
        }

        $this->loadModel('Comercial.Item');
        
        $item = $this->Item->findByPedidoIdAndProdutoId($pedido_id, $produto_id);

        if (!empty($item)) {
            $this->Item->delete($item['Item']['id']);
            $this->Flash->success('Item retirado com sucesso, continue selecionando os produtos, depois clique em Conferir para visualizar todos produtos e Concluir o pedido.');
            return $this->redirect(array('plugin' => 'comercial', 'admin' => false, 'controller' => 'pedidos', 'action' => 'produtos', $pedido_id));
        }

        $item = array('Item' => array(
            'pedido_id' => $pedido_id,
            'produto_id' => $produto_id,
            'qtde' => '1',
            'valor_unitario' => '0',
            'valor_total' => '0'
        ));

        if ($this->Item->save($item)) {
            $this->Flash->success('Continue adicionando produtos ao Pedido, depois clique em Conferir para visualizar todos produtos e Concluir o pedido.');
            $this->redirect(array('plugin' => 'comercial', 'admin' => false, 'controller' => 'pedidos', 'action' => 'produtos', $pedido_id));
        }
    }
}