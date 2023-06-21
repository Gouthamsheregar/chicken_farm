<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login - Chicken form</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Chicken Farm</h1>
      </div>
      <div class="login-box">
        <form class="login-form" action="#" method="post">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>LoginPanel</h3>
          <div class="form-group">
            <label class="control-label">Select Login</label>
			<select class="form-control" name="typelogin" autofocus>
			
			<option value="staff">Staff</option>
			<option value="admin">Admin</option>
			</select>
          </div>
		  <div class="form-group">
            <label class="control-label">Email id</label>
            <input class="form-control" type="text" placeholder="Email" name="email" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">Password</label>
            <input class="form-control" type="password" placeholder="Password" name="password">
          </div>
          <div class="form-group">
            <div class="utility">
              <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p>
            </div>
          </div>
          <div class="form-group btn-container">
            <button type="submit" name="login" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>
        </form>
		
		<?php
                  
                  if(isset($_POST['login']))
				{
					 error_reporting(1);
					 include("config.php");
                  	 $Email=$_POST['email'];
					 $Password=$_POST['password'];
                  	 $type=$_POST['typelogin'];
                  	 if($type=='admin'){
					$sql = "select * from admin where adminname='$Email' and password='$Password'";
                  	 $result = mysqli_query($con,$sql);
					 $count=mysqlI_num_rows($result);
                  	 if($count>0)
					{
						session_start();
						$_SESSION['admin']=$Email;
						$adminid=$_SESSION['admin'];
						echo "<script>
						alert('Login Successful $adminid');
						</script>";
						echo "<script> location.href='formadmin@chicken/index.php'; </script>";
					}
					else
						{
							echo "<script>
							alert('Invalid Email or Password');
							</script>";
						}
	                   	
                   	  }else if($type=="staff")
					{
						$sql1 = "select * from staff where email='$Email' and password='$Password'";
						$result = mysqli_query($con,$sql1);
						$count=mysqlI_num_rows($result);
						if($count>0)
						{
							session_start();
							$_SESSION['estaff']=$Email;
							$staffid=$_SESSION['estaff'];
							echo "<script>
								alert('Login Successful $staffid');
								</script>";
							echo "<script> location.href='home.php'; </script>";
						}
						else
						{
		
						echo "<script>
							alert('Invalid Email or Password');
						</script>";
						}
					} 	 
                }

				?>
		
		
		
		
        <form class="forget-form" action="index.html">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input class="form-control" type="text" placeholder="Email">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
          </div>
        </form>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>


