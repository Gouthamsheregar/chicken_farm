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
		<li><a class="app-menu__item" href="addemployee.php"><i class="app-menu__icon fa fa-user-plus"></i><span class="app-menu__label">Add Employee</span></a></li>
		<li><a class="app-menu__item active" href="salesinvoice.php"><i class="app-menu__icon fa fa-shopping-cart"></i><span class="app-menu__label">Sales Invoice</span></a></li>
		<li><a class="app-menu__item" href="logout.php"><i class="app-menu__icon fa fa-sign-out"></i><span class="app-menu__label">Logout</span></a></li>
	  </ul>
    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Sales Invoice</h1>
        </div>
      </div>
	  
       
		
		<div class="col-md-12">
		<div class="page-header text-white bg-primary">
              <center><h3 class="mb-3 line-head" id="buttons">Bill Invoice Details</h3></center>
          </div>
          <div class="tile">
            <h3 class="tile-title"></h3>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Sl.No</th>
                  <th>Date</th>
                  <th>Invoice Number</th>
                  <th>To</th>
                  <th>Final Total</th>
                  <th>View</th>
                </tr>
              </thead>
			  <?php
			  include 'config.php';
				$sql1 = "SELECT salesno, date, name, phoneno, final_amt FROM sales where status='confirm' group by salesno";
				$result1 = mysqli_query($con,$sql1);
				$num1=mysqlI_num_rows($result1);
				$s1=0;
				
				if($num1 > 0)
				{ 
				while($row1 = mysqli_fetch_array($result1))
				{ 
				$s1+=1;
				$salesno=$row1[0];
				$date=$row1[1];
				$name=$row1[2];
				$phoneno=$row1[3];
				$final_amt=$row1[4];
				?>
              <tbody>
                <tr>
                  <td><?php echo $s1; ?></td>
				  <td><?php echo $date; ?></td>
                  <td><?php echo $salesno; ?></td>
                  <td><?php echo $name; ?><br><?php echo $phoneno; ?></td>
                  <td><?php echo $final_amt; ?></td>
				  <form action="" method="post">
				  <input type="text" name="id[]" value="<?php echo $salesno; ?>" hidden="true">
                  <td><button class="btn btn-outline-success" type="submit" name="view">View Invoice</button></td>
				  </form>
                </tr>
                <?php 
									}
									}
									?>
              </tbody>
            </table>
          </div>
        </div>
  	<?php
		if(isset($_POST['view']))
		{
			foreach ($_POST['id'] as $key => $value) 
			{	
				$id=$value;	
			}
			$_SESSION['ainvoice']=$id;
			echo "<script> location.href='invoice.php'; </script>";
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
