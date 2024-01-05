<?php
  session_start();
  include('classes/login-contr.class.php');
  $login = new LoginContr();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>تسجيل الدخول</title>
    <!-- Bootstrap and Bootstrap Rtl -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-rtl.css">
    <!-- Custom css -->
    <link rel="stylesheet" href="css/dashboard.css">

<style>
  .login{
    width: 300px;
    margin: 80px auto;
  }
  .login h5{
    color: #555;
    margin-bottom: 30px;
    margin-top: 10px;
    text-align: center;
  }
  .login button{
    margin-right: 80px;
  }

</style>

</head>

<body>

  <div class="login">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
      <h5>تسجيل الدخول</h5>
      <div class="form-group">
        <label for="mail">البريد الإلكتروني</label>
        <input type="text" class="form-control"  id="mail" name="email"/>
      </div>
      <div class="form-group">
        <label for="pass">كلمة السر</label>
        <input type="text" class="form-control"  id="pass" name="password"/>
      </div>
      <button class="custom-btn" name="log">تسجيل الدخول</button>
    </form>
  </div>

  
  <?php
    if (isset($_POST['log'])) {
    $adminMail = $_POST['email'];
    $adminPass = $_POST['password'];
    
      $res = $login->loginUser($adminMail, $adminPass);
      if(is_string($res)){
        echo $res;
      }
      elseif($res->rowCount() == 0){
        echo "<div class='alert alert-danger'>" . "البيانات غير متطابقة" . "</div";
      }
      else {
          echo "<div class='alert alert-success'>" . "مرحباً , سيتم تحويلك الى لوحة التحكم" . "</div>";
          $row = $res->fetch(PDO::FETCH_ASSOC);
          $_SESSION['id'] = $row['id'];
          header('REFRESH:2;URL=categories.php');
      }
    }
  ?>

  <!--jQuery-->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!--Font Awesome-->
  <script src="https://kit.fontawesome.com/03757ac844.js"></script>
  <!--Bootstrap-->
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
</body>
</html>
