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
    <title>Chicken farm-Admin addstock panel</title>
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
          <h1><i class="fa fa-edit"></i> Add Stock</h1>
        </div>
      </div>
	  <?php
	include("config.php");
	$sql1= "select stockno from stock";
	$result1 = mysqli_query($con,$sql1);
	$count1=mysqlI_num_rows($result1);


	if($count1>0)
	{
		while($row = mysqli_fetch_array($result1))
		{ 
			$stockno=$row[0];
		}
	}
	else
	{
		$stockno="ST00";
	}
	$stockno++;
	?>
         <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Add Stock</h3>
            <div class="tile-body">
              <form class="row" action="#" method="post">
				<div class="form-group col-md-3">
                  <label class="control-label">Stock Number</label>
                  <input class="form-control" type="text" value="<?php echo $stockno; ?>" name="stockno" readonly="true">
                </div>
				<div class="form-group col-md-3">
                  <label class="control-label">Stock Name</label>
                  <input class="form-control" type="text" placeholder="stock name" name="stockname" required>
                </div>
				<div class="form-group col-md-3">
                  <label class="control-label">Stock Category</label>
				  <select class="form-control" name="category">
				  <option value="consumption">Consumption</option>
				  <option value="sales">Sales</option>
				  </select>
                </div>
				<div class="form-group col-md-3">
                  <label class="control-label">Minimum Quantity</label>
                  <input class="form-control" min="1" type="number" placeholder="Minimum Quantity" name="quantity" required>
                </div>
				<div class="form-group col-md-3">
                  <label class="control-label">Price</label>
                  <input class="form-control" type="text" placeholder="Price" name="price" required>
                </div>
                <div class="form-group col-md-3 align-self-end">
                  <button class="btn btn-primary" type="submit" name="addstock"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                </div>
              </form>
			  <?php
if(isset($_POST['addstock']))
{
	error_reporting(1);
	include("config.php");
	{
		$stockno=$_POST['stockno'];
		$stockname=$_POST['stockname'];
		$category=$_POST['category'];
		$quantity=$_POST['quantity'];
		$price=$_POST['price'];
		
		$query = "insert into stock(stockno,stockname,category,quantity,price) values('".$stockno."','".$stockname."','".$category."','".$quantity."','".$price."')";
           
            mysqli_query($con,$query) or die(mysqli_error($con));
		
		echo "<script>
				alert('Your Details added to table, Please check.');
			</script>";
			echo "<script> location.href='addstock.php'; </script>";
		
	}
}
?>
            </div>
          </div>
        </div>
		
		
		
		<div class="col-md-12" id="#details">
		<div class="page-header text-white bg-primary">
              <center><h3 class="mb-3 line-head" id="buttons">Display With Details</h3></center>
          </div>
          <div class="tile">
            <h3 class="tile-title"></h3>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Sl.No</th>
                  <th>Stock Number</th>
                  <th>Stock Name</th>
                  <th>Stock Category</th>
                  <th>Minimum Quantity</th>
                  <th>price</th>
                  <th>Action</th>
                  <th>Update</th>
                </tr>
              </thead>
			   <tbody>
			  <?php
	include("config.php");
	$sql = "select * from stock";
	$result = mysqli_query($con,$sql);
	$count=mysqlI_num_rows($result);
	$total=0;
	$sl=0;
	if($count>0)
	{
		while($row = mysqli_fetch_array($result))
		{ 	
			$sl+=1;
			$stockid=$row[0];
			$stockno=$row['stockno'];
			$stockname=$row['stockname'];
			$category=$row['category'];
			$quantity=$row['quantity'];
			$price=$row['price'];
			
			
		
			?>
             
                <tr>
                  <td><?php echo $sl; ?></td>
				  <td><?php echo $stockno; ?></td>
                  <td><?php echo $stockname; ?></td>
                  <td><?php echo $category; ?></td>
                  <td><?php echo $quantity; ?></td>
                  <td><?php echo $price; ?></td>
                  <form method="post" action="">
				  <input type="text" name="stockno[]" value="<?php echo $stockno; ?>" hidden="true">
				  <input type="text" name="id[]" value="<?php echo $stockid; ?>" hidden="true">
                  <td><button class="btn btn-outline-danger" name="delete" type="submit"<?php if($stockname=='bird'||$stockname=='egg'){?>hidden="true"<?php }?>>Delete</button></td>
                  <td><button class="btn btn-outline-success" name="update" type="submit">update</button></td>
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
	$query1 = "delete from stock where stockid='".$selectid."'";
	mysqli_query($con,$query1) or die(mysqli_error($con));
	echo "<script> location.href='addstock.php'; </script>";
}
?>
          </div>
        </div>
<?php
		if(isset($_POST['update']))
		{
			foreach ($_POST['stockno'] as $key => $uvalue) 
			{	
				$stockno=$uvalue;	
			}
			$_SESSION['update']=$stockno;
			echo "<script> location.href='update.php'; </script>";
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