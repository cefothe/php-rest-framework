<?php
namespace Framework;

class Route{
    
    private $method=[];
    private $pattern;
    
    public function __construct($method, $pattern) {
      $this->method = is_string($method) ? [$method] : $method;
      $this->pattern = $pattern;
    }
       
}
