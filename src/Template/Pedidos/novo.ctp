<section class="content-header">
    <h1>
        Pedido
        <small><?=__('Add')?></small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <?php echo $this->Html->link('<i class="fa fa-dashboard"></i> ' . __('Back'), ['plugin' => 'PluginComercial', 'admin' => false, 'controller' => 'Comercial', 'action' => 'pedidos'], ['escape' => false]) ?>
        </li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <?php echo $this->Form->create($pedido, array('role' => 'form')) ?>

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Pedido</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <?php echo $this->Form->input('id', array('value' => $id)); ?>

                <div class="box-body">
                    <?php
                    echo $this->Form->input('numero', array('label' => 'Identificação *', 'placeholder' => 'Número do pedido', 'value' => $id, 'disabled' => true));
                    ?>
                </div>
                <!-- /.box-body -->
            </div>

            <div class="box-footer">
                <?=$this->Form->button(__('Save'))?>
            </div>

            <?=$this->Form->end()?>

        </div>
    </div>
</section>

<?php $this->start('script');?>
<script type="text/javascript">
    $(document).ready(function(){

        var form = $('#PedidoNovoForm');

        $('input[type="submit"]').click(function(e){
            e.preventDefault();

            if ($('#PedidoNumero').val() == '') {
                if (confirm('Entre com a Identificação do Pedido para continuar.')) {
                    $('#PedidoNumero').focus();
                    return false;
                }
            }

            if ($('#PedidoClienteId').val() == '') {
                if ($('#ClienteNome').val() == '') {
                    if (confirm('Selecione o Cliente, ou entre com os dados.')) {
                        $('#ClienteNome').focus();
                        return false;
                    }
                }

                if ($('#ClienteEmail').val() == '') {
                    if (confirm('Informe o e-mail do Cliente.')) {
                        $('#ClienteEmail').focus();
                        return false;
                    }
                }
            }

            form.submit();
        });

        $('#PedidoClienteId').change(function(){
            var $this = $(this);

            if ($this.val() == '') {
                $('.create-cliente').fadeIn('slow');
            } else {
                $('.create-cliente').fadeOut('fast');
                $('#ClienteNome, #ClienteEmail, #ClienteTelefone').val('');
            }
        });
    });
</script>
<?php $this->end();?>
