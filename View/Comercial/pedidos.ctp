<?= $this->element("/scripts/datatables"); ?>

<?php
$lista_status_pedido = Configure::read('Pedidos.status');
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Pedidos</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Lista
            </div>

            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>
                            <tr>
                                <th class="col-xs-1">ID</th>
                                <th>Número</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($pedidos as $p): ?>
                        <tr>
                            <td><?php echo h($p['Pedido']['id']); ?>&nbsp;</td>
                            <td><?php echo h($p['Pedido']['numero']); ?>&nbsp;</td>
                            <td><?php echo $lista_status_pedido[$p['Pedido']['status']]; ?>&nbsp;</td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 
</div>
