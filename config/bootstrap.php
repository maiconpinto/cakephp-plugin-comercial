<?php
use Cake\Core\Configure;
use Cake\Core\Exception\MissingPluginException;
use Cake\Core\Plugin;

Configure::write('Pedidos.status', array(
    '1' => 'Em andamento',
    '2' => 'Aguardando',
    '3' => 'Confirmado'
));