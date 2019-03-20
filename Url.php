<?php

require_once('UrlInterface.php');

/**
 * Class Url
 */

class Url implements UrlInterface
{
    private $componentUrl;
    private $inputParam;
    private $schemeUrl;
    private $hostUrl;
    private $queryParam;
    private $selectionParam = [];


    public function __construct($url)
    {
        if(filter_var($url, FILTER_VALIDATE_URL))
        {
            $this->inputParam = $url;
            $this->componentUrl = parse_url($this->inputParam);
            $this->schemeUrl = $this->componentUrl['sheme'];
            $this->hostUrl = $this->componentUrl['host'];
            $this->queryParam = $this->componentUrl['query'];
        } else{
            throw new Exception('Введенный адрес не прошел фильтрацию');
        }
    }

    public function getScheme()
    {
        return $this->schemeUrl;
    }

    public function getHost()
    {
        return $this->hostUrl;
    }

    public function getQueryParams()
    {
        $interimVar = explode('&', $this->queryParam);
        foreach($interimVar as $value)
        {
            $interimValue = explode('=', $value);
            $this->selectionParam[$interimValue[0]] = $interimValue[1];
        }
        return $this->selectionParam;
    }

    public function getQueryParam($key, $default = NULL)
    {
        if(array_key_exists($key, $this->getQueryParams()))
        {
            $selectionParam = $this->getQueryParams()[$key];
        } else
        {
            $selectionParam = $default;
        }
        return $selectionParam;
    }
}
$url = new Url('http://yandex.ru?key=value&key2=value2');

print_r($url->getScheme());

