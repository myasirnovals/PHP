<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'username' => [
                'type'       => 'VARCHAR',
                'constraint'  => 100,
                'null'       => false,
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint'  => 255,
                'null'       => false,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint'  => 150,
                'null'       => false,
            ],
            'url' => [
                'type'       => 'VARCHAR',
                'constraint'  => 255,
                'null'       => true,
                'default'    => null,
            ],
        ]);

        $this->forge->addKey('username', true);
        $this->forge->createTable('users', true);
    }

    public function down()
    {
        $this->forge->dropTable('users', true);
    }
}