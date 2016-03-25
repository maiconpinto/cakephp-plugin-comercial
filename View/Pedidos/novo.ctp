<?php
$this->Html->css('/lib/summernote/summernote', array('inline' => false));
$this->Html->script('/lib/summernote/summernote', array('inline' => false));
$this->Html->script('incs/editor', array('inline' => false));
?>

<div class="categorias form">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1>
                    <i class="fa fa-dashboard fa-fw"> </i>
                    Pedido
                    <?php echo $this->Html->link('Voltar', array('plugin' => 'comercial', 'admin' => false, 'controller' => 'comercial', 'action' => 'index'), array('escape' => false, 'icon' => 'arrow-left', 'class' => 'btn btn-primary pull-right')); ?>               
                </h1>
            </div>
        </div>
    </div>

    <div class="row">

            <div class="col-md-12">
                
                <?php echo $this->Form->create('Pedido', array('role' => 'form')); ?>
                
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Pedido
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">

                                    <?php  echo $this->Form->input('numero', array('label' => 'Identificação *', 'placeholder' => 'Número do pedido')); ?>

                                </div> <!-- col-md-12 -->
                            </div> <!-- row -->
                        </div> <!-- panel-body -->
                        <div class="panel-footer">
                            * <small>Campos obrigatórios</small>
                        </div>
                    </div> <!-- panel -->

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Cliente
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <?php  echo $this->Form->input('cliente_id', array('label' => 'Cliente', 'empty' => 'Selecione um cliente - ou - Entre com os dados abaixo')); ?>
    
                                    <div class="create-cliente">
                                        <?php
                                        echo $this->Form->input('Cliente.nome', array('label' => 'Nome *', 'placeholder' => 'Nome do Cliente'));
                                        echo $this->Form->input('Cliente.email', array('label' => 'E-mail *', 'placeholder' => 'E-mail do Cliente'));
                                        echo $this->Form->input('Cliente.telefone', array('label' => 'Telefone', 'placeholder' => 'Telefone do Cliente'));
                                        ?>
                                    </div>
                                </div> <!-- col-md-12 -->
                            </div> <!-- row -->
                        </div> <!-- panel-body -->
                        <div class="panel-footer">
                            * <small>Campos obrigatórios</small>
                        </div>
                    </div> <!-- panel -->
                
                    <?php echo $this->Form->submit('Criar pedido', array('class' => 'btn btn-success')); ?>

                <?php echo $this->Form->end() ?>

            </div><!-- end col md 12 -->
    </div><!-- end row -->
</div>

<?php $this->start('script'); ?>
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
<?php $this->end(); ?>
