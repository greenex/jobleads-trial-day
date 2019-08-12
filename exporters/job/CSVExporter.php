<?php
/**
 * Created by PhpStorm.
 * User: Salah
 * Date: 8/12/19
 * Time: 3:10 PM
 */

namespace app\exporters\job;



class CSVExporter extends BaseExporter
{
    public function save($path)
    {
        $fp = fopen($path, 'w');
        fputcsv($fp, ['id','name','description']);
        foreach ($this->jobs as $job) {
            fputcsv($fp, $job);
        }
        fclose($fp);
    }

    public function download($filename)
    {
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=".$filename);
        header("Content-type: text/csv");
        header("Content-Transfer-Encoding: binary");
        $this>$this->save('php://output');
    }

}