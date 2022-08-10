<?php 
session_start();
include 'model/user.php'; 
   
class controller
{
       public $db_handle;
   
       public function main($action)
       {
  
        if($action=='reg'){      
           
        include("view/registaration.php");
        
       } 
       }
       public function regform($name, $email, $password)
       {
       
        $db_handle = new user;
        $db_handle->logindata($name, $email, $password);
     
       }
       
}
class controller1 extends controller
{      
       static public function main1()
       {
         $lemail= filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
         $lpassword = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
         
     
         if(isset($_POST['submit'])){

           $name = filter_input(INPUT_POST, "un", FILTER_SANITIZE_STRING);
           $email= filter_input(INPUT_POST, "em", FILTER_SANITIZE_STRING);
           $password = filter_input(INPUT_POST, "ps", FILTER_SANITIZE_STRING);
           

          }
         
         $p=$_POST['p'];
         $j=$_POST['value'];
       
         if($p=='L' || $p=='A' || $p=='P'){
           $db_handle = new user;
           $db_handle->attendence($j,$p );
         }
         else if($p=='UL' || $p=='UA' || $p=='UP'){
           $db_handle = new user;
           $last=$db_handle->lastid();
           $b=$last['MAX(id)'];
           $db_handle->update($b,$p);
         }
        ?>
         <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <?php

        if($p !=''&& $j !=''){
         echo '<script type="text/javascript">';
         echo 'setTimeout(function () { swal(" ","Add Successfully","success");';
         echo '}, 10);</script>';
         include 'view/dashboard.php';
         }               
               
         $action=' ';
         if(!empty($_GET['action'])){
         $action=$_GET['action'];
       
         }
         ?>
         <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
         <?php
         if(!empty($name && $email && $password)){
            $db_handle2 = new user;
            $row=$db_handle2->remail();
            $count=0;
            while ($row1=$row->fetch_assoc()) {
            if($email==$row1["email"])
            {  
               $count++;
               break;
            }
          }
          if($count>0){
              echo '<script type="text/javascript">';
              echo 'setTimeout(function () { swal(" ","User Already Registers with this emial","error");';
              echo '}, 10);</script>';
              include("view/registaration.php");   
              }
              else{
               parent::regform($name,$email,$password);
               echo '<script type="text/javascript">';
               echo 'setTimeout(function () { swal(" ","Registers Successfully","success");';
               echo '}, 10);</script>';
               include 'main.php';
            
               }
             }
           if(!empty($lemail && $lpassword)){   
           $db_handle = new user;
           $result=$db_handle->rlogindata($lemail,$lpassword);
              
               
           if($result>0){
           $db_handle = new user;
           $result1=$db_handle->foreignkey($lemail);
           $row = $result1->fetch_assoc();
           $j=$row['id'];
           $_SESSION["id"]=$j;

           $data=$db_handle->rname();
           $row = $data->fetch_assoc();
           $j=$row['username'];
           $_SESSION["username"]=$j;
                     
           include 'view/dashboard.php';
           }else{
                     
           echo '<script type="text/javascript" >';
           echo 'setTimeout(function () { swal("","Invalid password or user name","error");';
           echo '}, 10);</script>';
           include 'main.php'; 
          
          }    
          }
          $limit_per_page = 5;
          $page = "";
        
          if(isset($_POST["page_no"])){
          $page = $_POST["page_no"];
          }else{
          $page = 1;
          }
        
          $offset = ($page - 1) * $limit_per_page;
          $l=$_POST["id"];
        
         $db_handle1=new user;
         if($l==2){
         $db_handle1->genaratereport($offset,$limit_per_page);
         } 
        
        
        
         parent::main($action);
         
      }
 }
?>