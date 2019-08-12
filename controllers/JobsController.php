<?php

namespace app\controllers;


use app\forms\jobs\JobExportForm;
use app\models\Job;
use http\Exception\InvalidArgumentException;
use Yii;

class JobsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $formModel = new JobExportForm();
        if ($formModel->load(Yii::$app->request->post()) && $formModel->validate()) {
           $exporter = $formModel->getExporter(Job::find());
           if(!empty($formModel->email)){
               $file = \Yii::getAlias('@app').DIRECTORY_SEPARATOR.'files'.DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR.'jobs_'.time().$formModel->getFileExtention();
               Yii::$app->mailer->compose()
                   ->setFrom('from@domain.com')
                   ->setTo($formModel->email)
                   ->setSubject('Export Result')
                   ->setTextBody('Export Result\'')
                   ->attach($file)
                   ->send();
           }else{
               $exporter->download('jobs.'.$formModel->getFileExtention());
           }
        }

        return $this->render('index',['formModel'=>$formModel]);
    }

    public function actionDownloadCsv(){
        $exporter = new CSVExporter(Job::find());
        $exporter->download('jobs.csv');
        exit;
    }

    public function actionDownloadXml()
    {
        $exporter = new XMLExporter(Job::find());
        $exporter->download('jobs.xml');
        exit;

    }
    public function actionDownloadMiniXml()
    {
        $exporter = new MiniXMLExporter(Job::find());
        $exporter->download('jobs.xml');
        exit;

    }



}
