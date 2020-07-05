<?php
include "C:/xampp/htdocs/PHP/oop_login/login_class/init.php";
if(isset($_POST['createaccount'])){

		$data=[
			'name'=>$_POST['username'],
			'password'=>$_POST['password'],
			'email'=>$_POST['email'],
			'name_error'=>'',
			'password_error'=>'',
			'email_error'=>'',


		];

		 if(empty($data['name'])){
		 	$data['name_error']="name is required";
		 }
		 if(empty($data['password'])){
		 	$data['password_error']="password is required";
		 }
		 	elseif (strlen($data['password'])<5) {
		 		$data['password_error']="password is too short";
		 	}
		 
		 if(empty($data['email'])){
		 	$data['email_error']="email is required";
		 }
	}

	if(empty($data['name_error']) && empty($data['password_error']) && empty($data['email_error'])){
		if($source->Query("INSERT INTO users (name,password,email) VALUES (?,?,?)", [$data ['name'], $data['password'], $data['email']])){

			$_SESSION['account_created']="Your account is created";
			header("location:login.php");
		}

	}


	?>

<!DOCTYPE html>
<html>
<head>
	<title>login form</title>
</head>
<body>

	<h1>User Login Form</h1>
	<form action="" method="post">
		Username:<input type="text" name="username" value="<?php if(!empty($data['name'])):echo $data['name']; endif;?>"><br><br>
		<?php if (!empty($data['name_error'])):?>
			<?php echo $data['name_error']; ?>
		<?php endif; ?>

		Password:<input type="Password" name="password" value="<?php if(!empty($data['password'])): echo $data['password']; endif; ?>"><br><br>
		<?php if (!empty($data['password_error'])):?>
			<?php echo $data['password_error']; ?>
		<?php endif; ?>



		Email:<input type="email" name="email" value="<?php if(!empty($data['email'])):echo $data['email'];endif; ?>"><br><br>
		<?php if (!empty($data['email_error'])):?>
			<?php echo $data['email_error']; ?>
		<?php endif; ?>		

		<input type="submit" name="createaccount" value="Create Account"><br><br>
		<h5><a href="login.php">Already have an account</a></h5>
	</form>	

</body>
</html>