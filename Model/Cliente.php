<?php

class Cliente extends ComercialAppModel
{
    public $useTable = 'clientes';

    public $displayField = 'nome';

    public $hasMany = array('Comercial.Pedido');
}