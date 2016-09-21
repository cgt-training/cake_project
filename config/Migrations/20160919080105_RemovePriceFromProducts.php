<?php
use Migrations\AbstractMigration;

class RemovePriceFromProducts extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {
        $table = $this->table('products');
        $table->removeColumn('price');
        $table->save();
    }
}
