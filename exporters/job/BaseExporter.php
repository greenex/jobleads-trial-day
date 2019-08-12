<?php
/**
 * Created by PhpStorm.
 * User: Salah
 * Date: 8/12/19
 * Time: 3:11 PM
 */

namespace app\exporters\job;


use app\models\Job;

use yii\db\Query;

abstract class BaseExporter
{
    /** @var array */
    public $jobs;

    /**
     * get data on construct
     *
     * @param Query $query
     *
     * @return ActiveDataProvider
     */
    public function __construct(Query $query)
    {
        $this->jobs = $query->asArray()->all();
    }

    /**
     * save data into file
     *
     * @param string $path
     *
     * @return void
     */
    public abstract function save($path);

    /**
     * download data
     *
     * @param string $filename
     *
     * @return void
     */
    public abstract function download($filename);



}