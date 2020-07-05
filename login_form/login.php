<?php

include "C:/xampp/htdocs/PHP/oop_login/login_class/init.php";
if(isset($_POST['login'])){
	$data=[
		'name'=>$_POST['username'],
		'password'=>$_POST['password'],
		'name_error'=>'',
		'passwod_error'=>'',
	];
	if(empty($data['name'])){
		$data['name_error']="name is required";
	}
	if(empty($data['password'])){
		$data['password_error']="password is required";
	}
	elseif (strlen($data['password'])<5){
		$data['password_error']="Password is too short";
	}
}
if(empty($data['name_error']) && empty($data['password_error'])){
	if($source->Query("SELECT * FROM users WHERE username=?", [data['name']])){
			if($source->Query("SELECT * FROM users WHERE password=?", [data['password']])){

			$_SESSION['account_login']="Hello ".$name . "Your are login sucesfully";
			$_SESSION['id']=$id;
			header("location:form.php");
}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>login form</title>
</head>
<body>
	<?php
	if(isset($_SESSION['account_created'])):?>
		<?php echo $_SESSION['account_created'];?>
	<?php endif; ?>
	<?php unset($_SESSION['account_created']) ?>
	<h1>User Login</h1>
	<form action="" method="post">
		Username:<input type="text" name="username" value="<?php if(!empty($data['name'])):echo $data['name']; endif; ?>"><br><br>
		<?php if(!empty($data['name_error'])): ?>
			<?php echo $data['name_error']; ?>
		<?php endif;?>
		Password:<input type="Password" name="password" value="<?php if(!empty($data['password'])): echo $data['password']; endif; ?>"><br><br>
		<?php if(!empty($data['password_error'])): ?>
			<?php echo $data['password_error']; ?>
		<?php endif; ?>
		<input type="submit" name="login" value="Login"><br><br>
		<h5><a href="index.php">Create an account</a></h5>
	</form>


</body>
</html>