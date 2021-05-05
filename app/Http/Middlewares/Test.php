<?php 

namespace App\Http\Middlewares;

use Src\Middleware;
use Src\Request;

class Test extends Middleware
{
    public function handle(Request $request)
    {
        $condition = true;

        if (! $condition) {
            $request->redirect("home");
        }

        return true;
    }
}