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
    <title>Chicken farm-admin Invoice panel</title>
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
    <header class="app-header"><a class="app-header__logo" href="index.html"><i class="fa fa-cutlery"></i> ChickenFarm</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="">
        <div>
          <p class="app-sidebar__user-name">ADMIN</p>
       
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
          <h1><i class="fa fa-file-text-o"></i> Invoice</h1>
          <p>A Printable Invoice Format</p>
        </div>
       
      </div>
      <div class="row">
        <div class="col-md-12">
		<?php
		include 'config.php';
		$sql1 = "select * from sales where salesno='".$_SESSION['ainvoice']."'";
		$result1 = mysqli_query($con,$sql1);
		$num1=mysqlI_num_rows($result1);
		
		
		if($num1 > 0)
		{ 
		while($row1 = mysqli_fetch_array($result1))
		{ 
		
		$id=$row1[0];
		$salesno=$row1['salesno'];
		$date=$row1['date'];
		$phoneno=$row1['phoneno'];
		$name=$row1['name'];
		$type=$row1['type'];
		$qty=$row1['qty'];
		$price=$row1['price'];
		$total=$qty*$price;
		}
		}
		?>
          <div class="tile" id="printableArea">
            <section class="invoice">
              <div class="row mb-4">
                <div class="col-6">
                  <h2 class="page-header app-header__logo"><i class="fa fa-cutlery"></i> ChickenFarm</h2>
                </div>
                <div class="col-6">
                  <h5 class="text-right">Date: <i><?php echo $date; ?></i></h5>
                  <h5 class="text-right">Invoice No <i>#<?php echo $salesno; ?></i></h5>
                </div>
              </div>
              <div class="row invoice-info">
                <div class="col-4">From
                  <address><strong>ChickenFarms.</strong><br>Kulashekar<br>Manglore<br><i>Email: chks@farms.com</i></address>
                </div>
				 <div class="col-4"><b></b><br><b></b><br><b></b> <br><b></b></div><br>
				
                <div class="col-4 text-right">To
                  <address class="text-right"><strong><?php echo $name; ?></strong><br>Phone :<?php echo $phoneno; ?><br></address>
                </div>
               
              </div>
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
						<th>Sl.No</th>
                        <th>Product</th>
						<th>Qty</th>
                        <th>Price</th>
                        <th>SubTotal</th>
                        
                      </tr>
                    </thead>
                    <tbody>
					<?php
		include 'config.php';
		$sql1 = "select * from sales where salesno='".$_SESSION['ainvoice']."'";
		$result1 = mysqli_query($con,$sql1);
		$num1=mysqlI_num_rows($result1);
		$sl=0;
		$finaltotal=0;
		if($num1 > 0)
		{ 
		while($row1 = mysqli_fetch_array($result1))
		{ 
		$sl+=1;
		$id=$row1[0];
		$salesno=$row1['salesno'];
		$date=$row1['date'];
		$phoneno=$row1['phoneno'];
		$name=$row1['name'];
		$type=$row1['type'];
		$qty=$row1['qty'];
		$price=$row1['price'];
		$total=$qty*$price;
		$finaltotal=$finaltotal+$total;
		
		?>
                      <tr>
                        <td><?php echo $sl; ?></td>
                        <td><?php echo $type; ?></td>
                        <td><?php echo $qty; ?></td>
                        <td><?php echo $price; ?></td>
                        <td>Rs. <?php echo $total; ?></td>
                      </tr>
					 <?php 
									}
									}
									?> 	
                    </tbody>
                  </table>
				  
                </div>
              </div>
			  <div class="row invoice-info">
                <div class="col-4">
                  <address><strong></strong><br><br></address>
                </div>
				 <div class="col-4"><b></b><br><b></b><br><b></b> <br><b></b></div><br>
				
                <div class="col-4 text-right">
                  <address class="text-right"><br><h5><b><i>Final Total : Rs.<?php echo $finaltotal; ?></i></b><h5></address>
                </div>
               
              </div>
             
            </section>
          </div>
		  <div class="row d-print-none mt-2">
                <div class="col-12 text-right"><button type="submit" onclick="printDiv('printableArea')" class="btn btn-primary" ><i class="fa fa-print"></i> Print</button></div>
              </div>
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
	<script>
	function printDiv(printableArea){
     var printContents = document.getElementById(printableArea).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
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