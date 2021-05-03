<?php 

namespace PhpRouter\Src;

class Request 
{
    private $method, $data;

    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->fillData();
    }

    public function fillData()
    {
        if ($this->method == 'GET') {
            $this->data = $_GET; 
        } elseif ($this->method == 'POST') {
            $this->data = array_merge($_POST, $_FILES);
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
}