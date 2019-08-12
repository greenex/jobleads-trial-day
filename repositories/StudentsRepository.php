<?php
/**
 * Created by PhpStorm.
 * User: Salah
 * Date: 8/12/19
 * Time: 1:23 PM
 */

namespace app\repositories;

use phpDocumentor\Reflection\Types\Array_;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Student;

class StudentsRepository extends Student
{

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['first_name', 'last_name'], 'safe'],
            [['class1_grade', 'class2_grade', 'class3_grade'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Student::find();

        // add conditions that should always apply here
        $query->select([
            '*',
            '((class1_grade+class2_grade+class3_grade)/3) as avg_grade'
        ]);
        //$query->groupBy('id');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'class1_grade' => $this->class1_grade,
            'class2_grade' => $this->class2_grade,
            'class3_grade' => $this->class3_grade,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name]);

        return $dataProvider;
    }

    /**
     * Calculate Each Class AVG
     *
     * @return Array_
     */
    public function getCoursesAvg()
    {
        return Student::find()->select([
            'AVG(class1_grade) as class1_avg','AVG(class2_grade) as class2_avg','AVG(class3_grade) as class3_avg'
        ])->asArray()->one();
    }


}