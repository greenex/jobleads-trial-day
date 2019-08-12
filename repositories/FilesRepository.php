<?php
/**
 * Created by PhpStorm.
 * User: Salah
 * Date: 8/12/19
 * Time: 1:23 PM
 */

namespace app\repositories;


class FilesRepository
{
    private $txtContent;
    private $csvContent;
    public function __construct()
    {
        $this->txtContent = $this->getTxtFileContent();
        $this->csvContent = $this->getCsvFileContent();
    }

    private function getTxtFileContent()
    {
        $filePath = \Yii::getAlias('@app').DIRECTORY_SEPARATOR.'files'.DIRECTORY_SEPARATOR.'file1.txt';
        $data = [];
        $handel = fopen($filePath,"r");
        while(! feof($handel))  {
            $result = fgets($handel);
            $data[] = (int)$result;
        }
        fclose($handel);

        return $data;
    }

    private function getCsvFileContent()
    {
        $filePath = \Yii::getAlias('@app').DIRECTORY_SEPARATOR.'files'.DIRECTORY_SEPARATOR.'file2.csv';
        $data = [];
        $handel = fopen($filePath, "r");
        while (($lineData = fgetcsv($handel, 1000, ",")) !== FALSE)
        {
            $data = array_merge($data,$lineData);
        }
        fclose($handel);

        return $data;
    }

    public function getTextData()
    {
        return $this->txtContent;
    }

    public function getCsvData()
    {
        return $this->csvContent;
    }

    public function getSortedTextData()
    {
        $data = $this->getTextData();
        sort($data);
        return $data;
    }

    public function getSortedCsvData()
    {
        $data = $this->getCsvData();
        sort($data);
        return $data;
    }

    public function getIntersect()
    {
        return array_intersect($this->txtContent,$this->csvContent);
    }


}