<?php

use yii\db\Migration;
use \yii\db\Schema;

/**
 * Class m190812_105450_student_table
 */
class m190812_105450_student_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('student', [
            'id' => Schema::TYPE_PK,
            'first_name' => $this->string()->notNull(),
            'last_name' => $this->string()->notNull(),
            'class1_grade' => $this->float()->notNull()->defaultValue('0.0'),
            'class2_grade' => $this->float()->notNull()->defaultValue('0.0'),
            'class3_grade' => $this->float()->notNull()->defaultValue('0.0'),
        ]);

        $this->createTable('classes', [
            'id' => Schema::TYPE_PK,
            'name' => $this->string()->notNull(),
        ]);

        $this->createTable('students_classes', [
            'id' => Schema::TYPE_PK,
            'student_id' => $this->integer(),
            'class_id' => $this->integer(),
            'grade' => $this->float()->notNull()->defaultValue('0.0'),
        ]);

        $seeder     = new \tebazil\yii2seeder\Seeder();
        $generator  = $seeder->getGeneratorConfigurator();
        $faker      = $generator->getFakerConfigurator();
        $seeder->table('student')->columns([
            'id',
            'first_name'    =>$faker->firstName(),
            'last_name'          =>$faker->lastName(),
            'class1_grade'  =>$faker->randomFloat(1,0,100),
            'class2_grade'  =>$faker->randomFloat(1,0,100),
            'class3_grade'  =>$faker->randomFloat(1,0,100),
        ])->rowQuantity(100);
        $seeder->refill();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190812_105450_student_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190812_105450_student_table cannot be reverted.\n";

        return false;
    }
    */
}
