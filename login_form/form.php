<?php
include "C:/xampp/htdocs/PHP/oop_login/login_class/init.php";

?>

<!DOCTYPE html>
<html>
<body>

	<?php if(isset($_SESSION['account_login'])): ?>
		<?php echo $_SESSION['account_login']; ?>
	<?php endif; ?>
	<?php unset($_SESSION['account_login']); ?>
	<h2> Welcome to dashboard</h2>
	<a href="login.php">logout </a>
</body>
</html>
