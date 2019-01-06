<?php

use yii\db\Migration;

/**
 * Class m181230_120233_params
 */
class m181230_120233_params extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('params', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->unique()->notNull(),
            'key' => $this->string(100)->unique()->notNull(),
            'val' => $this->string(),
            'type' => $this->string(50)->notNull(),
            'data' => $this->text(),
            'model_key' => $this->string(50),
            'model_val' => $this->string(50),
            'multiple' => $this->boolean()->defaultValue(false),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('params');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181230_120233_params cannot be reverted.\n";

        return false;
    }
    */
}
