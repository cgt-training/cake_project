<?php
use Migrations\AbstractMigration;

class AddPriceToProducts1 extends AbstractMigration
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
        $table = $this->table('products');
        $table->addColumn('price', 'decimal', [
            'default' => null,
            'null' => false,
        ]); 
        $table->addColumn('currency', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->update();
    }
}
