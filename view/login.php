<html>

<head>
		<title> Demo Project</title>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
  	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body onLoad="hideMsg();">

	<div class="form-group col-md-4" style="margin-left: 25%">
	
		<h2> User Login  </h2>

	    <div id="msg1" class="alert alert-success alert-dismissable">
   		<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
   		<strong>Success!</strong> <span class="msg"></span>
		</div>

		<div id="msg2" class="alert alert-warning alert-dismissable">
    	<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		<strong>Warning!</strong> <span class="msg"></span>
		</div>


		<form  method="post" accept-charset="utf-8" id="login" onsubmit="return login();">

		Email: <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email Address" required>
		<br>
	
		Password : <input type="password" name="pwd" id="pwd" class="form-control" placeholder="Enter Password" required>
		<br>
	
		<input type="submit" name="reg" id="reg" class="btn btn-primary" > 
	    <input type="reset" id="reset_btn" class="btn btn-warning">

		</form>
	</div>


</body>

<script>

function hideMsg()
{
    $("#msg1").hide();
    $("#msg2").hide();
}

function login()
{
	hideMsg();
	$.ajax({
    type: "POST",
    url: "../Home.php",
    data: {login_email:$("#email").val(),pwd:$("#pwd").val()},
    success: function(data){
    	alert(data);
        if(data==1)
        {
   	    	$("#msg1").show();
	       	$(".msg").html("user Login successfuly");
	       	
	       	setTimeout(function(){
  				window.location.href="display.php"; 
			}, 2000);
	     }
       else 
        {	$("#msg2").show();
    		$(".msg").html(data);
        	$("#email").focus();
        }
        

   	 }
	});
	return false;
}

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</html>


