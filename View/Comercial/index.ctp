<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Painel</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<div class="row">    
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-dropbox fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?= (!empty($pedidos)) ? $pedidos : 0; ?></div>
                        <div>Pedidos</div>
                    </div>
                </div>
            </div>
            <?php
            $link = '<div class="panel-footer">
                    <span class="pull-left">Detalhes</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>'; 
            echo $this->Html->link($link, array('plugin' => 'comercial', 'admin' => false, 'controller' => 'comercial', 'action' => 'pedidos'), array('escape' => false));
            ?>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-copy fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?= (!empty($pendentes)) ? $pendentes : 0; ?></div>
                        <div>Pendentes</div>
                    </div>
                </div>
            </div>
            <?php
            $link = '<div class="panel-footer">
                    <span class="pull-left">Detalhes</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>'; 
            echo $this->Html->link($link, array('plugin' => 'comercial', 'admin' => false, 'controller' => 'comercial', 'action' => 'pendentes'), array('escape' => false));
            ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Cadastros</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<div class="row">    
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-dropbox fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">Pedido</div>
                    </div>
                </div>
            </div>
            <?php
            $link = '<div class="panel-footer">
                    <span class="pull-left">Novo</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>'; 
            echo $this->Html->link($link, array('plugin' => 'comercial', 'admin' => false, 'controller' => 'pedidos', 'action' => 'novo'), array('escape' => false));
            ?>
        </div>
    </div>
</div>