<div class="row">
    <div class="col-md-6">
        <div class="col-lg-12">
            <h1 class="page-header">Painel</h1>
        </div>

        <div class="col-md-12">
            <div class="panel panel-blue">
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
                //echo $this->Html->link($link, array('plugin' => 'comercial', 'admin' => false, 'controller' => 'comercial', 'action' => 'pedidos'), array('escape' => false));
                ?>
            </div>
        </div>

        <div class="col-md-12">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-copy fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?= (!empty($andamento)) ? $andamento : 0; ?></div>
                            <div>Em andamento</div>
                        </div>
                    </div>
                </div>
                <?php
                $link = '<div class="panel-footer">
                        <span class="pull-left">Detalhes</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>';
                //echo $this->Html->link($link, array('plugin' => 'comercial', 'admin' => false, 'controller' => 'comercial', 'action' => 'andamento'), array('escape' => false));
                ?>
            </div>
        </div>

        <div class="col-md-12">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-copy fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?= (!empty($aguardando)) ? $aguardando : 0; ?></div>
                            <div>Aguardando confirmação</div>
                        </div>
                    </div>
                </div>
                <?php
                $link = '<div class="panel-footer">
                        <span class="pull-left">Detalhes</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>';
                //echo $this->Html->link($link, array('plugin' => 'comercial', 'admin' => false, 'controller' => 'comercial', 'action' => 'aguardando'), array('escape' => false));
                ?>
            </div>
        </div>

        <div class="col-md-12">
            <div class="panel panel-blue">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-copy fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?= (!empty($confirmados)) ? $confirmados : 0; ?></div>
                            <div>Confirmados</div>
                        </div>
                    </div>
                </div>
                <?php
                $link = '<div class="panel-footer">
                        <span class="pull-left">Detalhes</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>';
                //echo $this->Html->link($link, array('plugin' => 'comercial', 'admin' => false, 'controller' => 'comercial', 'action' => 'confirmados'), array('escape' => false));
                ?>
            </div>
        </div>

    </div>

    <div class="col-md-6">
        <div class="col-lg-12">
            <h1 class="page-header">Cadastros</h1>
        </div>
        <div class="col-md-12">
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
                //echo $this->Html->link($link, array('plugin' => 'comercial', 'admin' => false, 'controller' => 'pedidos', 'action' => 'novo'), array('escape' => false));
                ?>
            </div>
        </div>
    </div>
</div>
