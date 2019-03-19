<?php
/**
 * Interface UrlInterface
 *
 *Provides a set of functions to implement work with Url
 *
 */
interface UrlInterface
{
    public function getScheme();
    public function getHost();
    public function getQueryParams();
}
/**
 * Class Url
 *
 *implements interface UrlInterface functions
 *
 */
class Url implements UrlInterface
{
    public $url;
    public $scheme;
    public $host;
    public $elem;
    public $result = [];


    public function __construct($url)
    {
        $this->url = $url;
        $this->scheme = parse_url($this->url, PHP_URL_SCHEME);
        $this->host = parse_url($this->url, PHP_URL_HOST);
        $this->elem = parse_url($this->url, PHP_URL_QUERY);
    }
    /**
     * defines the protocol
     *
     * @return mixed
     */
    public function getScheme()
    {
        return $this->scheme;
    }
    /**
     * will determine their host
     *
     * @return mixed
     */
    public function getHost()
    {
        return $this->host;
    }
    /**
     * produces in url variable key and their values
     *
     * @return array
     */
    public function getQueryParams()
    {
        $elem1 = explode('&', $this->elem);
        foreach($elem1 as $value)
        {
            $array = explode('=', $value);
            $this->result[$array[0]] = $array[1];
        }
        return $this->result;
    }
    /**
     *
     *using the resulting array of the getQueryParams method searches for a specific key
     *
     * @param      $key
     * @param null $default
     *
     * @return mixed|null
     */
    public function getQueryParam($key, $default = NULL)
    {
        if(array_key_exists($key, $this->getQueryParams()))
        {
            $result = $this->getQueryParams()[$key];
        } else
        {
            $result = $default;
        }
        return $result;
    }
}
$url = new Url('http://yandex.ru?key=value&key2=value2');


