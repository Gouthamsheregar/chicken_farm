<?php
session_start();
if(isset($_SESSION['admin']))
{
$admin=$_SESSION['admin'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Chicken farm-Admin Add Employee panel</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="index.html">ChickenFarm</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" >
        <div>
          <p class="app-sidebar__user-name">ADMIN</p>
          <p class="app-sidebar__user-designation"></p>
        </div>
      </div>
      <ul class="app-menu">
       <li><a class="app-menu__item" href="index.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">
		Home</span></a></li>
        <li><a class="app-menu__item" href="report.php"><i class="app-menu__icon fa fa-file"></i><span class="app-menu__label">Report</span></a></li>
		<li><a class="app-menu__item" href="viewstock.php"><i class="app-menu__icon fa fa-eye"></i><span class="app-menu__label">View Stock</span></a></li>
		<li><a class="app-menu__item" href="addstock.php"><i class="app-menu__icon fa fa-plus"></i><span class="app-menu__label">Add Stock</span></a></li>
		<li><a class="app-menu__item" href="addseller.php"><i class="app-menu__icon fa fa-plus"></i><span class="app-menu__label">Add Seller</span></a></li>
		<li><a class="app-menu__item active" href="addemployee.php"><i class="app-menu__icon fa fa-user-plus"></i><span class="app-menu__label">Add Employee</span></a></li>
		<li><a class="app-menu__item" href="salesinvoice.php"><i class="app-menu__icon fa fa-shopping-cart"></i><span class="app-menu__label">Sales Invoice</span></a></li>
		<li><a class="app-menu__item" href="logout.php"><i class="app-menu__icon fa fa-sign-out"></i><span class="app-menu__label">Logout</span></a></li>
	  </ul>
    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Add Employee</h1>
        </div>
      </div>
	   <?php
	include("config.php");
	$sql1= "select staffno from staff";
	$result1 = mysqli_query($con,$sql1);
	$count1=mysqlI_num_rows($result1);


	if($count1>0)
	{
		while($row = mysqli_fetch_array($result1))
		{ 
			$staffno=$row[0];
		}
	}
	else
	{
		$staffno="E000";
	}
	$staffno++;
	?>
          <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Employee Registeration</h3>
            <div class="tile-body">
              <form class="form-horizontal" action="#" method="post">
			  <div class="form-group row">
                  <label class="control-label col-md-3">Employee Number</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" value="<?php echo $staffno; ?>" readonly="true" name="staffno" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Name</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" placeholder="Enter full name" name="staffname" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Email</label>
                  <div class="col-md-8">
                    <input class="form-control" type="email" placeholder="Enter email address" name="email" required>
                  </div>
                </div>
				<div class="form-group row">
                  <label class="control-label col-md-3">Contact Number</label>
                  <div class="col-md-8">
                    <input class="form-control" type="tel" placeholder="Enter Personal Number" name="contactno" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Address</label>
                  <div class="col-md-8">
                    <textarea class="form-control" rows="4" placeholder="Enter your address" name="address" required></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Gender</label>
                  <div class="col-md-9">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" value="male" type="radio" name="gender">Male
                      </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" value="female" type="radio" name="gender">Female
                      </label>
                    </div>
                  </div>
                </div>
               
				<div class="form-group row">
                  <label class="control-label col-md-3">Password</label>
                  <div class="col-md-8">
                    <input class="form-control" type="password" placeholder="Enter Password" name="password" required>
                  </div>
                </div>
				<div class="form-group row">
                  <label class="control-label col-md-3">Confirm Password</label>
                  <div class="col-md-8">
                    <input class="form-control" type="password" placeholder="Enter RePassword" name="cpassword" required>
                  </div>
                </div>
              
            </div>
            <div class="tile-footer">
              <div class="row">
                <div class="col-md-8 col-md-offset-3">
                  <button class="btn btn-primary" name="register" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>
                </div>
              </div>
            </div>
			</form>
			<?php
if(isset($_POST['register']))
{
	error_reporting(1);
	include("config.php");
	
	$Email=$_POST['email'];

	$sql = "select * from staff where email='$Email'";
	$result = mysqli_query($con,$sql);
	$count=mysqlI_num_rows($result);


	if($count>0)
	{
		
		echo "<script>
				alert('There is an existing account associated with this email.');
			</script>";
			echo "<script> location.href='addemployee.php'; </script>";
	}
	else
	{
		$Staffno=$_POST['staffno'];
		$Name=$_POST['staffname'];
		$Email=$_POST['email'];
		$Contactno=$_POST['contactno'];
		$Address=$_POST['address'];
		$Gender=$_POST['gender'];
		$Password=$_POST['password'];
		
		
		if ($_POST['password'] != $_POST['cpassword']) {
   // fail!
   
   echo "<script>
				alert('Password invalid.');
			</script>";
}
else {
   // success :(

		

		$query = "insert into staff(staffno,staffname,email,contactno,address,gender,password) values('".$Staffno."','".$Name."','".$Email."','".$Contactno."','".$Address."','".$Gender."','".$Password."')";
           
            mysqli_query($con,$query) or die(mysqli_error($con));
		
		echo "<script>
				alert('Registeration Completed, Please check.');
			</script>";
			echo "<script> location.href='addemployee.php'; </script>";
		}
	}
}
?>
		
          </div>
        </div>
		
		
		
		
		
		
		
		
		<div class="col-md-12" id="details">
		<div class="page-header text-white bg-primary">
              <center><h3 class="mb-3 line-head" id="buttons">Employee Details</h3></center>
          </div>
          <div class="tile">
            <h3 class="tile-title"></h3>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Sl.No</th>
                  <th>Employee No</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone No</th>
                  <th>Address</th>
                  <th>Gender</th>
                  <th>Password</th>
                  <th>Action</th>
                </tr>
              </thead>
			  <?php
	include("config.php");
	$sql = "select * from staff";
	$result = mysqli_query($con,$sql);
	$count=mysqlI_num_rows($result);


	if($count>0)
	{
		while($row = mysqli_fetch_array($result))
		{ 
			$staffid=$row[0];
			$staffno=$row['staffno'];
			$staffname=$row['staffname'];
			$email=$row['email'];
			$contactno=$row['contactno'];
			$address=$row['address'];
			$gender=$row['gender'];
			$password=$row['password'];
			?>
              <tbody>
                <tr>
                  <td><?php echo $staffid; ?></td>
				  <td><?php echo $staffno; ?></td>
                  <td><?php echo $staffname; ?></td>
                  <td><?php echo $email; ?></td>
                  <td><?php echo $contactno; ?></td>
                  <td><?php echo $address; ?></td>
                  <td><?php echo $gender; ?></td>
                  <td><?php echo $password; ?></td>
				  <form method="post" action="">
				  <input type="text" name="id[]" value="<?php echo $staffid; ?>" hidden="true">
                  <td><button class="btn btn-outline-danger" name="delete" type="submit">Delete</button></td>
				  </form>
                </tr>
                <?php
		}
					
	}
?>	
              </tbody>
            </table>
			<?php
if(isset($_POST['delete']))
{
	foreach ($_POST['id'] as $key => $value) 
	{	
		$selectid=$value;	
	}
	$query1 = "delete from staff where staffid='".$selectid."'";
	mysqli_query($con,$query1) or die(mysqli_error($con));
	echo "<script> location.href='addemployee.php'; </script>";
}
?>
          </div>
        </div>
       
		
	 
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="js/plugins/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="js/plugins/select2.min.js"></script>
    <script type="text/javascript" src="js/plugins/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
      $('#sl').click(function(){
      	$('#tl').loadingBtn();
      	$('#tb').loadingBtn({ text : "Signing In"});
      });
      
      $('#el').click(function(){
      	$('#tl').loadingBtnComplete();
      	$('#tb').loadingBtnComplete({ html : "Sign In"});
      });
      
      $('#demoDate').datepicker({
      	format: "dd/mm/yyyy",
      	autoclose: true,
      	todayHighlight: true
      });
      
      $('#demoSelect').select2();
    </script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
  </body>
</html>
<?php
}
else
{
	echo "<script> location.href='../index.php'; </script>";
}	
?>