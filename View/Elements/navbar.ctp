<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <?= $this->Html->link('Blink Web', '/comercial', array('class' => 'navbar-brand')); ?>
    </div>
    <!-- /.navbar-header -->

    <?= $this->element('navbar-toplinks'); ?>

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <?= $this->Html->link('Home', array('plugin' => 'comercial', 'admin' => false, 'controller' => 'comercial', 'action' => 'index'), array('icon' => 'dashboard')); ?>
                </li>
                <li>
                    <?= $this->Html->link('Pedidos', array('plugin' => 'comercial', 'admin' => false, 'controller' => 'comercial', 'action' => 'pedidos'), array('icon' => 'dashboard')); ?>
                </li>
                <li>
                    <?= $this->Html->link('Pendentes', array('plugin' => 'comercial', 'admin' => false, 'controller' => 'comercial', 'action' => 'pendentes'), array('icon' => 'dashboard')); ?>
                </li>
                <li>
                    <?= $this->Html->link('Em andamento', array('plugin' => 'comercial', 'admin' => false, 'controller' => 'comercial', 'action' => 'andamento'), array('icon' => 'dashboard')); ?>
                </li>
                <li>
                    <?= $this->Html->link('Aguardando retorno', array('plugin' => 'comercial', 'admin' => false, 'controller' => 'comercial', 'action' => 'aguardando'), array('icon' => 'dashboard')); ?>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>