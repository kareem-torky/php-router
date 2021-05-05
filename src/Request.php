<?php 

namespace Src;

class Request 
{
    private $url, $method, $data;

    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->fillData();
    }

    public function fillData()
    {
        if ($this->method == 'GET') {
            $this->data = $_GET; 
            $this->url = array_key_first(array_splice($this->data, 0, 1)) ?? "";
        } elseif ($this->method == 'POST') {
            $this->data = array_merge($_POST, $_FILES);
            $this->url = $_SERVER['QUERY_STRING'];
        }
    }

    public function all()
    {
        return $this->data;
    }

    public function get($key)
    {
        return $_GET[$key];
    }

    public function post($key)
    {
        return $_POST[$key];
    }

    public function files($key)
    {
        return $_FILES[$key];
    }

    public function hasFile($key)
    {
        return isset($_FILES[$key]);
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getData()
    {
        return $this->data;
    }

    public function redirect($url)
    {
        $location = URL . $url;
        
        header("location: $location");
    }
}