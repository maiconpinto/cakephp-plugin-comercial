<?php
use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::connect('/comercial', array('plugin' => 'comercial', 'admin' => false,  'controller' => 'comercial', 'action' => 'index'));

Router::connect('/pedidos', array('plugin' => 'comercial', 'admin' => false,  'controller' => 'comercial', 'action' => 'pedidos'));
Router::connect('/andamento', array('plugin' => 'comercial', 'admin' => false,  'controller' => 'comercial', 'action' => 'andamento'));
Router::connect('/aguardando', array('plugin' => 'comercial', 'admin' => false,  'controller' => 'comercial', 'action' => 'aguardando'));
Router::connect('/confirmados', array('plugin' => 'comercial', 'admin' => false,  'controller' => 'comercial', 'action' => 'confirmados'));
