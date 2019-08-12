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
        return $this->render('avg', [
            'result' => (new StudentsRepository())->getCoursesAvg(),
        ]);
    }
}
