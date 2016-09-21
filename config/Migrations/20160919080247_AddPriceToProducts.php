<?php
use Migrations\AbstractMigration;

class AddPriceToProducts extends AbstractMigration
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
      
        $table->changeColumn('currency', 'enum', [
            'default' => 'enabled',
            'null' => false,
            'values' => ['enabled', 'disabled']
        ]);
        $table->update();
    }
}
