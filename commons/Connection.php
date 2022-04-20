<?php

// Singleton to connect db.
class Connection {
	// Hold the class instance.
	private static $instance = null;
	private $conn;
	private $dbPort = '3307'; // Tanishq: My new port is 3302.
	private $dbhost = 'localhost';
	private $user = 'root'; // please change them as per your system 
	private $pass = 'root'; // please change them as per your system
	private $database = 'fooder';
     
  	// The db connection is established in the private constructor.
  	private function __construct()
  	{
		try {
			$this->conn = new PDO(
				"mysql:host={$this->dbhost}:{$this->dbPort};dbname={$this->database};charset=utf8",
				$this->user,
				$this->pass
			);

		  	// set the PDO error mode to exception
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e) {
			echo 'Connection failed: ' . $e->getMessage();
		}
  }
    
  public static function getInstance()
  {
    if(!self::$instance)
    {
      self::$instance = new Connection();
    }
   
    return self::$instance;
  }
    
  public function getConnection()
  {
    return $this->conn;
  }
}