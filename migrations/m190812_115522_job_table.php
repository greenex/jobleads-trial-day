<?php

use yii\db\Migration;

/**
 * Class m190812_115522_job_table
 */
class m190812_115522_job_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('job', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
        ]);

        $seeder     = new \tebazil\yii2seeder\Seeder();
        $generator  = $seeder->getGeneratorConfigurator();
        $faker      = $generator->getFakerConfigurator();
        $seeder->table('job')->columns([
            'id',
            'name'          => $faker->name(),
            'description'   => $faker->realText(),

        ])->rowQuantity(100);
        $seeder->refill();

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190812_115522_job_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190812_115522_job_table cannot be reverted.\n";

        return false;
    }
    */
}
