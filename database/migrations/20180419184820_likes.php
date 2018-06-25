<?php


use Phinx\Migration\AbstractMigration;

class Likes extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $likes = $this->table('likes', ['id' => false, 'primary_key' => 'id']);
        $likes
        ->addColumn('id', 'string', ['limit' => 30])
        ->addColumn('id-post', 'string', ['limit' => 30])
        ->addColumn('id-user', 'string', ['limit' => 30])
        ->addColumn('value', 'integer')
        ->addColumn('softdelete', 'boolean')
        ->addColumn('created_at', 'datetime')
        ->addColumn('deleted_at', 'datetime')
        ->create();
    }
}
