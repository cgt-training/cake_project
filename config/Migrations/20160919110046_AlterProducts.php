<?php
use Migrations\AbstractMigration;

class AlterProducts extends AbstractMigration
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
        $table = $this->table('products')
                    ->addColumn('price_detail', 'enum', [
                        'default' => null,
                        'null'=> false,
                        'values'=> ['INR', 'US', 'YEN']
                        ])
                    ->update();
                    
                $this->table('products')
                     ->renameColumn('price_detail', 'currency')
                    ->update();
    }

    public function down(){

            $table = $this->table('products')
                    ->removeColumn('currency');

    }
}
