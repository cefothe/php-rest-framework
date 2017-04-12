<?php
namespace Framework;

class Data{
    public $message= [];
    public $body;
    
    public function error($text) {		
	$this->messages[] = (object) ['type' => 'error', 'text' => $text];
    }
    
	public function info($text) {
	$this->messages[] = (object) ['type' => 'info', 'text' => $text];
    }
    
    public function body($body){
        $this->body=$body;
    }
   
    
}
