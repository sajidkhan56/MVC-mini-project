<?php
session_start();
include 'model.php';
class user extends dbcontroller
{    
    private $name;
    private $email;
    private $password;
    private $lemail;
    private $lpassword;
    private $j;
    private $p;
    private $a;
    private $l;
    private $j1;
    private $p1;
    private $lastid;
    private $l1;
    
    
    function __construct()
    {
        parent::__construct();
    }
    function logindata($name,$email,$password )
    {   $this->name=$name;
        $this->email=$email;
        $this->password=$password;
         
        $query="insert into login(username,email,password) values('$this->name','$this->email','$this->password')";
        mysqli_query($this->conn,$query);
         
    }
    function rlogindata($lemail,$lpassword)
    {   
        $this->$lpassword=$lpassword;
        $this->$lemail=$lemail;
            
              
        $query="SELECT email , password  FROM login where email='".$this->$lemail."' && password ='".$this->$lpassword."'";
        $result =  mysqli_query($this->conn,$query);
         
        return $result->num_rows;
        
    }
    function foreignkey($lemail)
    {   $this->$lemail=$lemail;
        $query="SELECT id FROM login WHERE email='".$this->$lemail."'";

        $result= mysqli_query($this->conn,$query);
        
    
        return $result;
    }
    function attendence($j,$p )
    {

        $this->j=$j;
        $this->p=$p;
       
           
        $query="insert into attendence1(loginid,p) values('$this->j', '$this->p')";
        mysqli_query($this->conn,$query);
        
    }
    function update($lastid ,$p)
    {    
        $this->lastid=$lastid;
        
        $this->p1=$p;

        $query="update attendence1 SET p= '$this->p1' WHERE id = '$this->lastid';";
        mysqli_query($this->conn,$query);
         
    }
    function lastid()
    {
        $query="SELECT MAX(id) FROM attendence1";
        $result=mysqli_query($this->conn,$query)  or die("query unsuccessful.");
        $row = $result->fetch_assoc();
        return $row;
        
        
    }
    function rname()
    {   $l2=$_SESSION["id"];
        $query="SELECT DISTINCT username from login where id=$l2 ";
        $result=mysqli_query($this->conn,$query) or die("query unsuccessful.") ;
        return $result;

    }
    function remail()
    {
        $query="select email from login";
        $result=mysqli_query($this->conn,$query) or die("query unsuccessful.") ;
        return $result;

    }
    function genaratereport($offset,$limit_per_page)
    {    $l1=$_SESSION["id"];
         $sql = " SELECT loginid,username,p from attendence1,login where login.id=attendence1.loginid and login.id=$l1
          
         LIMIT {$offset},{$limit_per_page}";
         $result = mysqli_query($this->conn,$sql) or die("Query Unsuccessful.");
         $output= "";
         if(mysqli_num_rows($result) > 0){
         $output .= '<table class="table table-bordered"  >
         <tr>
         <th scope="col">Id</th>
         <th  scope="col" >Username</th>
         <th scope="col">Attendence</th>
         </tr>';
         while($row = mysqli_fetch_assoc($result)) {
         $output .= "<tr><td>{$row["loginid"]}</td><td>{$row["username"]}</td><td>{$row["p"]}</td></tr>";
         }
         $output .= "</table>";
         $output .='</div>';
     
        echo $output;
    }else{
        echo "<h2>No Record Found.</h2>";
    }
    }
    }
?>