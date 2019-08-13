<?php
/**
 * Created by PhpStorm.
 * User: Salah
 * Date: 8/12/19
 * Time: 3:10 PM
 */

namespace app\exporters\job;


use yii\db\Query;

class MiniXMLExporter extends XMLExporter
{
    public function __construct(Query $query)
    {
        parent::__construct($query);

        foreach ($this->jobs as $key=>$job){
            if(strlen($this->jobs[$key]['description']) > 100){
                $this->jobs[$key]['description'] = substr( $this->jobs[$key]['description'], 0, 97).'...';
            }

        }
    }
}