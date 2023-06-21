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
    <title>Chicken farm-Admin report panel</title>
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
		<li><a class="app-menu__item active" href="viewstock.php"><i class="app-menu__icon fa fa-eye"></i><span class="app-menu__label">View Stock</span></a></li>
		<li><a class="app-menu__item" href="addstock.php"><i class="app-menu__icon fa fa-plus"></i><span class="app-menu__label">Add Stock</span></a></li>
		<li><a class="app-menu__item" href="addseller.php"><i class="app-menu__icon fa fa-plus"></i><span class="app-menu__label">Add Seller</span></a></li>
		<li><a class="app-menu__item" href="addemployee.php"><i class="app-menu__icon fa fa-user-plus"></i><span class="app-menu__label">Add Employee</span></a></li>
		<li><a class="app-menu__item" href="salesinvoice.php"><i class="app-menu__icon fa fa-shopping-cart"></i><span class="app-menu__label">Sales Invoice</span></a></li>
		<li><a class="app-menu__item" href="logout.php"><i class="app-menu__icon fa fa-sign-out"></i><span class="app-menu__label">Logout</span></a></li>
	  </ul>
    </aside>
     <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-eye"></i> View Stock</h1>
        </div>
      </div>
	  
	  
      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">TOTAL EGGS</h3>
            </div>
			<?php
	include("config.php");
	$sql = "select * from stock where stockname='egg'";
	$result = mysqli_query($con,$sql);
	$count=mysqlI_num_rows($result);


	if($count>0)
	{
		while($row = mysqli_fetch_array($result))
		{ 
			$stockid=$row[0];
			$min=$row[4];
			$stock=$row['stock'];
		
			?>
            <div class="widget-small primary"><i class="icon fa fa-circle-o fa-3x"></i>
            <div class="info">
              <h4>EGGS<?php if($stock<$min){ echo ' (less than min Quantity)';}?></h4>
              <p><b><?php echo $stock; ?></b></p>
            </div>
          </div>
		  <?php
		}
	}
	?>
          </div>
        </div>
		<div class="col-md-6">
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">TOTAL BIRDS</h3>
            
            </div>
			<?php
	include("config.php");
	$sql = "select * from stock where stockname='bird'";
	$result = mysqli_query($con,$sql);
	$count=mysqlI_num_rows($result);


	if($count>0)
	{
		while($row = mysqli_fetch_array($result))
		{ 
			$stockid=$row[0];
			$min=$row[4];
			$stock=$row['stock'];
		
			?>
           <div class="widget-small info"><i class="icon fa fa-linux fa-3x"></i>
            <div class="info">
              <h4>BIRDS<?php if($stock<$min){ echo ' (less than min Quantity)';}?></h4>
              <p><b><?php echo $stock; ?></b></p>
            </div>
		<?php
		}
	}
	?>
          </div>
          </div>
        </div>
		
			<?php
	include("config.php");
	$sql = "select * from stock where stockname!='bird' and stockname!='egg'";
	$result = mysqli_query($con,$sql);
	$count=mysqlI_num_rows($result);


	if($count>0)
	{
		while($row = mysqli_fetch_array($result))
		{ 
			$stockid=$row[0];
			$name=$row[2];
			$min=$row[4];
			$stock=$row['stock'];
		
			?>
			<div class="col-md-6">
          <div class="tile">
            <div class="tile-title-w-btn">
            
            </div>
            <div class="widget-small warning"><i class="icon fa fa-file fa-3x"></i>
            <div class="info">
              <h4><?php echo $name; if($stock<$min){ echo ' (less than min Quantity)';}?></h4>
              <p><b><?php echo $stock;?></b></p>
            </div>
          </div>
		  </div>
        </div>
		<?php
		}
	}
	?>
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