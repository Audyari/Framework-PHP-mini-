<?php

spl_autoload_register(function ($class) {
    require_once $class . ".php";
});


$user = new User();
$product = new Product();
