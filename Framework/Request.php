<?php
namespace Framework;

class Request{
    
    private $method = '';
    private $path = '';
    private $data = null;
    
    public function __construct() {
	$this->method = $_SERVER['REQUEST_METHOD'];
	$this->path = trim($_SERVER['PATH_INFO'],'/');
	$this->data = json_decode(file_get_contents('php://input'));
    }
    
    public function  getMethod(){
        return $this->method;
    }
    
    public function getPath(){
        return $this->path;
    }
    
    public function getData(){
        return $this->data;
    } 
    
    public function segment($segment_index, $default=null) {
	$segments = explode('/', $this->path);
            if(isset($segments[$segment_index])) {
		$default = $segments[$segment_index];
            }
	return $default;
    }
}
