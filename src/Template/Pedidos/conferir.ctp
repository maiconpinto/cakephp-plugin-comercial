<?php
$total = 0;
$disabled = false;
if (empty($itens)) {
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
                    'Seguir', 
                    array(
                        'plugin' => 'comercial', 
                        'admin' => false, 
                        'controller' => 'pedidos', 
                        'action' => 'concluir', 
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
                    'Voltar', 
                    array(
                        'plugin' => 'comercial', 
                        'admin' => false, 
                        'controller' => 'pedidos', 
                        'action' => 'produtos', 
                        $pedido['Pedido']['id']
                    ), 
                    array(
                        'escape' => false, 
                        'icon' => 'arrow-left', 
                        'class' => 'btn btn-primary pull-right'
                    )); ?>
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
                    <?php echo $this->Form->create('Pedido'); ?>
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables">
                                <thead>
                                    <tr>
                                        <th class="col-xs-1">ID</th>
                                        <th class="col-xs-4">Nome</th>
                                        <th class="col-xs-2">Qtde</th>
                                        <th class="col-xs-2">Valor <small>Unitário</small> </th>
                                        <th class="col-xs-2">Valor <small>Total</small> </th>
                                        <th class="actions col-xs-1">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($itens as $p): 
                                $total += $p['Item']['valor_total']; 
                                $nome = (!empty($p['Item']['nome'])) ? $p['Item']['nome'] : $p['Produto']['nome']; ?>
                                <tr data-item="<?php echo $p['Item']['id']; ?>" 
                                data-produto="<?php echo $p['Produto']['id']; ?>" 
                                data-pedido="<?php echo $pedido['Pedido']['id']; ?>">
                                        <td>
                                            <?php 
                                            echo h($p['Produto']['id']);
                                            echo $this->Form->input('Item.id.', array('type' => 'hidden', 'value' => $p['Item']['id']));
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $this->Form->input('Item.nome.', array('label' => false, 'placeholder' => $nome, 'value' => $nome, 'data-option' => 'nome')); ?>
                                        <td>
                                            <?php echo $this->Form->input('Item.qtde.', array('label' => false, 'placeholder' => '', 'value' => $this->Utils->getValor($p['Item']['qtde']), 'data-option' => 'qtde')); ?>
                                        </td>
                                        <td>
                                            <?php echo $this->Form->input('Item.valor_unitario.', array('label' => false, 'placeholder' => 'Valor Unitário', 'value' => $this->Utils->moeda_de_db($p['Item']['valor_unitario']), 'data-option' => 'valor_unitario')); ?>
                                        </td>
                                        <td>
                                            <?php echo $this->Form->input('Item.valor_total.', array('label' => false, 'placeholder' => 'Valor Total', 'value' => $this->Utils->moeda_de_db($p['Item']['valor_total']), 'data-option' => 'valor_total')); ?>
                                        </td>
                                        <td class="actions" align="center">
                                            <?php
                                             echo $this->Html->link('', array('plugin' => 'comercial', 'admin' => false, 'controller' => 'pedidos', 'action' => 'produto', $p['Produto']['id'], $pedido['Pedido']['id']), array('escape' => false, 'icon' => 'close', 'class' => 'btn btn-danger')); ?>
                                        </td>
                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5" align="right">
                                            R$ <span id="valor_total_geral"><?php echo number_format($total, 2, ',', '.'); ?></span>
                                        </td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div> 
    </div>
</div>

<?php $this->start('script'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        $('input').change(function(){
            var val = $(this).val();
            var tipo = $(this).data('option');
            
            var tr = $(this).parents('tr');
            var obj_nome = tr.find('input[data-option="nome"]');
            var obj_qtde = tr.find('input[data-option="qtde"]');
            var obj_valor_unitario = tr.find('input[data-option="valor_unitario"]');
            var obj_valor_total = tr.find('input[data-option="valor_total"]');
            var item_id = tr.data('item');

            if (val == '') {
                if (tipo == 'nome') {
                    obj_nome.val(obj_nome.attr('placeholder'));
                    return false;
                }
                if (tipo == 'qtde') {
                    obj_qtde.val(1);
                }

                if (tipo == 'valor_unitario') {
                    obj_valor_unitario.val(0);
                }

                if (tipo == 'valor_total') {
                    obj_valor_total.val(0);
                }

                atualiza_total(obj_qtde, obj_valor_unitario, obj_valor_total);
                return false;
            }

            if (tipo == 'valor_total') {
                atualiza_total_geral();
                atualiza_bd(item_id, obj_nome, obj_qtde, obj_valor_unitario, obj_valor_total);
                return false;
            }
            
            if (val !== '') {
                atualiza_total(obj_qtde, obj_valor_unitario, obj_valor_total);
                atualiza_total_geral();
                atualiza_bd(item_id, obj_nome, obj_qtde, obj_valor_unitario, obj_valor_total);
            }
        });
    });

    function atualiza_total(obj_qtde, obj_valor_unitario, obj_valor_total) {
        var valor_total = getValor(obj_qtde.val()) * getValor(obj_valor_unitario.val());
        var valor_final = setMoeda(valor_total);
        obj_valor_total.val(valor_final);
    }

    function atualiza_bd(item_id, obj_nome, obj_qtde, obj_valor_unitario, obj_valor_total) {
        
        var request = $.ajax({
            url: '<?php echo $this->webroot; ?>comercial/pedidos/atualizar',
            dataType: 'jsonp',
            data: {
                item_id: item_id,
                nome: obj_nome.val(),
                qtde: obj_qtde.val(),
                valor_unitario: obj_valor_unitario.val(),
                valor_total: obj_valor_total.val(),
            },
            type: 'POST'
        });
    }

    function atualiza_total_geral() {
        $('input[data-option="valor_total"]').each(function(i, el){
            if (i == 0) {
                $('#valor_total_geral').text('0,00');
            }
            var valor_item = $(el).val();
            var valor_total_atual = $('#valor_total_geral').text();
            var soma = getValor(valor_item) + getValor(valor_total_atual);
            $('#valor_total_geral').text(setMoeda(soma)); 
        });
    }

    function getValor(val){
        var sem_ponto = val.replace('.','');
        var sem_virgula = sem_ponto.replace(',','.');
        var val = parseFloat(sem_virgula);
        return val;
    }

    function setMoeda(n, c, d, t)
    {
        c = isNaN(c = Math.abs(c)) ? 2 : c, d = d == undefined ? "," : d, t = t == undefined ? "." : t, s = n < 0 ? "-" : "", i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
        return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
    }

</script>
<?php $this->end(); ?>