<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTask extends Migration
{
    public function up()
    {
        // Create a table called 'tasks'
        $this->forge->addField([
                    'id'=> [
                        'type' => 'INT',
                        'constraint' => 5,
                        'unsigned' => true,
                        'auto_increment' => true
            ],
            'description' => [
                'type' => 'VARCHAR',
                'null' => true,
                'constraint' => '128',
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('tasks');
    }

    public function down()
    {
        // Unroll migrations
        $this->forge->dropTable('tasks');
    }
}
