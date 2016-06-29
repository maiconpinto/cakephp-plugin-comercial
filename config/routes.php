<?php
use Cake\Routing\Router;

Router::connect('/comercial', array('plugin' => 'PluginComercial', 'admin' => false,  'controller' => 'comercial', 'action' => 'index'));

Router::connect('/pedidos', array('plugin' => 'PluginComercial', 'admin' => false,  'controller' => 'comercial', 'action' => 'pedidos'));
Router::connect('/andamento', array('plugin' => 'PluginComercial', 'admin' => false,  'controller' => 'comercial', 'action' => 'andamento'));
Router::connect('/aguardando', array('plugin' => 'PluginComercial', 'admin' => false,  'controller' => 'comercial', 'action' => 'aguardando'));
Router::connect('/confirmados', array('plugin' => 'PluginComercial', 'admin' => false,  'controller' => 'comercial', 'action' => 'confirmados'));
