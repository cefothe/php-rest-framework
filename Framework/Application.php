<?php
namespace Framework;

class Application{
    private $route = [];
    
    private function map(array $methods, $pattern, $callable){
        $this->route[] = new Route($methods, $pattern);
    }
    
    public function __construct() {
 
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
    
    public function print_route(){
        print_r($this->route);
    }
} 
