<?php 
require_once "libs/helper.php";
require_once "object.php";
if (isset($_COOKIE['name'])) {
  session_start();
  $_SESSION['id'] = $_COOKIE['id'];
  $_SESSION['name'] = $_COOKIE['name'];
  $_SESSION['email'] = $_COOKIE['email'];
  $_SESSION['image'] = $_COOKIE['image'];
  $_SESSION['role_id'] = $_COOKIE['role_id'];
  $_SESSION['role_name'] = $_COOKIE['rname'];
  header('location:dashboard.php');
}

if(isset($_POST['btnLogin'])){
  $err = [];
  if(isset($_POST['username']) && !empty($_POST['username'])){
          $user->set('username',$_POST['username']);
      
  } else{
    $err['username'] = "*Please enter username";
  }
  if(isset($_POST['password']) && !empty($_POST['password'])){
    $user->set('password',$_POST['password']);
  } else{
    $err['password'] = "*Please enter password";
  }

  if(count($err)==0){
      $loginStatus =  $user->login();
    }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <!--  -->
<link rel="stylesheet" type="text/css" href="dist/css/logincss.css">
<!------ Include the above in your HEAD tag ---------->
</head>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="assets/image/download.png" height="100px"weight="100px" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>" id="loginForm" novalidate>
      <?php if(isset($loginStatus)){ ?>
              <div class = "alert alert-danger" role="alert">Login Failed</div>
          <?php } ?>
         <!--  <?php if(isset($_GET['msg']) && $_GET['msg'] == 1){ ?>
              <div class = "text alert alert-danger" role="alert">Please Login to access dashboard.</div>
          <?php } ?> -->
    <div>
      <input type="text" id="username" class="fadeIn second" name="username" placeholder="username" >
      <?php if (isset($err['username'])){?>
        <label class="error">
          <?php echo $err['username'] ?> </label>

     <?php } ?>
      </div>
    <div>  <input type="password" id="password" class="fadeIn third" name="password" placeholder="password"  >
       <?php if (isset($err['password'])){?>
        <label class="error">
          <?php echo $err['password'] ?> </label>

     <?php } ?>
      </div>
     <div> 
        <input type="submit" name="btnLogin" class="fadeIn fourth" value="Log In">
      </div>
      

    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>

    </div>
  </div>
</div>


</body>

</html>



