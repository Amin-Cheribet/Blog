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
        $posts = $this->tabel('posts', ['id' => false, 'primary_key' => 'id']);
        $posts
        ->addColumn('id', 'string', ['limit' => 30])
        ->addColumn('title', 'string', ['limit' => 30])
        ->addcolumn('description', 'string', ['limit' => 100])
        ->addcolumn('cover-image', 'string')
        ->addColumn('grid-image', 'string')
        ->addColumn('writer-id', 'string', ['limit' => 30])
        ->addColumn('group-id', 'string', ['limit' => 30])
        ->addColumn('langauge', 'string')
        ->addColumn('post', 'text')
        ->create();
    }
}
