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
    <title>Chicken farm-Admin stockUpdate panel</title>
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
    <header class="app-header"><a class="app-header__logo" href="index.html">ChickenForm</a>
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
		<li><a class="app-menu__item active" href="addstock.php"><i class="app-menu__icon fa fa-plus"></i><span class="app-menu__label">Add Stock</span></a></li>
		<li><a class="app-menu__item" href="addseller.php"><i class="app-menu__icon fa fa-plus"></i><span class="app-menu__label">Add Seller</span></a></li>
		<li><a class="app-menu__item" href="addemployee.php"><i class="app-menu__icon fa fa-user-plus"></i><span class="app-menu__label">Add Employee</span></a></li>
		<li><a class="app-menu__item" href="salesinvoice.php"><i class="app-menu__icon fa fa-shopping-cart"></i><span class="app-menu__label">Sales Invoice</span></a></li>
		<li><a class="app-menu__item" href="logout.php"><i class="app-menu__icon fa fa-sign-out"></i><span class="app-menu__label">Logout</span></a></li>
	  </ul>
    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Update Stock</h1>
        </div>
      </div>
	  <?php
					include 'config.php';
					$sql1 = "select * from stock where stockno='".$_SESSION['update']."'";
					$result1 = mysqli_query($con,$sql1);
					$num1=mysqlI_num_rows($result1);
					$sl=0;
					if($num1 > 0)
					{ 
						while($row1 = mysqli_fetch_array($result1))
						{ 
							$sl+=1;
							$id=$row1[0];
							$stockno=$row1['stockno'];
							$stockname=$row1['stockname'];
							$category=$row1['category'];
							$quantity=$row1['quantity'];
							$price=$row1['price'];
			?>

         <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Update Stock</h3>
            <div class="tile-body">
              <form class="row" action="#" method="post">
				<div class="form-group col-md-3">
                  <label class="control-label">Stock Number</label>
                  <input class="form-control" type="text"  name="stockno" value="<?php echo $stockno; ?>" readonly="true">
                </div>
				<div class="form-group col-md-3">
                  <label class="control-label">Stock Name</label>
                  <input class="form-control" type="text" name="stockname" value="<?php echo $stockname; ?>" readonly="true">
                </div>
				<div class="form-group col-md-3">
                  <label class="control-label">category</label>
                  <input class="form-control" type="text" name="category" value="<?php echo $category; ?>"  readonly="true">
                </div>
				<div class="form-group col-md-3">
                  <label class="control-label">Minimum Quantity</label>
                  <input class="form-control" type="text" name="quantity" value="<?php echo $quantity; ?>" required >
                </div>
				<div class="form-group col-md-3">
                  <label class="control-label">Price</label>
                  <input class="form-control" type="text"  name="price" value="<?php echo $price; ?>" required>
                </div>
                <div class="form-group col-md-3 align-self-end">
                  <button class="btn btn-primary" type="submit" name="update"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
                </div>
              </form>
			  
            </div>
          </div>
        </div>
	
		<?php 
					}
					}
					if(isset($_POST['update']))
					{
					$quantity=$_POST['quantity'];
					$price=$_POST['price'];
					
					$sql = "UPDATE stock SET quantity='".$quantity."', price='".$price."' WHERE stockno='".$_SESSION['update']."'";
					
					
					// Execute query
					mysqli_query($con, $sql);
					echo "<script>
								alert('Update Successful');
							</script>";
							
							echo "<script> location.href='addstock.php'; </script>";
					}
					?>
		
       
		
	 
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