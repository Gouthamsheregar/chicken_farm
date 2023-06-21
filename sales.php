<?php
session_start();
if(isset($_SESSION['estaff']))
{
$estaff=$_SESSION['estaff'];
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
    <title>Chicken farm-Staff Sales panel</title>
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
          <p class="app-sidebar__user-name">STAFF</p>
          <p class="app-sidebar__user-designation"></p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item" href="home.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Home</span></a></li>
		<li><a class="app-menu__item" href="purchasestock.php"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Purchase Stock</span></a></li>
		<li><a class="app-menu__item " href="Eggstock.php"><i class="app-menu__icon fa fa-circle-o"></i><span class="app-menu__label">Egg Stock</span></a></li>
		<li><a class="app-menu__item" href="viewstock.php"><i class="app-menu__icon fa fa-eye"></i><span class="app-menu__label">View Stock</span></a></li>
		<li><a class="app-menu__item" href="consum.php"><i class="app-menu__icon fa fa-connectdevelop"></i><span class="app-menu__label">Consumption</span></a></li>
		<li><a class="app-menu__item active" href="sales.php"><i class="app-menu__icon fa fa-shopping-cart"></i><span class="app-menu__label">Sales</span></a></li>
		<li><a class="app-menu__item" href="salesinvoice.php"><i class="app-menu__icon fa fa-id-card-o"></i><span class="app-menu__label">Invoice</span></a></li>
		<li><a class="app-menu__item" href="logout.php"><i class="app-menu__icon fa fa-sign-out"></i><span class="app-menu__label">Logout</span></a></li>
	  </ul>
    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-shopping-cart"></i> Sales Details</h1>
        </div>
      </div>
	  <?php
	include("config.php");
	$sql1= "select salesno from sales where status!='pending'";
	$result1 = mysqli_query($con,$sql1);
	$count1=mysqlI_num_rows($result1);


	if($count1>0)
	{
		while($row = mysqli_fetch_array($result1))
		{ 
			$salesno=$row[0];
		}
	}
	else
	{
		$salesno="SALENO000";
	}
	$salesno++;
	?>
         <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Sales</h3>
            <div class="tile-body">
              <form class="row" action="#" method="post">
				<div class="form-group col-md-3">
                  <label class="control-label">Sales No</label>
                  <input class="form-control" type="text" value="<?php echo $salesno; ?>" name="salesno" readonly="true">
                </div>
				<div class="form-group col-md-3">
                  <label class="control-label">Phone No</label>
                  <input class="form-control" type="tel" placeholder="phone no" name="phoneno" required>
                </div>
				<div class="form-group col-md-3">
                  <label class="control-label">Name</label>
                  <input class="form-control" type="name" placeholder="name" name="name" required>
                </div>
                <div class="form-group col-md-3 align-self-end">
                  <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                </div>
              </form>
			  <?php
if(isset($_POST['submit']))
{
	error_reporting(1);
	include("config.php");
	{
		
		$_SESSION['phoneno']=$_POST['phoneno'];
		$_SESSION['name']=$_POST['name'];
		
		
	}
}
?>
            </div>
          </div>
        </div>
		<div class="col-md-12">
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">Bill Details</h3>
            
            </div>
            <div class="tile-body">
              <h5>Bill No:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <i><?php echo $salesno; ?></i></h5>
              <h5>Name:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<i><?php if(isset($_SESSION['name'])){ echo $_SESSION['name'];} ?></i></h5>
              <h5>Phone No:&nbsp&nbsp&nbsp&nbsp<i><?php if(isset($_SESSION['phoneno'])){ echo $_SESSION['phoneno'];} ?></i></h5>
			  <!--<a class="btn btn-info" id="demoNotify" href="#">Sample Notification</a>-->
            </div><br><br>
			<form class="row" method="post" action="#">
				<div class="form-group col-md-3">
                  <label class="control-label">Type</label>
				  <select class="form-control" name="type">
				  <optgroup label="Select Stock">
				  <?php 
							        include('config.php');
							        $q=mysqli_query($con,"select * from stock where category='sales' ")or die(mysqli_query($con));
							        while($row=mysqli_fetch_array($q)){
							        	?>
							        	<option value="<?php echo $row['stockname'];?>"><?php echo $row['stockname'];?></option>
							        	<?php
							        }
							        ?>
					<optgroup>
				  </select>
                </div>
				<div class="form-group col-md-3">
                  <label class="control-label">Quantity</label>
                  <input class="form-control" min="1" type="number" placeholder="Quantity" name="qty" required>
                </div>
				
                <div class="form-group col-md-3 align-self-end">
                  <button class="btn btn-primary" type="submit" name="add"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add</button>
                </div>
              </form>
			  <?php
if(isset($_POST['add']))
{
	error_reporting(1);
	include("config.php");
	{
		$type=$_POST['type'];
		$qty=$_POST['qty'];
		$sql2="select price from stock where stockname='".$type."' and stock >= '".$qty."'";
		$result2 = mysqli_query($con,$sql2);
		$num1=mysqlI_num_rows($result2);
		if($num1 > 0)
		{ 
		while($row1 = mysqli_fetch_array($result2))
		{ 
		$price=$row1[0];
		}
		
		$total=$qty*$price;
		$query = "insert into sales(salesno,type,qty,price,total) values('".$salesno."','".$type."','".$qty."','".$price."','".$total."')";
            mysqli_query($con,$query) or die(mysqli_error($con));
			
			$query1 = "update stock set stock=stock -'".$qty."' where stockname='".$type."'";
			
			mysqli_query($con,$query1) or die(mysqli_error($con));
			unset($qty);
		echo "<script>
				alert(' details added,');
			</script>";
			unset($qty);
			echo "<script> location.href='sales.php'; </script>";
		}
		else
		{
			echo "<script>
				alert(' out of stock,');
			</script>";
			echo "<script> location.href='sales.php'; </script>";
		}
	}
}
?>
          </div>
        </div>
		
		<div class="col-md-12">
		<div class="page-header text-white bg-primary">
              <center><h3 class="mb-3 line-head" id="buttons">Display</h3></center>
          </div>
          <div class="tile">
            <h3 class="tile-title"></h3>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Sl.No</th>
                  <th>Type</th>
                  <th>Quantity</th>
                  <th>price</th>
                  <th>Total price</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
			  <?php
	include("config.php");
	$sql1= "select * from sales where salesno='".$salesno."'";
	$result1 = mysqli_query($con,$sql1);
	$count1=mysqlI_num_rows($result1);
	$total1=0;

	if($count1>0)
	{
		$sl=0;
		
		while($row = mysqli_fetch_array($result1))
		{
			$salesid=$row[0];
			$type=$row[5];
			$qty=$row[6];
			$price=$row[7];
			$total=$row[8];
			$sl+=1;
			$total1=$total1+$total;
			
			?>
			
                <tr>
                  <td><?php echo $sl; ?></td>
				  <td><?php echo $type; ?></td>
                  <td><?php echo $qty; ?></td>
                  <td><?php echo $price; ?></td>
                  <td><?php echo $total; ?></td>
                  <form method="post" action="">
				  <input type="text" name="type[]" value="<?php echo $type; ?>" hidden="true">
				  <input type="text" name="qty[]" value="<?php echo $qty; ?>" hidden="true">
				  <input type="text" name="id[]" value="<?php echo $salesid; ?>" hidden="true">
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
	foreach ($_POST['qty'] as $key => $qtvalue) 
	{	
		$qty=$qtvalue;	
	}
	foreach ($_POST['type'] as $key => $typevalue) 
	{	
		$type=$typevalue;	
	}
	$query1 = "delete from sales where salesid='".$selectid."'";
	mysqli_query($con,$query1) or die(mysqli_error($con));
	
	$query2 = "update stock set stock=stock +'".$qty."' where stockname='".$type."'";
			
			mysqli_query($con,$query2) or die(mysqli_error($con));
	
	
	echo "<script> location.href='sales.php'; </script>";
}
?>
			 <table class="table table-hover">
							<td colspan="2">&nbsp;</td>
							<td><b>Total Amount</b></td>
							<td><b>Rs. &nbsp;<?php echo $total1;?></b></td>
							<form method="post" action="">
							<td><button class="btn btn-outline-success" name="confirm" type="submit">Confirm</button></td>
							</form>
							
						</tr>
			 </table>
			 
			
			<?php 
					
					
					if(isset($_POST['confirm']))
					{
						//$_SESSION['salesno']=$salesno;
						include 'config.php';
						$status="confirm";
						$sql1 = "UPDATE sales SET name='".$_SESSION['name']."',phoneno='".$_SESSION['phoneno']."',final_amt='".$total1."',status='".$status."' WHERE salesno='".$salesno."'";
					
					
					// Execute query
					mysqli_query($con, $sql1);
					echo "<script>
								alert('Upload Successful');
							</script>";
							
							echo "<script> location.href='salesinvoice.php'; </script>";
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
	echo "<script> location.href='index.php'; </script>";
}	
?>