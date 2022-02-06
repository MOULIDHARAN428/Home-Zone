<?php
	$host = "127.0.0.1";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "home_for_many";
	$db = mysqli_connect($host,$dbUsername,$dbPassword,$dbname);
	$records = mysqli_query($db,"select * from homeless_reg");
	$num = 1;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home List</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	
	<!---------Style Sheet------------>
	<link rel="stylesheet" href="../css/index.css">
	<link rel="stylesheet" href="../node_modules/bootstrap-social/bootstrap-socail.css">
	<link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<!--N A V B A R-->
	<div class="header">
		<nav class="navbar navbar-expand-lg fixed-top">
		  <div class="container-fluid">
		    <a class="navbar-brand" href="../html/index.html" style="color: black;">Home Zone</a>
		    <div class="navbar-icon d-block d-lg-none">
			    <button data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbarNavDropdown" aria-controls="navbarNavDropdown">
			      	<span class="fa fa-bars"></span>
			    </button>
			</div>		    <div class="splitter"></div>
		    <div class="collapse navbar-collapse" id="navbarNavDropdown">
		      <ul class="navbar-nav">
		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="../html/index.html" style="color: black;"><span class="fa fa-home"> </span> Home</a>
		        </li>
		        <li class="nav-item dropdown">
		          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: black;">
		            <span class="fa fa-user-plus"> </span> Register
		          </a>
		          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		          	<li><a class="dropdown-item" href="../html/index.html" style="color: black;">Home</a></li>
		            <li><a class="dropdown-item" href="../html/homeless.html" style="color: black;">Homeless</a></li>
		            <li><a class="dropdown-item" href="../htmlrefugee.html" style="color: black;">Refugee</a></li>
		          </ul>
		        </li>
		        <li class="nav-item dropdown">
		          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: black;">
		            <span class="fa fa-list"> </span> List
		          </a>
		          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				  	<li><a class="dropdown-item" href="home_list.php" style="color: black;">Home</a></li>
		            <li><a class="dropdown-item active" href="#" style="color: black;">Homeless</a></li>
		            <li><a class="dropdown-item" href="refugee_list.php" style="color: black;">Refugee</a></li>
		          </ul>
		        </li>

		      </ul>
		    </div>
		  </div>
		</nav>
	</div>

	<h2>HOMELESS LIST</h2>

	<div class="container-fluid">
		<?php
			
			while($rows = mysqli_fetch_array($records))
			{
		?>	
			<div class="row details-list"><br>
			<?php $num+=1; ?>
			<div class="col-sm-4 col-12">
				<div class="card" style="width: 18rem;">
					<img class="card-img-top" src="../assets/profile.png" alt="Card image cap">
					<div class="card-body">
					    <hr><h5><?php echo $rows['name'];?></h5>
					    <p>Location  : <?php echo $rows['state']; ?> , <?php echo $rows['country']; ?></p>
					    <p>Comments : <?php echo $rows['comments']; ?> </p>
					    	<button class="bg-primary" style="color: white;"><a href="tel:<?php echo $rows['tel'] ?>" style="color: white;">CALL</a>
					    		<span class="fa fa-phone bg-primary"></span>
					    	</button>
						    <button class="bg-danger" style="color: white;"><a href="mailto:<?php echo $rows['email'] ?>" style="color: white;" >MAIL</a>
					    		<span class="fa fa-envelope bg-danger"></span>
					    	</button>
					</div>
				</div>
			</div>
		</div>
		<?php
			}
		?>
	</div>

	<section class="footer">
		<footer>
		<p id="copyright" style="text-align: center;">Copyright &copy; 2022 <a href="https://macodeid.com/" target="_blank">Home Zone</a>. All right reserved</p>
	</footer></section> 


	<!--S C R I P T-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>