<?php

namespace app\controllers;

use app\repositories\FilesRepository;

class FilesController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $repository = new FilesRepository();
        return $this->render('index',['repository'=>$repository]);
    }

}
