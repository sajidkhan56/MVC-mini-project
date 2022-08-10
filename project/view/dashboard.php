<?php
    session_start();    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     
    <link href="view/footers.css" rel="stylesheet">
    <link rel="stylesheet" href="view/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css"/>
    <link rel="stylesheet" href="view/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="view/style.css" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="view/file.js"></script>

    <title>Dashboard</title>
 </head>
 <body>
     <!-- header -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
       <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar"
          aria-controls="offcanvasExample">
         <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
        </button>
        <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold">Attendence Managment System</a>
        <a href="main.php"> <button class="navbar-toggler">
        <i class="bi bi-box-arrow-left"></i>
        </button></a>
        </div>
     </nav>
    <!-- header -->

    <!-- side window -->
    <div class="offcanvas offcanvas-start sidebar-nav bg-dark" tabindex="-1" id="sidebar">
      <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
          <ul class="navbar-nav"><br>
           <P class="text-white">Welcome! <i class="bi bi-person-check"></i>     <?php echo $_SESSION["username"];?></p>
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
             <li>
              <div class="list-group"> 
              <a class="list-group-item ">
                <span class="me-2"><i class="bi bi-pencil-square"  ></i></span>
                <span id="show2" >
                <button type="button" class="btn btn-outline-secondary text-dark">Update Attendence</button>
                </span> 
              </a>
              <div>
            </li>
            <li>
            <div class="list-group">
              <a class="list-group-item">
                <span class="me-2"><i class="bi bi-file-earmark-fill" ></i></span>
                 <span id="show3" ><button type="button" class="btn btn-outline-secondary text-dark">Genarate report</button></span> 
                </a>
             </div>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <!-- side window-->

    <main class="mt-5 pt-3">
      <div class="container-fluid">
        <div class="row">
           <div class="row">
             <div class="col-md-12 mb-3">
                 <br><br><br><br><br> 
                   <div id="main">
                    <div class="card">
                      <div class="card-header">
                        <span><i class="bi bi-plus-square-fill"></i>  </span> Add Attendence
                      </div>
                      <div class="card-body">
                      <div class="table-responsive">
                      <form action="." method="POST">
                      <table id="example" class="table table-striped table-sm " style="width: 100%">
                       <thead>
                       <tr>
                         <th>Present</th>
                         <th>Abbsent</th>
                         <th>Leave</th>
                         <th>Submit</th>
                       </tr>
                       </thead>
                       <tbody>
                        <tr>
                         <td><input type="radio" id="html" name="p" value="P"></td>
                         <td><input type="radio" id="html" name="p" value="A"></td>
                         <td><input type="radio" id="html" name="p" value="L"></td>
                         <input type="hidden" name="value" id="login_email" value="<?=$_SESSION["id"]?> " >
                         <td><input type="submit" name="submit" value="submit"  class="btn btn-outline-dark btn-sm" ></td>
                        </tr>
                        </tbody>
                        </table>
                      </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="main1" style="display: none;">
                <center><p>You can update only last record</p></center>
                 <div class="card">
                  <div class="card-header">
                    <span><i class="bi bi-plus-square-fill"></i>  </span> Add Attendence
                  </div>
                    <div class="card-body">
                    <div class="table-responsive">
                     <form action="." method="POST">
                     <table id="example" class="table table-striped table-sm " style="width: 100%">
                     <thead>
                      <tr>
                        <th>Present</th>
                        <th>Abbsent</th>
                        <th>Leave</th>
                        <th>Submit</th>
                     </tr>
                     </thead>
                     <tbody>
                      <tr>
                        <td><input type="radio" id="html" name="p" value="UP"></td>
                        <td><input type="radio" id="html" name="p" value="UA"></td>
                        <td><input type="radio" id="html" name="p" value="UL"></td>
                        <input type="hidden" name="value" id="login_email" value="<?=$_SESSION["id"]?> " >
                        <td><input type="submit" name="submit" value="submit"  class="btn btn-outline-dark btn-sm" ></td>
                      </tr>
                      </tbody>
                      </table>
                      </form>
                    </div>
                 </div>
               </div>
             </div>
         
             <!--report part--->
             <div id="main2" style="display: none;">
              <div id="table-data">
              </div>
             <div id="pagination" class=" text-center">
               <a class="btn btn-primary" href=" " role="button" id="1" >1</a>
               <a class="btn btn-primary" href=" " role="button" id="2" >2</a>
               <a class="btn btn-primary" href=" " role="button" id="3" >3</a>
             </div>
             <script type="text/javascript" src="jquery.js"></script>
             <script type="text/javascript">
             $(document).ready(function() {
             function loadTable(page){
             $.ajax({
             url: "index.php",
             type: "POST",
             data: {page_no :page, id:2 },
             success: function(data) {
             $("#table-data").html(data);
             }
             });
             }
             loadTable();
            
             //Pagination Code
             $(document).on("click","#pagination a",function(e) {
             e.preventDefault();
             var page_id = $(this).attr("id");

             loadTable(page_id);
             })
             });
             </script>
             </div>
           </div>
         </div>
       </div>
     </main>
     <br>
     <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
     <symbol id="facebook" viewBox="0 0 16 16">
      <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
     </symbol>
     <symbol id="instagram" viewBox="0 0 16 16">
      <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
     </symbol>
     <symbol id="twitter" viewBox="0 0 16 16">
      <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
     </symbol>
     </svg>
     <div id="footer">
     <div class="b-example-divider bg-primary"></div>
     <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
       <div class="col-md-4 d-flex align-items-center">
          <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
           <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
          </a>
          <span class="text-dark">&copy; 2021 Sajid Khan.Inc</span>
        </div>
        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
         <li class="ms-3"><a class="text-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
         <li class="ms-3"><a class="text-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
         <li class="ms-3"><a class="text-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
        </ul>
     </footer>
     </div>
     <script src="./view/bootstrap.bundle.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
     <script src="./view/jquery-3.5.1.js"></script>
     <script src="./view/jquery.dataTables.min.js"></script>
     <script src="./view/dataTables.bootstrap5.min.js"></script>
   </body>
 </html>
