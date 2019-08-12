<?php

namespace app\forms\jobs;


use app\exporters\job\CSVExporter;
use app\exporters\job\MiniXMLExporter;
use app\exporters\job\XMLExporter;

class JobExportForm extends \yii\base\Model
{
    static $formatsMap =[
        'csv'=>'csv',
        'xml'=>'xml',
        'mini-xml'=>'xml'
    ];
    public $format;
    public $email;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['format'], 'required'],
            // rememberMe must be a boolean value
            ['email', 'email','skipOnEmpty'=>true],

        ];
    }

    public function getFileExtention()
    {
        switch ($this->format){
            case 'csv':
                return 'csv';
            case 'xml':
                return 'xml';
            case 'mini-xml':
                return 'xml';
            default:
                throw new InvalidArgumentException('wrong format');
        }
    }

    public function getExporter($query)
    {
        switch ($this->format){
            case 'csv':
                return new CSVExporter($query);
            case 'xml':
                return new XMLExporter($query);
            case 'mini-xml':
                return new MiniXMLExporter($query);
            default:
                throw new InvalidArgumentException('wrong format');
        }
    }



}