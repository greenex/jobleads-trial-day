<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property double $class1_grade
 * @property double $class2_grade
 * @property double $class3_grade
 */
class Student extends \yii\db\ActiveRecord
{
    /** @var float **/
    public $avg_grade = 0.0;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name'], 'required'],
            [['class1_grade', 'class2_grade', 'class3_grade'], 'number'],
            [['first_name', 'last_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'class1_grade' => 'Class1 Grade',
            'class2_grade' => 'Class2 Grade',
            'class3_grade' => 'Class3 Grade',
        ];
    }
}
