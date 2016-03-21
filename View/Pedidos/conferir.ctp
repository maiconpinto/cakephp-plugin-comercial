<?= $this->element("/scripts/datatables"); ?>

<div class="categorias form">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1>
                    <i class="fa fa-dashboard fa-fw"> </i>
                    Produtos
                    <?php echo $this->Html->link('Concluir', array('plugin' => 'comercial', 'admin' => false, 'controller' => 'pedidos', 'action' => 'concluir', $pedido['Pedido']['id']), array('escape' => false, 'class' => 'btn btn-success pull-right', 'style' => 'margin-left: 10px;')); ?>
                    <?php echo $this->Html->link('Voltar', array('plugin' => 'comercial', 'admin' => false, 'controller' => 'pedidos', 'action' => 'produtos', $pedido['Pedido']['id']), array('escape' => false, 'icon' => 'arrow-left', 'class' => 'btn btn-primary pull-right')); ?>
                <small>do Orçamento</small>
                </h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Produtos
                </div>

                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables">
                            <thead>
                                <tr>
                                    <th class="col-xs-1">ID</th>
                                    <th>Nome</th>
                                    <th>Categoria</th>
                                    <th class="actions col-xs-3">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($itens as $p): ?>
                            <tr>
                                    <td><?php echo h($p['Produto']['id']); ?>&nbsp;</td>
                                    <td><?php echo h($p['Produto']['nome']); ?>&nbsp;</td>
                                    <td><?php echo h($p['Produto']['Categoria']['nome']); ?>&nbsp;</td>
                                    <td class="actions" align="center">
                                        <?php echo $this->Html->link('Retirar', array('plugin' => 'comercial', 'admin' => false, 'controller' => 'pedidos', 'action' => 'produto', $p['Produto']['id'], $pedido['Pedido']['id']), array('escape' => false, 'icon' => 'edit', 'class' => 'btn btn-danger')); ?>
                                    </td>
                            </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>
