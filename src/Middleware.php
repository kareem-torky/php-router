<?php 

namespace Src;

abstract class Middleware 
{
    abstract public function handle(Request $request);
}