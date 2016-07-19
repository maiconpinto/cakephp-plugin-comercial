<?php
use Cake\Core\Configure;

$lista_status_pedido = Configure::read('Pedidos.status');
?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Pedidos
    <div class="pull-right"><?php echo $this->Html->link(__('New'), '/pedidos/novo', ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?= __('List of') ?> Pedidos</h3>
          <div class="box-tools col-md-8">
            <form action="<?php echo $this->Url->build(); ?>" method="POST">
              <div class="pull-right">
                <span class="input-group-btn">
                    <button class="btn btn-info btn-flat" type="submit"><?= __('Filter') ?></button>
                </span>
              </div>
              <div class="pull-right">
                <input type="text" name="numero" class="form-control pull-right" placeholder="Número do Pedido">
              </div>
              <div class="pull-right">
                <select name="status" class="form-control pull-right">
                    <option value="">- selecione -</option>
                    <option value="1">Em andamento</option>
                    <option value="2">Aguardando confirmação</option>
                    <option value="3">Confirmados</option>
                </select>
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

