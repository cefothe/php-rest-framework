<?php
namespace Framework;

use PDO;

class Database {
	private $_connection;
	private static $_instance; //The single instance
	private $_host = "localhost";
	private $_username = "phpframework";
	private $_password = "framework";
	private $_database = "robo-party";
	
        public static function getInstance() {
            if(!self::$_instance) { // If no instance then make one
		self::$_instance = new self();
		}
            return self::$_instance;
	}
	// Constructor
	private function __construct() {
	$this->_connection = new PDO("mysql:host=".$this->_host.";dbname=".$this->_database.";charset=UTF8", $this->_username, $this->_password);
        $this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
            // Error handling
            if(mysqli_connect_error()) {
		trigger_error("Failed to conencto to MySQL: " . mysql_connect_error(),E_USER_ERROR);
                }
	}
		// Magic method clone is empty to prevent duplication of connection
	private function __clone() { }
	// Get mysqli connection
	public function getConnection() {
        	return $this->_connection;
	}
}

