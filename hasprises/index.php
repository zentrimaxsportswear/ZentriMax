
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Hasprises International | Admin</title>

    <link rel="shortcut icon" href="images/favicon.png" />
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	
	<!--JavaScript Custom Functions-->
	<script src="js/functions.js"></script>
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/top.js"></script>
	
<!-- Responsive Tabs JS -->
    <!--<script src="js/jquery.responsiveTabs.js" type="text/javascript"></script>-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  
  <header>
    
    <div class="bg_color1">
       
       <div class="container">
          <div class="row">
          
             <div class="col-md-5">
               <div class="text1"><img src="../images/slider/hasprises.png" width="100" /> <b>HASPRISES INTERNATIONAL</b> </div>
             </div>
             
             <div class="col-md-1"></div>
             
             <div class="col-md-6">
               <div class="toplinks">
              <div class="links">
                
				<?php
				if(isset($_SESSION['user']))
				{
					echo '
                <div class="myaccount">
                  <a href="#" title="My Account"><span class="hidden-xs">My Account</span></a>
                </div>
                <div class="logout"> 
					 <a href="logout.php"><span class="hidden-xs">Logout</span></a>
					</div>';
					
					$full_url = $_SERVER['REQUEST_URI'];								//get url
					$cur_url = explode('/', $full_url, 4);
					$current_url = $cur_url[3];
					// echo $current_url;
				}
				?>

              </div>
            </div>
             </div>
             
          </div>
       </div>
       
    </div>
    
    
    
	
	<hr class="set-nav">
    
  </header>

<div class="container">
<div class="panel panel-primary" style="width:400px; margin:auto;">
<div class="panel-heading"><h3>Admin - Login</h3></div>
<form method="post" autocomplete="">
<div class="panel-body">
<div class="form-group">
  <label for="usr">Username:</label>
  <input type="text" name="user" class="form-control" id="usr" required autofocus="" />
</div>
<div class="form-group">
  <label for="pwd">Password:</label>
  <input type="password" name="pass" class="form-control" id="pwd" required />
</div>
<button class="btn btn-primary" name="sub">Login</button>&nbsp;<input type="reset" class="btn btn-default" name="cancel" value="Cancel" />
</form>
</div>
</div>
</div>

</body>

<?php
if(isset($_POST['sub']))
{
	$user=mysql_real_escape_string($_POST['user']);
	$pass=mysql_real_escape_string($_POST['pass']);
	
	//echo $pass;
	
	include("connection.php");
	
	$que=mysql_query("SELECT * FROM login WHERE username='$user' && password='$pass'");
	
	$select=mysql_fetch_array($que);
	
	$count=mysql_num_rows($que);
	
	//echo $count;
	
	if($count>0)
	{
		session_start();
		
		$_SESSION['user']=$select['username'];
		
		header('location: admin.php');
	}
	
	else
	{
		echo "Login Error! Incorrect Username or Password.";
	}
	
	
}
?>

<?php //include('footer_admin.php'); ?>