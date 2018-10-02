<?php


use Phinx\Migration\AbstractMigration;

class Posts extends AbstractMigration
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
        $posts = $this->table('posts', ['id' => false, 'primary_key' => 'id']);
        $posts
        ->addColumn('id', 'string', ['limit' => 30])
        ->addColumn('title', 'string', ['limit' => 30])
        ->addColumn('description', 'string', ['limit' => 100])
        ->addColumn('coverimage', 'string')
        ->addColumn('gridimage', 'string')
        ->addColumn('writer', 'string', ['limit' => 30])
        ->addColumn('postgroup', 'string', ['limit' => 30])
        ->addColumn('language', 'string')
        ->addColumn('post', 'text')
        ->addColumn('softdelete', 'boolean', ['default' => 0])
        ->addColumn('created_at', 'datetime')
        ->addColumn('deleted_at', 'datetime', ['null' => true])
        ->create();
    }
}
