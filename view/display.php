<?php
session_start();

if(isset($_SESSION["loginUser"])==false)
{
	header("Location:../view/login.php");
	exit;
}
else
{ ?>
<html>
	<head>
			<title>Welcome </title>
			<meta charset="utf-8"/>
			<meta name="viewport" content="width=device-width, initial-scale=1">
  	    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	    	
	</head>
	<body>
	<meta charset="utf-8"/>
	<div class="container">
			
			<div class="col-md-6 col-md-push-3">
				
				<h1 class="text center"> WELCOME <span class="text-uppercase" style="color:green"><?php echo $_SESSION["loginUser"]["name"]; ?></span> </h1>

			<table class="table">
				<tr>
					<th>Email  </th>
			    	<td> <?php echo $_SESSION["loginUser"]["email"]; ?></td>
			    </tr>
			    <tr>
					<th>Password </th>
					<td><?php echo $_SESSION["loginUser"]["password"]; ?></td>
				</tr>
				<tr>
					<th>Phone </th>
					<td><?php echo $_SESSION["loginUser"]["phone"]; ?></td>
				</tr>
				<tr>
					<th>Address </th>
					<td><?php echo $_SESSION["loginUser"]["address"]; ?></td>
				</tr>
				<tr>
					<th> </th>
					<td><button class="btn btn-primary">LOGOUT</button> </td>
				</tr>
			</table>
			

			</div>

		
		</div>
	</body>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 	
	</html>
<?php } ?>
