<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TasksTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'task_id'          => [
                    'type'           => 'INT',
                    'constraint'     => 5,
                    'unsigned'       => true,
                    'auto_increment' => true,
            ],
            // 'user_id'          => [
            //     'type'           => 'INT',
            //     'constraint'     => 5,
            //     'unsigned'       => true,
            // ],
            'task'       => [
                    'type'       => 'VARCHAR',
                    'constraint' => '1000',
            ],
            'task_description' => [
                'type'       => 'TEXT',
                'constraint' => '1000',
            ],
        ]);
        // $this->forge->addForeignKey('user_id','users','user_id');
        $this->forge->addKey('task_id', true);
        $this->forge->createTable('tasks');
    }

    public function down()
    {
        $this->forge->dropTable('tasks');
    }
}
