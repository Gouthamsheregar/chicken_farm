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
        <li><a class="app-menu__item  active" href="report.php"><i class="app-menu__icon fa fa-file"></i><span class="app-menu__label">Report</span></a></li>
		<li><a class="app-menu__item" href="viewstock.php"><i class="app-menu__icon fa fa-eye"></i><span class="app-menu__label">View Stock</span></a></li>
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
          <h1><i class="fa fa-th-list"></i> Report Table</h1>
        </div>
        
      </div>
      <div class="row">
	  <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Sales Report </h3>
			<div style="height:400px; overflow:auto">
            <table class="table">
              <thead>
                <tr>
                  <th>SalesNo</th>
                    <th>Name/phoneno</th>
                    <th>Type</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
              </thead>
			  <?php
					include("config.php");
					$sql = "select * from sales  where status='confirm' group by salesno";
					$result = mysqli_query($con,$sql);
					$count=mysqlI_num_rows($result);


					if($count>0)
					{
						while($row = mysqli_fetch_array($result))
						{ 
							$salesid=$row[0];
							$salesno=$row['salesno'];
							$date=$row['date'];
							$name=$row['name'];
							$phoneno=$row['phoneno'];
							$type=$row['type'];
							$qty=$row['qty'];
							$price=$row['price'];
							$total=$row['total'];
							?>

              <tbody>
                <tr class="table-info">
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr class="table-danger">
                  <td><?php echo $salesno; ?></td>
                    <td>Name: <?php echo $name; ?><br>No: <?php echo $phoneno; ?><br>Date: <?php echo $date; ?></td>
                    <td><?php echo $type; ?></td>
                    <td><?php echo $qty; ?></td>
                    <td><?php echo $price; ?></td>
                    <td><?php echo $total; ?></td>
                </tr>
                <?php
		}
					
	}
?>	
              </tbody>
            </table>
			<div>
          </div>
        </div>
	  
	  
        </div>
      </div>
	  <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Purchase Report </h3>
			<div style="height:400px; overflow:auto">
            <table class="table">
              <thead>
                <tr>
                  <th>SL.NO</th>
                    <th>Date</th>
                    <th>Stockname</th>
                    <th>Sellername</th>
                    <th>PuQuantity</th>
                   
                </tr>
              </thead>
			  <?php
					include("config.php");
					$sql = "select * from purchase";
					$result = mysqli_query($con,$sql);
					$count=mysqlI_num_rows($result);
					$s1=0;

					if($count>0)
					{
						while($row = mysqli_fetch_array($result))
						{ 
							$s1+=1;
							$date=$row['date'];
							$stockname=$row['stockname'];
							$sellername=$row['sellername'];
							$puquantity=$row['puquantity'];
							
							?>

              <tbody>
                <tr class="table-info" >
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr class="table-danger">
				<td><?php echo $s1; ?></td>
                  <td><?php echo $date; ?></td>
                    <td><?php echo $stockname; ?></td>
                    <td><?php echo $sellername; ?></td>
                    <td><?php echo $puquantity; ?></td>
                    
                </tr>
                <?php
		}
					
	}
?>	
              </tbody>
            </table>
			<div>
          </div>
        </div>
	  
	  
        </div>
      </div>
	  <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Consumption Report </h3>
			<div style="height:400px; overflow:auto">
            <table class="table">
              <thead>
                <tr>
					<th>SL.No</th>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Quantity</th>
                </tr>
              </thead>
			  <?php
					include("config.php");
					$sql = "select * from consumption";
					$result = mysqli_query($con,$sql);
					$count=mysqlI_num_rows($result);
					$s1=0;

					if($count>0)
					{
						while($row = mysqli_fetch_array($result))
						{ 
							$s1+=1;
							$date=$row['date'];
							$type=$row['type'];
							$qty=$row['qty'];
							?>

              <tbody>
                <tr class="table-info">
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr class="table-danger">
                  <td><?php echo $s1; ?></td>
                    <td><?php echo $date; ?></td>
                    <td><?php echo $type; ?></td>
                    <td><?php echo $qty; ?></td>
                  
                </tr>
                <?php
		}
					
	}
?>	
              </tbody>
            </table>
			<div>
          </div>
        </div>
	  
	  
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
    <!-- Data table plugin-->
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
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