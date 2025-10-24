<?php

class Route
{
    protected $controller = 'ErorController';
    protected $method = 'index';
    protected $param = [];

    public function __construct()
    {
        $url = $this->getUrl();
        
        // Jika URL kosong, gunakan default homeController
        if (empty($url[0])) {
            $this->loadDefaultController();
            return;
        }

        // Validasi controller
        $controllerName = $url[0] . 'Controller';
        $controllerFile = '../app/Controllers/' . $controllerName . '.php';

        if (!file_exists($controllerFile)) {
            $this->handleNotFound("Controller {$controllerName} not found");
            return;
        }

        require_once $controllerFile;
        
        if (!class_exists($controllerName)) {
            $this->handleNotFound("Class {$controllerName} not found");
            return;
        }

        $this->controller = new $controllerName();

        // Validasi method - jika tidak ada method di URL, gunakan default 'index'
        $methodName = $url[1] ?? 'index';
        
        if (!method_exists($this->controller, $methodName)) {
            $this->handleNotFound("Method {$methodName} not found in {$controllerName}");
            return;
        }

        $this->method = $methodName;

        // Validasi parameter count berdasarkan method yang dipanggil
        $expectedParams = $this->getExpectedParameterCount($controllerName, $methodName);
        $actualParams = array_slice($url, 2); // Parameter mulai dari index 2

        if (count($actualParams) > $expectedParams) {
            $this->handleNotFound("Too many parameters for {$controllerName}::{$methodName}");
            return;
        }

        $this->param = $actualParams;
        call_user_func_array([$this->controller, $this->method], $this->param);
    }

    private function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            return explode('/', $url);
        }
        return [];
    }

    private function loadDefaultController()
    {
        $defaultController = 'homeController';
        $defaultFile = '../app/Controllers/' . $defaultController . '.php';
        
        if (file_exists($defaultFile)) {
            require_once $defaultFile;
            $this->controller = new $defaultController();
            call_user_func([$this->controller, $this->method]);
        } else {
            $this->handleNotFound("Default controller not found");
        }
    }

    private function getExpectedParameterCount($controller, $method)
    {
        try {
            $reflection = new ReflectionMethod($controller, $method);
            return $reflection->getNumberOfParameters();
        } catch (ReflectionException $e) {
            return 0;
        }
    }

    private function handleNotFound($message = 'Page not found')
    {
        http_response_code(404);
        
        // Coba load error controller
        $errorControllerFile = '../app/Controllers/ErorController.php';
        if (file_exists($errorControllerFile)) {
            require_once $errorControllerFile;
            if (class_exists('ErorController')) {
                $errorController = new ErorController();
                if (method_exists($errorController, 'index')) {
                    $errorController->index($message);
                    return;
                }
            }
        }
        
        // Fallback
        die('404 - ' . $message);
    }
}