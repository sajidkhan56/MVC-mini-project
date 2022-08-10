<?php  
class dbcontroller
{
    private $host="localhost";
    private $user="root";
    private $password="admin123";
    private $database="project";
    public $conn;
 
    function __construct()
    {
        $this->conn=$this->connectdb();
    }
 
    function connectdb()
    {
        $conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        return $conn;
    }
}
?>