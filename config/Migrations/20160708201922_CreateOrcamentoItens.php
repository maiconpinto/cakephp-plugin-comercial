<?php
use Migrations\AbstractMigration;

class CreateOrcamentoItens extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('orcamento_itens');
        $table->addColumn('orcamento_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('item_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('qtde', 'decimal', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('valor_unitario', 'decimal', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('valor_total', 'decimal', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
