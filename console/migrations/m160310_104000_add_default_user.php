<?php

use yii\db\Schema;

class m160310_104000_add_default_user extends yii\db\Migration
{
    public function up()
    {
        $data = [
            'id' => 1,
            'username' => 'admin',
            'auth_key' => '',
            'password_hash' => '$2y$13$Jfyr/pliXXHN0JtKKt3mAeMkseW3pzPfZrSPyGJT4W/SgrfhTHSu2',
            'password_reset_token' => NULL,
            'email' => 'a@a.aa',
            'status' => 10,
            'created_at' => '1457596380',
            'updated_at' => '1457596380',
        ];
        $this->insert('{{%user}}', $data);
    }

    public function down()
    {
        $this->delete('{{%user}}', ['id' => '1']);
    }
}
