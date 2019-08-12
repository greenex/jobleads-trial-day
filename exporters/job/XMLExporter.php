<?php
/**
 * Created by PhpStorm.
 * User: Salah
 * Date: 8/12/19
 * Time: 3:10 PM
 */

namespace app\exporters\job;



class XMLExporter extends BaseExporter
{
    public function save($path)
    {
        $this->getXml()->save($path);
    }

    public function download($filename)
    {
        header('Content-type: text/xml');
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        echo $this->getXml()->saveXML();
    }

    /**
     * @return \DOMDocument
     */
    private function getXml(){
        $xml = new \DOMDocument();
        $rootNode = $xml->appendChild($xml->createElement("jobs"));
        foreach ($this->jobs as $job) {
            if (! empty($job)) {
                $itemNode = $rootNode->appendChild($xml->createElement('job'));
                foreach ($job as $k => $v) {
                    $itemNode->appendChild($xml->createElement($k, $v));
                }
            }
        }
        $xml->formatOutput = true;
        return $xml;
    }
}