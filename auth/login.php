<?php  
  require_once "../_config/config.php";

  if (isset($_SESSION['user'])) {
    echo "<script>window.location='".base_url()."'</script>";
  }else{
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>LOGIN - Rumah Sakit</title>

  <!-- Bootstrap core CSS -->
  <link href="<?=base_url("_assets/css/Bootstrap.min.css");?>" rel="stylesheet">

    <!-- Custom styles for this template -->
  <link href="<?= base_url("css/simple-sidebar.css"); ?>" rel="stylesheet">


</head>

<body>
  <div id="wrapper">
    <div class="container">
      <div align="center" style="margin-top: 200px;">

      <?php 
      if (isset($_POST['login'])) {
        $user = htmlentities(trim($_POST['user']));
        $pass = sha1(htmlentities(trim($_POST['pass'])));
        $login = $conn->QUERY("SELECT * FROM tb_user WHERE username ='$user' AND  password = '$pass'");

        if (mysqli_num_rows($login)==true) {
          $_SESSION['user'] = $user;
          echo "<script>window.location='".base_url()."'; </script>";
        }else{ ?>
          <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
              <div class="alert alert-danger alert-dismissable" role="alert">
                <a href="" class="close" data-dismiss="alert" aria-lable="close">&times;</a>
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <strong>Login GAGAL</strong>Username / Password salah!!
              </div>
            </div>
          </div>
        <?php 
        }
        
      }
        
       ?>

        <form action="" method="post" class="navbar-form">
          <div class="input-group mb-2">
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
          <input type="text" name="user" class="form-control" required="" autofocus="" placeholder="Username">
          </div>
          <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
          <input type="text" name="pass" class="form-control" required="" placeholder="Password">
          </div>
          <div class="input-group">
            <input type="submit" name="login" class="btn btn-primary" value="Login">
          </div>
        </form>
      </div>
    </div>
  </div>


    <script src="<?= base_url('_assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('_assets/js/jquery.js'); ?>"></script>
</body>

</html>
<?php } ?>