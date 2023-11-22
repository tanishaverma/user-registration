<?php
ini_set('max_execution_time', '0');
ini_set('upload_max_filesize', '100M');
include 'inc/header.php';
Session::CheckSession();

$sId =  Session::get('roleid');

if ($sId === 1) { 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addUser'])) {
  $userAdd = $users->addNewUserByAdmin($_POST);
}

if (isset($userAdd)) {
  echo $userAdd;
}
 ?>
  <script>
        $(document).ready(function () {
            $('#btnSignIn').on('click', function (e) {
               var isFormValid =  $('#basic-form').validate();
               if(isFormValid){
                $('form#basic-form').submit();
               }
            });
            $('#password').on('change', function() {
            var letters = /^[a-zA-Z0-9_-]{5,15}$/;
            if(letters.test($(this).val())){
                $('.check_error_msg').css('display','block');
                $(".check_error_msg").text("Error! Your Password Must Contain At Least 8 char, 1 Number, 1 uppercase, 1 lowercase ");
            }else{
                $('.check_error_msg').css('display','none');
            }
            var password = $("#password").val();
            var cpassword = $("#cpassword").val();
            if (cpassword !== password) {
                $("#cpassword").addClass("error");
                $('.psw_error_msg').css('display','block');
            }else{
                $('#cpassword').removeClass("error");
                $('.psw_error_msg').css('display','none');
            }
          });
          $('#cpassword').on('change', function() {
            var password = $("#password").val();
            var cpassword = $("#cpassword").val();
            if (cpassword !== password) {
                $("#cpassword").addClass("error");
                $('.psw_error_msg').css('display','block');
            }else{
                $('#cpassword').removeClass("error");
                $('.psw_error_msg').css('display','none');
            }
          });
        })

    </script>
 <div class="card ">
   <div class="card-header">
          <h3 class='text-center'>Add New User</h3>
        </div>
        <div class="cad-body">
            <div style="width:600px; margin:0px auto">
            <form id = "basic-form" action="" method="post" enctype="multipart/form-data">
            <div class="form-group pt-3">
                  <label for="name">Your name</label>
                  <input type="text" data-validate="required" id="name" name="name"  class="form-control">
                </div>
                <div class="form-group">
                  <label for="username">Your username</label>
                  <input type="text" data-validate="required" id="username" name="username"  class="form-control" >
                </div>
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" data-validate="required" name="email"  id="email"  class="form-control" >
                </div>
                <div class="form-group">
                  <label for="mobile">Mobile Number</label>
                  <input type="text" data-validate="required" name="mobile"  id="mobile" class="form-control" >
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" data-validate="required" name="password" id="password" class="form-control" >
                  <span class="check_error_msg">This field is required</span>
                </div>
                 <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" data-validate="required" name="cpassword" id="cpassword" class="form-control" >
                  <span class="psw_error_msg">Password Not matched!</span>

                </div>
                <div class="form-group">
                  <label for="image">Profile</label>
                  <input type="file" data-validate="required" name="my_image" id="my_image" class="form-control" accept=".jpg,.png,.jpeg" >
                  <!-- <span class="img_error_msg">This field is required</span> -->
                </div>
               
                <div class="form-group">
                  <div class="form-group">
                    <label for="sel1">Select user Role</label>
                    <select data-validate="required" class="form-control" name="roleid"  >
                      <option value="1">Admin</option>
                      <option value="2">Editor</option>
                      <option value="3">User only</option>

                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" name="addUser" id="btnSignIn" class="btn btn-success">Register</button>
                </div>
            </form>
          </div>
        </div>
      </div>
<?php
}else{
  header('Location:index.php');
}
 ?>
 
  <?php 
  include 'inc/footer.php'; ?>
 
