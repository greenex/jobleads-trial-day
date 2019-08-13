<?php

namespace app\controllers;

use app\repositories\StudentsRepository;
use Yii;
use yii\web\Controller;

/**
 * StudentsController implements the CRUD actions for Student model.
 */
class StudentsController extends Controller
{

    /**
     * Lists all Student models.
     * @return mixed
     */
    public function actionIndex()
    {
        $repository = new StudentsRepository();
        $dataProvider = $repository->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'repository' => $repository,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Student models.
     * @return mixed
     */
    public function actionAvg()
    {
        $classesAvg =  (new StudentsRepository())->getCoursesAvg();
        $overAllAvg = 0;

        foreach ($classesAvg as $classAvg){
            $overAllAvg+=$classAvg;
        }
        if(count($classesAvg)>0){
            $overAllAvg = $overAllAvg/count($classesAvg);
        }else{
            $overAllAvg =0;
        }

        return $this->render('avg', [
            'result' => $classesAvg,
            'overAllAvg'=>$overAllAvg
        ]);
    }
}
