<?php

use yii\db\Schema;

class m160310_103300_create_tables extends yii\db\Migration
{
    public function up()
    {
        $this->createTable('{{%driver}}', [
            'id' => $this->primaryKey()->notNull(),
            'first_name' => $this->string(100)->notNull(),
            'last_name' => $this->string(100)->notNull(),
            'phone' => $this->string(20)->notNull(),
            'age' => $this->integer()->notNull(),
            'is_active' => $this->getDb()->getSchema()->createColumnSchemaBuilder('TINYINT(1)')->defaultValue('1')->notNull(),
        ]);


        $this->createTable('{{%bus_model}}', [
            'id' => $this->primaryKey()->notNull(),
            'name' => $this->string(100)->notNull(),
        ]);


        $this->createTable('{{%driver__bus_model}}', [
            'driver_id' => $this->integer()->notNull(),
            'bus_model_id' => $this->integer()->notNull(),
        ]);

        $this->addPrimaryKey('pk', '{{%driver__bus_model}}', ['driver_id', 'bus_model_id']);
        $this->createIndex('FK_driver_bus_model_bus_model', '{{%driver__bus_model}}', 'bus_model_id', false);


        $this->addForeignKey('FK_driver_bus_model_driver', '{{%driver__bus_model}}', 'driver_id', '{{%driver}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_driver_bus_model_bus_model', '{{%driver__bus_model}}', 'bus_model_id', '{{%bus_model}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->execute('SET FOREIGN_KEY_CHECKS = 0');

        $this->dropTable('{{%driver__bus_model}}');
        $this->dropTable('{{%bus_model}}');
        $this->dropTable('{{%driver}}');

        $this->execute('SET FOREIGN_KEY_CHECKS = 1');
    }
}
