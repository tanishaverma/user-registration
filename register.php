<?php
include 'inc/header.php';
Session::CheckLogin();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
  $register = $users->userRegistration($_POST);
}

if (isset($register)) {
  echo $register;
}
 ?>
 <script>
        $(document).ready(function () {
            $('#register').on('click', function (e) {
               var isFormValid =  $('#basic-form').validate();
               if(isFormValid){
                $('form#basic-form').submit();
               }
            });
          $("#password").keypress(function(){  
            var letters = /^[a-zA-Z0-9_-]{5,15}$/;
            if(letters.test($(this).val())){
                $('.check_error_msg').css('display','block');
                $(".check_error_msg").text("Error! Your Password Must Contain At Least 8 char, 1 Number, 1 uppercase, 1 lowercase ");
            }else{
                $('.check_error_msg').css('display','none');
            }
          });
        });
  </script>
 <div class="card ">
   <div class="card-header">
          <h3 class='text-center'>User Registration</h3>
        </div>
        <div class="cad-body">
            <div style="width:600px; margin:0px auto">
            <form id="basic-form" class="" action="" method="post" enctype="multipart/form-data">
                <div class="form-group pt-3">
                  <label for="name">Your name</label>
                  <input type="text" name="name"  class="form-control" data-validate="required">
                </div>
                <div class="form-group">
                  <label for="username">Your username</label>
                  <input type="text" name="username"  class="form-control" data-validate="required">
                </div>
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" name="email"  class="form-control" data-validate="required">
                </div>
                <div class="form-group">
                  <label for="mobile">Mobile Number</label>
                  <input type="text" name="mobile"  class="form-control" data-validate="required">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password" id="password" class="form-control" data-validate="required">
                  <input type="hidden" name="roleid" value="3" class="form-control">
                  <span class="check_error_msg">This field is required</span>
                </div>
                <div class="form-group">
                  <label for="password">Profile</label>
                  <input type="file" name="my_image" id="my_image" class="form-control" data-validate="required" accept=".jpg,.png,.jpeg">
                </div>
                <div class="form-group">
                  <button type="submit" name="register" id="register" class="btn btn-success">Register</button>
                </div>
            </form>
          </div>
        </div>
      </div>
  <?php
  include 'inc/footer.php';
  ?>
