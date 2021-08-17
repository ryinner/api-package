<?php

namespace ApiPackage;

class ApiController
{
    /**
     * Your url adress
     *
     * @var string uri
     */
    public $uri;

    public function __construct(string $uri)
    {
        $this->uri = $uri;
    }

    /**
     * Connection to Api
     *
     * @param string $url
     * @return $answer is ApiAnswer 
     */
    public function Curl(string $url)
    {
        $curl = curl_init();
        curl_setopt($curl,CURLOPT_URL,$url);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        $answer = curl_exec($curl);
        curl_close($curl);
        return json_decode($answer);
    }

    /**
     * Get everything from dataBase table
     *
     * @param string $prefix
     * @return Json_decode data from Api 
     */
    public function get(string $prefix = null)
    {
        $url = $this->uri;
        if ($prefix !== null) {
            $url .= $prefix;
        }

        return $this->Curl($url);
    }

    /**
     * Get thisOne from database
     *
     * @param string $prefix
     * @param integer $id
     * @return Json_decode data from Api 
     */
    public function getThis(string $prefix = null, int $id)
    {
        $url = $this->uri;
        if ($prefix !== null) {
            $url.=$prefix.'/';
        }
        $url .= $id;

        return $this->Curl($url);
    }
}