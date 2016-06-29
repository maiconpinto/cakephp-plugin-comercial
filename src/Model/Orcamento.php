<?php

class Orcamento extends ComercialAppModel
{
    public $useTable = 'orcamentos';

    public $belongsTo = array('Comercial.Pedido');

    public $hasMany = array(
        'Itens' => array(
            'className' => 'Comercial.OrcamentoItens',
            'foreignKey' => 'orcamento_id'
        )
    );

    /*
        array(
            'Pedido' => array(
                'id' => '19',
                'created' => '2016-03-25 09:29:09',
                'modified' => '2016-03-25 09:29:09',
                'numero' => '010',
                'status' => '2'
            ),
            'Itens' => array(
                (int) 0 => array(
                    'id' => '43',
                    'created' => '2016-03-25 09:29:07',
                    'modified' => '2016-03-25 09:29:07',
                    'pedido_id' => '19',
                    'produto_id' => '1',
                    'qtde' => '1',
                    'valor_unitario' => '0.00',
                    'valor_total' => '0.00'
                )
            )
        )
    */
    public function save($data = null, $validate = false, $fieldList = array())
    {
        if (empty($data)) {
            return false;
        }

        $orcamento = array(
            'Orcamento' => array(
                'pedido_id' => $data['Pedido']['id']
            )
        );
        if (parent::save($orcamento)) {
            $orcamento_id = $this->id;
            // salvar itens
            if (!empty($data['Itens'])) {
                foreach ($data['Itens'] as $item) {
                    $orcamentoItem = array(
                        'Itens' => array(
                            'orcamento_id' => $orcamento_id,
                            'item_id' => $item['id'],
                            'qtde' => $item['qtde'],
                            'valor_unitario' => $item['valor_unitario'],
                            'valor_total' => $item['valor_total']
                        )
                    );
                    $this->Itens->create();
                    $this->Itens->save($orcamentoItem);
                }
            }
        }

        return true;
    }
}