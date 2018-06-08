<?php


use Phinx\Migration\AbstractMigration;

class Users extends AbstractMigration
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
        $users = $this->table('users', ['id' => false, 'primary_key' => 'id']);
        $users
        ->addColumn('id', 'string', ['limit' => 30])
        ->addColumn('photo', 'string', ['limit' => 30])
        ->addColumn('name', 'string', ['limit' => 15])
        ->addColumn('email', 'string', ['limit' => 40])
        ->addColumn('password', 'string', ['limit' => 70])
        ->addColumn('banned', 'integer')
        ->addColumn('auth', 'integer')
        ->create();
    }
}
