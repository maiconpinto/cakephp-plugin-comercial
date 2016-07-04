<?php

namespace PluginComercial\Controller;

use PluginComercial\Controller\AppController;

class PedidosController extends AppController
{
    public function initialize()
    {
        $this->loadModel('PluginComercial.Pedidos');
        $this->loadComponent('PluginComercial.Utils');
    }

    private $referer = array('plugin' => 'PluginComercial', 'admin' => false, 'controller' => 'comercial', 'action' => 'index');

    public function novo($pedido_id = null)
    {
        if ($this->request->is('post')) {
            $this->request->data['Pedido']['usuario_id'] = $this->Auth->user('id');

            if ($this->Pedidos->saveAll($this->request->data)) {
                $pedido_id = $this->Pedidos->id;
                $this->Flash->success('Informe os produtos deste pedido');
                return $this->redirect(array('action' => 'produtos', $pedido_id));
            }

            $this->Flash->error('Não foi possível cadastrar seu pedido, tente novamente.');
        }

        if (!empty($pedido_id)) {
            $id = $pedido_id;
        } else {
            // $this->Pedidos->create();
            $id = $this->Pedidos->getSaveProximoNumero($this->Auth->user('id'));
        }

        $clientes = $this->Pedidos->Cliente->find('list', array('fields' => array('Cliente.id', 'Cliente.email', 'Cliente.nome')));

        $this->set(compact('clientes', 'id'));
    }

    public function produtos($pedido_id = null)
    {
        if (empty($pedido_id)) {
            $this->Flash->success('Pedido não informado, por favor, cadastre-o.');
            return $this->redirect(array('action' => 'novo'));
        }

        $pedido = $this->Pedidos->findById($pedido_id);

        if (empty($pedido['Pedido']['cliente_id'])) {
            return $this->redirect(array('action' => 'novo', $pedido['Pedido']['id']));
        }

        $this->loadModel('Produto');
        $produtos = $this->Produto->find('all');

        $this->loadModel('PluginComercial.Item');
        $itens = $this->Item->findByPedidoId($pedido_id);
        $this->set(compact('pedido', 'produtos', 'itens'));
    }

    public function produto($produto_id = null, $pedido_id = null)
    {
        if (empty($produto_id)) {
            $this->Flash->error('Produto não informado.');
            $this->redirect(array('plugin' => 'PluginComercial', 'admin' => false, 'controller' => 'comercial', 'action' => 'index'));
        }

        if (empty($pedido_id)) {
            $this->Flash->error('Pedido não informado.');
            $this->redirect(array('plugin' => 'PluginComercial', 'admin' => false, 'controller' => 'comercial', 'action' => 'index'));
        }

        $this->loadModel('PluginComercial.Item');

        $item = $this->Item->findByPedidoIdAndProdutoId($pedido_id, $produto_id);

        if (!empty($item)) {
            $this->Item->delete($item['Item']['id']);
            $this->Flash->success('Item retirado com sucesso.');
            return $this->redirect($this->getReferer());
        }

        $item = array('Item' => array(
            'pedido_id' => $pedido_id,
            'produto_id' => $produto_id,
            'qtde' => '1',
            'valor_unitario' => '0',
            'valor_total' => '0'
        ));

        if ($this->Item->save($item)) {
            $this->Flash->success('Continue adicionando produtos ao Pedido.');
        }

        return $this->redirect($this->getReferer());
    }

    public function conferir($pedido_id = null)
    {
        if (empty($pedido_id)) {
            $this->Flash->error('Pedido não informado.');
            return $this->redirect(array('plugin' => 'PluginComercial', 'admin' => false, 'controller' => 'comercial', 'action' => 'index'));
        }

        $pedido = $this->Pedidos->findById($pedido_id);

        $this->loadModel('PluginComercial.Item');
        $this->Item->recursive = 2;
        $itens = $this->Item->findByPedidoId($pedido_id);
        $this->set(compact('pedido', 'itens'));
    }

    public function concluir($pedido_id = null)
    {
        if (empty($pedido_id)) {
            $this->Flash->error('Pedido não informado.');
            return $this->redirect(array('plugin' => 'PluginComercial', 'admin' => false, 'controller' => 'comercial', 'action' => 'index'));
        }

        $pedido = $this->Pedidos->findById($pedido_id);

        $this->loadModel('PluginComercial.Item');
        $this->Item->recursive = 2;
        $itens = $this->Item->findByPedidoId($pedido_id);
        $cliente = $this->Pedidos->Cliente->find('first', array('conditions' => array('Cliente.id' => $pedido['Pedido']['cliente_id'])));
        $this->set(compact('pedido', 'itens', 'cliente'));
    }

    public function enviar($pedido_id = null)
    {
        if (empty($pedido_id)) {
            $this->Flash->error('Pedido não informado.');
        }

        $pedido = $this->Pedidos->findById($pedido_id);

        $this->loadModel('PluginComercial.Orcamento');
        $this->Orcamento->create();

        if ($this->Orcamento->save($pedido)) {
            $this->Flash->success('Orçamento enviado.');
        } else {
            $this->Flash->error('Houve um problema com o Orçamento.');
        }

        $this->Pedidos->statusAguardando($pedido_id);

        return $this->redirect(array('plugin' => 'PluginComercial', 'admin' => false, 'controller' => 'comercial', 'action' => 'index'));

    }

    public function atualizar()
    {
        $this->autoRender = false;

        extract($this->request->data);

        if (!empty($item_id)) {
            $this->loadModel('PluginComercial.Item');
            $this->Item->id = $item_id;
            $this->Item->saveField('nome', $nome);
            $this->Item->saveField('qtde', $qtde);
            $this->Item->saveField('valor_unitario', $this->Utils->moeda_para_db($valor_unitario));
            $this->Item->saveField('valor_total', $this->Utils->moeda_para_db($valor_total))    ;
            return true;
        }

        return false;
    }

    public function confirmar_orcamento($pedido_id = null)
    {
        if (empty($pedido_id)) {
            $this->Flash->error('Pedido não informado.');
        }

        $pedido = $this->Pedidos->findById($pedido_id);

        $this->loadModel('PluginComercial.Orcamento');
        $this->Orcamento->create();

        if ($this->Orcamento->save($pedido)) {
            $this->Flash->success('Orçamento enviado.');
        } else {
            $this->Flash->error('Houve um problema com o Orçamento.');
        }

        $this->Pedidos->statusConfirmado($pedido_id, false);

        return $this->redirect(array('plugin' => 'PluginComercial', 'admin' => false, 'controller' => 'comercial', 'action' => 'index'));

    }

    public function visualizar($pedido_id = null)
    {
        if (empty($pedido_id)) {
            $this->Flash->error('Pedido não informado.');
            return $this->redirect(array('plugin' => 'PluginComercial', 'admin' => false, 'controller' => 'comercial', 'action' => 'index'));
        }

        $pedido = $this->Pedidos->findById($pedido_id);

        $this->loadModel('PluginComercial.Item');
        $this->Item->recursive = 2;
        $itens = $this->Item->findByPedidoId($pedido_id);
        $cliente = $this->Pedidos->Cliente->find('first', array('conditions' => array('Cliente.id' => $pedido['Pedido']['cliente_id'])));
        $this->set(compact('pedido', 'itens', 'cliente'));
    }

    public function folha_producao($item_id = null, $ajax = null)
    {
        if (empty($item_id)) {
            $this->Flash->error('Item para impressão não encontrado.');
            return $this->redirect(array('plugin' => 'PluginComercial', 'admin' => false, 'controller' => 'comercial', 'action' => 'confirmados'));
        }

        if (!empty($ajax)) {
            $this->layout = 'print';
        }

        $this->loadModel('PluginComercial.Item');
        $this->loadModel('PluginComercial.Pedido');
        $this->loadModel('PluginComercial.Cliente');
        $this->loadModel('Produto');

        $item = $this->Item->findById($item_id);

        $pedido = $this->Pedidos->findById($item['Item']['pedido_id']);

        $produto = $this->Produto->findById($item['Item']['produto_id']);

        $cliente = $this->Cliente->findById($pedido['Pedido']['cliente_id']);

        $this->set(compact('item', 'pedido', 'produto', 'cliente'));
    }
}
