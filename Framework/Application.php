<?php
namespace Framework;

class Application{
    private $route = [];
    public $request;
    public $response;
    private $database;




    private function map(array $methods, $pattern, $callable){
        $this->route[] = new Route($methods, $pattern, $callable);
    }
    
    public function __construct() {
        $this->request= new Request();
        $this->response = new Response();
        $this->database= Database::getInstance();
    }


    public function get($pattern, $callable){
        $this->map(['GET'], $pattern, $callable);
    }
    
    public function post($pattern, $callable){
        $this->map(['POST'], $pattern, $callable);
    }
    public function delete($pattern, $callable){
        $this->map(['DELETE'], $pattern, $callable);
    }
    
    public function any($pattern, $callable){
         $this->map(['DELETE','POST','GET'], $pattern, $callable);
    }
    
    public function run(){
        
        $found = false; 
        
         foreach ($this->route as $value){
             $reg_exp = '/^'.str_replace('/', '\/', $value->getPattern()).'$/';
            if(in_array($this->request->getMethod(), $value->getMethod()) &&
                    preg_match($reg_exp, $this->request->getPath())){
                $value->execute();
                $found = true;
                break;
            }
        }
        if(!$found){
            $this->response->code(404);
            $this->response->getData()->error("Page not found");
        }
        echo $this->response->render();
    }
} 
