<?php

Router::connect('/comercial', array('plugin' => 'comercial', 'admin' => false,  'controller' => 'comercial', 'action' => 'index'));

Router::connect('/pedidos', array('plugin' => 'comercial', 'admin' => false,  'controller' => 'comercial', 'action' => 'pedidos'));
Router::connect('/pendentes', array('plugin' => 'comercial', 'admin' => false,  'controller' => 'comercial', 'action' => 'pendentes'));
Router::connect('/andamento', array('plugin' => 'comercial', 'admin' => false,  'controller' => 'comercial', 'action' => 'andamento'));
Router::connect('/aguardando', array('plugin' => 'comercial', 'admin' => false,  'controller' => 'comercial', 'action' => 'aguardando'));
