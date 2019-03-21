<?php

declare(strict_types=1);

require_once('UrlInterface.php');

/**
 * Class Url наследует методы Интерфейса  UrlInterface, и реализует представления параметров сущности Url.
 *
 * На  вход принимается данные строгой типизации, типа string, непосредственно сам Url.
 * Методом __construct, производится проверка входных данных и разборка строки на основные параметры.
 * В результате чего производится присвоение полученных значений основным свойствам класса,
 * которые закрыты для внешнего использования.
 *
 * Основные свойства:
 *
 * $componentUrl - массив состоящий из всех возможных элементов Url;
 * $inputParam - входная строка;
 * $schemeUrl;
 * $hostUrl;
 * $portUrl;
 * $userUrl;
 * $passUrl;
 * $pathUrl;
 * $fragmentUrl;
 * $queryParam;
 *
 * Реализована полноценная разборка Url, что позволяет расширять данный класс.
 *
 * Для обращения к данным свойствам создан набор методов, которые отвечают за представления данных свойств вне класса.
 * В основе закладывалась реализация, представления отдельных элементов строки Url,
 * что является единственной обязанностью класса Url.
 */

class Url implements UrlInterface
{
    private $componentUrl = 'Элемент отсутствует';
    private $inputParam = 'Элемент отсутствует';
    private $schemeUrl = 'Элемент отсутствует';
    private $hostUrl = 'Элемент отсутствует';
    private $portUrl = 'Элемент отсутствует';
    private $userUrl = 'Элемент отсутствует';
    private $passUrl = 'Элемент отсутствует';
    private $pathUrl = 'Элемент отсутствует';
    private $fragmentUrl = 'Элемент отсутствует';
    private $queryParam = 'Элемент отсутствует';
    private $paramSet = [];


    public function __construct(string $url)
    {
        if(filter_var($url, FILTER_VALIDATE_URL) !== false)
        {
            $this->inputParam = $url;

            $this->componentUrl = parse_url($this->inputParam);

            if(!empty($this->componentUrl['scheme']))
            {
                $this->schemeUrl = $this->componentUrl['scheme'];
            }

            if(!empty($this->componentUrl['host']))
            {
                $this->hostUrl = $this->componentUrl['host'];
            }

            if(!empty($this->componentUrl['port']))
            {
                $this->hostUrl = $this->componentUrl['port'];
            }

            if(!empty($this->componentUrl['pass']))
            {
                $this->hostUrl = $this->componentUrl['pass'];
            }

            if(!empty($this->componentUrl['path']))
            {
                $this->hostUrl = $this->componentUrl['path'];
            }

            if(!empty($this->componentUrl['user']))
            {
                $this->hostUrl = $this->componentUrl['user'];
            }

            if(!empty($this->componentUrl['query']))
            {
                $this->queryParam = $this->componentUrl['query'];

                $interimVar = explode('&', $this->queryParam);
                foreach($interimVar as $value)
                {
                    $interimValue = explode('=', $value);
                    $this->paramSet[$interimValue[0]] = $interimValue[1];
                }
            }

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
        return $this->paramSet;
    }

    public function getQueryParam(string $key, string $default = NULL) : ?string
    {
        if(!empty($this->paramSet) && array_key_exists($key, $this->paramSet))
        {
            $selectionParam = $this->paramSet[$key];
        } else
        {
            $selectionParam = $default;
        }
        return $selectionParam;
    }
}
$url = new Url('http://yandex.ru?key=value&key2=value2');

print_r($url->getQueryParam('new', 'ehu'));

