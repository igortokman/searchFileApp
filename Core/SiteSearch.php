<?php

/**
 * Created by PhpStorm.
 * User: igortokman
 * Date: 19.03.16
 * Time: 0:42
 */

namespace Core;

class SiteSearch
{
    public $data;
    public $headers = array();
    public $url;
    public $fileName;

    /**
     * SiteSearch constructor.
     * @param $url
     * @param $fileName
     */
    public function __construct($url, $fileName)
    {
        $this->url = $url;
        $this->fileName = $fileName;
        $this->request('http://' . $url . '/' . $fileName);
    }

    /**
     * Gets file data and headers by url
     * @param $url
     */
    public function request($url){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);

        $this->data = curl_exec($ch);

        if(!curl_errno($ch))
           $this->headers = curl_getinfo($ch);

        curl_close($ch);

    }

    /**
     * Fetches file header by its name
     * @param $headerName
     * @return string | null if it does not exist
     */
    public function getHeader($headerName){
        return array_key_exists($headerName, $this->headers)? $this->headers[$headerName] : null;
    }

    /**
     * Checks if the file exists
     * @return bool
     */
    public function fileExistence(){
        return ($this->getHeader('http_code') === 200);
    }

    /**
     * Gets file size
     * @return null
     */
    public function getSize(){
        return $this->getHeader('size_download');
    }

    /**
     * Verifies if some directive exists
     * @param $directiveName
     * @return bool
     */
    public function directiveExistence($directiveName){
        return $this->directiveCount($directiveName) > 0;
    }

    /**
     * Gets the count of some directive
     * @param $directiveName
     * @return int
     */
    public function directiveCount($directiveName){
        return count($this->directiveSearch($directiveName));
    }

    /**
     * Fetches the array of directives
     * @param $directiveName
     * @return mixed
     */
    public function directiveSearch($directiveName){
        preg_match_all('/'. $directiveName.'/', $this->data, $matches);
        return $matches[0];
    }
}