<?php
class HomeController
{

    public function index()
    {
        echo "Home controller";
    }

    public function test($name = null)
    {
        if ($name === null) {
            echo "Home controller Tanpa Parameter";
        } else {
            echo "Home controller Dengan Parameter: " . $name;
        }
    }
    
   
}