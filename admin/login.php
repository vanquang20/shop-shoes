<?php
include('includes/header.php'); 

include '../controller/adminlogin.php';
$class = new adminlogin();
?>
  <?php 
    
    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
      $adminUser = $_POST['adminUser'];
      $adminPass = md5($_POST['adminPass']);

      $login_check = $class->login_admin($adminUser,$adminPass);
    }
  ?>
<div class="container">
<!-- Outer Row -->
<div class="row justify-content-center">
  <div class="col-xl-6 col-lg-6 col-md-6">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">ADMIN LOGIN</h1>
                <span>
                  <?php 
                    if(isset($login_check))
                    {
                        echo $login_check;
                    }
                  ?>
                </span>
                      </div>

                <form class="user" action="login.php" method="POST">
                    <div class="form-group">
                    <input type="text" name="adminUser" class="form-control form-control-user" placeholder="Vui lòng nhập User...">
                    </div>
                    <div class="form-group">
                    <input type="password" name="adminPass" class="form-control form-control-user" placeholder="Vui lòng nhập Password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block"> Login </button>
                    <hr>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>


<?php
include('includes/scripts.php'); 
?>