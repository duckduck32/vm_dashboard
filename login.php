<?php
require('connection.inc.php');
require('functions.inc.php');
$msg='';
if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$sql="select * from admin_users where username='$username' and password='$password'";
	$res=mysqli_query($connection,$sql);
	$count=mysqli_num_rows($res);
	if($count>0){
		$row=mysqli_fetch_assoc($res);
		if($row['status']=='0'){
			$msg="Account deactivated";	
		}else{
			$_SESSION['ADMIN_LOGIN']='yes';
			$_SESSION['ADMIN_ID']=$row['id'];
			$_SESSION['ADMIN_USERNAME']=$username;
			$_SESSION['ADMIN_ROLE']=$row['role'];
			header('location:index.php');
			die();
		}
	}else{
		$msg="PLEASE ENTER CORRECT LOGIN DETAILS";	
	}
	
}
?>

<!doctype html>
<html lang="en">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Dashboard Login</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/style2.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   </head>

<style>
body{
	background-color: lightblue;
}
</style>

<div class="d-flex flex-row-reverse">
   <div class="login-form">
      <form method="POST">
      <div class="loginTitle">
         <label><h5><b>VM Dashboard</b></h5></label><br><br>
      </div>
         <div class="form-group">
            <label><b>USERNAME</b></label>
            <input type="text" name="username" class="form-control" placeholder="        " required>
         </div>
         <div class="form-group">
            <label><b>PASSWORD</b></label>
            <input type="password" name="password" class="form-control" placeholder="          " required>
         </div>
         <div class="submit-login">
         <button type="submit" name="submit" class="btn btn-success btn-lg btn-block">SIGN IN</button>
         </div>
		</form>
		<div class="field_error"><?php echo $msg?></div>
   </div>
</div>
</html>