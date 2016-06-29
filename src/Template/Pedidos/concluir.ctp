<?php
$total = 0;
?>
<div class="categorias form">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1>
                    <i class="fa fa-dashboard fa-fw"> </i>
                    Finalizar Pedido
                    <?php echo $this->Html->link('Confirmar orçamento', array('plugin' => 'comercial', 'admin' => false, 'controller' => 'pedidos', 'action' => 'confirmar_orcamento', $pedido['Pedido']['id']), array('escape' => false, 'class' => 'btn btn-success pull-right', 'style' => 'margin-left: 10px;')); ?>
                    <?php echo $this->Html->link('Enviar Orçamento', array('plugin' => 'comercial', 'admin' => false, 'controller' => 'pedidos', 'action' => 'enviar', $pedido['Pedido']['id']), array('escape' => false, 'class' => 'btn btn-warning pull-right', 'style' => 'margin-left: 10px;')); ?>
                    <?php echo $this->Html->link('Voltar', array('plugin' => 'comercial', 'admin' => false, 'controller' => 'pedidos', 'action' => 'conferir', $pedido['Pedido']['id']), array('escape' => false, 'icon' => 'arrow-left', 'class' => 'btn btn-primary pull-right')); ?>
                </h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    Cliente
                </div>
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <td class="col-xs-3">Nome</td>
                                    <td class="col-xs-9"><?php echo $cliente['Cliente']['nome'] ?></td>
                                </tr>
                                <tr>
                                    <td class="col-xs-3">E-mail</td>
                                    <td class="col-xs-9"><?php echo $cliente['Cliente']['email'] ?></td>
                                </tr>
                                <tr>
                                    <td class="col-xs-3">Telefone</td>
                                    <td class="col-xs-9"><?php echo $cliente['Cliente']['telefone'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    Produtos
                </div>

                <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables">
                                <thead>
                                    <tr>
                                        <th class="col-xs-1">ID</th>
                                        <th class="col-xs-5">Nome</th>
                                        <th class="col-xs-2">Qtde</th>
                                        <th class="col-xs-2">Valor <small>Unitário</small> </th>
                                        <th class="col-xs-2">Valor <small>Total</small> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($itens as $p): 
                                $total += $p['Item']['valor_total'];
                                $nome = (!empty($p['Item']['nome'])) ? $p['Item']['nome'] : $p['Produto']['nome'];
                                ?>
                                <tr>
                                    <td>
                                        <?php  echo h($p['Produto']['id']); ?>
                                    </td>
                                    <td><?php echo h($nome); ?></td>
                                    <td>
                                        <?php echo $this->Utils->getValor($p['Item']['qtde']); ?>
                                    </td>
                                    <td>
                                        R$ <?php echo $this->Utils->moeda_de_db($p['Item']['valor_unitario']); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Utils->itemValorTotal($p['Item']['qtde'], $p['Item']['valor_unitario'], $p['Item']['valor_total']); ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" align="right">
                                            <strong>Total Geral</strong>
                                        </td>
                                        <td>
                                            <strong>R$ <span id="valor_total_geral"><?php echo number_format($total, 2, ',', '.'); ?></span></strong>
                                            
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                </div>
            </div>
        </div> 
    </div>
</div>