<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUser extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=> [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name'=> [
                'type' => 'VARCHAR',
                'constraint' => '128',
            ],
            'email'=> [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'password_hashed'=> [
                'type' => 'VARCHAR',
                'constraint' => '255', //This is the default length for the password field because of password_hash function
            ],
            'created_at'=> [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at'=> [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true)->addUniqueKey('email');
        $this->forge->createTable('user');
    }
    public function down()
    {
        $this->forge->dropTable('user');
    }
}
