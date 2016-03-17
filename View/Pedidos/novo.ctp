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
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Novo
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">

                            <?php echo $this->Form->create('Pedido', array('role' => 'form')); ?>

                                <?php echo $this->Form->input('numero', array('label' => 'Identificação', 'placeholder' => 'Número do pedido'));?>
                                <?php echo $this->Form->submit('Avançar', array('class' => 'btn btn-success')); ?>

                            <?php echo $this->Form->end() ?>

                            </div> <!-- col-md-12 -->
                        </div> <!-- row -->
                    </div> <!-- panel-body -->
                </div> <!-- panel -->   
            </div><!-- end col md 12 -->
    </div><!-- end row -->
</div>
