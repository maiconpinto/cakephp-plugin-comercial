<?= $this->element("/scripts/datatables"); ?>

<?php 
$disabled = false;
$botao_selecionar = 'Selecionar';
$produtos_selecionados = array();

if (!empty($itens)) {
    $produtos_selecionados = array_column_model($itens, 'Item', 'produto_id', 'id');
} 

if (empty($produtos_selecionados)) {
    $disabled = true;
}

?>
<div class="categorias form">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1>
                    <i class="fa fa-dashboard fa-fw"> </i>
                    Produtos
                    <?php echo $this->Html->link(
                    'Conferir', 
                    array(
                        'plugin' => 'comercial', 
                        'admin' => false, 
                        'controller' => 'pedidos', 
                        'action' => 'conferir', 
                        $pedido['Pedido']['id']
                    ), 
                    array(
                        'escape' => false, 
                        'class' => 'btn btn-success pull-right', 
                        'style' => 'margin-left: 10px;', 
                        'icon' => 'arrow-right', 
                        'icon-inverse' => true,
                        'disabled' => $disabled
                    )); ?>
                    
                    <?php echo $this->Html->link(
                    'Sair', 
                    array(
                        'plugin' => 'comercial', 
                        'admin' => false, 
                        'controller' => 'comercial', 
                        'action' => 'index'
                    ), 
                    array(
                        'escape' => false, 
                        'class' => 'btn btn-primary pull-right'
                    )); ?>
                <small>para Orçamento</small>
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
                            <?php foreach ($produtos as $p):
                                if (!empty($produtos_selecionados)) {
                                    if (in_array($p['Produto']['id'], $produtos_selecionados)) {
                                        $botao_selecionar = 'Retirar';
                                        $class = 'btn btn-danger';
                                    } else {
                                        $botao_selecionar = 'Selecionar';
                                        $class = 'btn btn-primary';
                                    }
                                } else {
                                    $botao_selecionar = 'Selecionar';
                                    $class = 'btn btn-primary';
                                }
                            ?>
                            <tr>
                                    <td><?php echo h($p['Produto']['id']); ?>&nbsp;</td>
                                    <td><?php echo h($p['Produto']['nome']); ?>&nbsp;</td>
                                    <td><?php echo h($p['Categoria']['nome']); ?>&nbsp;</td>
                                    <td class="actions" align="center">
                                        <?php echo $this->Html->link($botao_selecionar, array('plugin' => 'comercial', 'admin' => false, 'controller' => 'pedidos', 'action' => 'produto', $p['Produto']['id'], $pedido['Pedido']['id']), array('escape' => false, 'icon' => 'edit', 'class' => $class)); ?>
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
