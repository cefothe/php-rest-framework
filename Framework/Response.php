<?php
namespace Framework;

class Response{
    private $code = 200;
    private $data;
    
    public function __construct() {
        $this->data = new Data();
    }

    public function addData($data){
        $this->data->body($data);
    }
 
    public function code($code){
        $this->code=$code;
    }
    
    public function getData(){
        return $this->data;
    }

    public function render(){
        header("Content-Type: application/json; charset=utf-8");
        http_response_code($this->code);
        $flags = JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT;
        return json_encode((object) array_filter((array)$this->data), $flags);
    }
}