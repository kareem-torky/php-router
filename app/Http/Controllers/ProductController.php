<?php 

namespace App\Http\Controllers;

use Src\Controller;

class ProductController extends Controller
{
    public function index($data)
    {
        // dump($data);
        echo 'product index';
    }

    public function create()
    {
        echo 'product create';
    }

    public function store()
    {
        echo 'product store';
    }
}