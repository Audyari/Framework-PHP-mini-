<?php

class Controller {
    protected function view($view, $data = []) {
        // Extract data array menjadi variables
        extract($data);
        
        // Load view file
        $viewFile = __DIR__ . "/../views/{$view}.php";
        
        if (file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            die("View file not found: {$viewFile}");
        }
    }
}