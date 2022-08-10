<?php
session_start();

if(isset($_SESSION["id"])){
   
  session_unset();
  session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Main page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <section class="vh-100" style="background-color: #508bfc;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <h3 class="mb-5">Sign in</h3>
              <form action="." method="POST">
              <div class="form-outline mb-4">
               <input type="email" id="typeEmailX-2" name="email" class="form-control form-control-lg" required >
               <label class="form-label" for="typeEmailX-2">Email</label>
              </div>

              <div class="form-outline mb-4">
               <input type="password" id="typePasswordX-2" name="password" class="form-control form-control-lg" required>
               <label class="form-label" for="typePasswordX-2">Password</label>
              </div>
           
              <form action="." method="GET"> 
               <a href="index.php?action=login">  <input type="submit" class="btn btn-primary btn-lg btn-block" name="Login" value="Login"></a>
               </form>
               <br>
               <p class="mb-0 me-2">Don't have an account?</p>
              <form action="." method="POST"> 
               <a href="index.php?action=reg">  Create new </button>  
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> 
</body>
<html>