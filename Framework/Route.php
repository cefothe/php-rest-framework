<?php
namespace Framework;

class Route{
    
    private $method=[];
    private $pattern;
    private $callable;
    
    public function __construct($method, $pattern, $callable) {
      $this->method = is_string($method) ? [$method] : $method;
      $this->pattern = $pattern;
      $this->callable = $callable; 
    }
    
    public function execute(){
        call_user_func_array($this->callable,array());
    }
    
    public function getMethod(){
        return $this->method;
    }
    
    public function getPattern(){
        return $this->pattern;
    }
}
