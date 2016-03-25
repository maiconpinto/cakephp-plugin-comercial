<?php

class OrcamentoItens extends ComercialAppModel
{
    public $useTable = 'orcamento_itens';

    public $belongsTo = array(
        'Orcamento' => array(
            'className' => 'Comercial.Orcamento',
            'foreignKey' => 'orcamento_id'
        )
    );
}