<div class="categorias form">

    <div class="row no-print">
        <div class="col-md-12">
            <div class="page-header">
                <h1>
                    <i class="fa fa-print fa-fw"> </i>
                    Impressão Folha Produção
                    <?php echo $this->Html->link('Imprimir', array('plugin' => 'comercial', 'admin' => false, 'controller' => 'pedidos', 'action' => 'folha_producao', $item['Item']['id'], 1), array('escape' => false, 'icon' => 'print', 'class' => 'btn btn-default pull-right', 'target' => '_blank')); ?>
                    <?php echo $this->Html->link('Voltar', array('plugin' => 'comercial', 'admin' => false, 'controller' => 'pedidos', 'action' => 'visualizar', $item['Item']['pedido_id']), array('escape' => false, 'icon' => 'arrow-left', 'class' => 'btn btn-default pull-right')); ?>
                </h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th colspan="2">Cliente</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> Nome: </td>
                        <td> <?php echo $cliente['Cliente']['nome']; ?> </td>
                    </tr>
                    <tr>
                        <td>E-mail:</td>
                        <td> <?php echo $cliente['Cliente']['email']; ?> </td>
                    </tr>
                    <tr>
                        <td>Telefone:</td>
                        <td> <?php echo $cliente['Cliente']['telefone']; ?> </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th colspan="2">Produto</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> Nome: </td>
                        <td> <?php echo $produto['Produto']['nome']; ?> </td>
                    </tr>
                    <tr>
                        <td>Tamanho:</td>
                        <td>
                            [ &nbsp; ] P &nbsp;
                            [ &nbsp; ] M &nbsp;
                            [ &nbsp; ] G &nbsp;
                            [ &nbsp; ] GG
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>