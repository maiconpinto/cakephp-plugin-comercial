<?php
use Cake\Core\Configure;

$lista_status_pedido = Configure::read('Pedidos.status');
?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Pedidos
    <div class="pull-right"><?php // $this->Html->link(__('New'), ['plugin' => 'PluginComercial', 'controller' => 'Pedidos', 'action' => 'novo'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?= __('List of') ?> Pedidos</h3>
          <div class="box-tools">
            <form action="<?php echo $this->Url->build(); ?>" method="POST">
              <div class="input-group input-group-sm">
                <input type="text" name="search" class="form-control" placeholder="<?= __('Fill in to start search') ?>">
                <span class="input-group-btn">
                <button class="btn btn-info btn-flat" type="submit"><?= __('Filter') ?></button>
                </span>
              </div>
            </form>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tr>
              <th>Número</th>
              <th>Status</th>
            </tr>
            <?php foreach ($pedidos as $pedido): ?>
              <tr>
                <td><?= h($pedido->numero) ?></td>
                <td><?= $lista_status_pedido[$pedido->status] ?></td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
        <!-- /.box-body -->
    </div>
  </div>
</section>
<!-- /.content -->

