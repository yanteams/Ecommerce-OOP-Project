<?php
include '../classess/adminlogin.php';
$class = new adminlogin();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$username = $_POST['username'];
	$passwd = md5($_POST['passwd']);
	$check = $class->login_admin($username, $passwd);
}
?>
<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>

<body>
	<div class="container">
		<section id="content">
			<form action="login.php" method="post">
				<h1>Admin Login</h1>
				<span>
					<?php
					if (isset($check)) {
						echo $check;	
					}
					?>
				</span>
				<div>
					<input type="text" placeholder="Username" required="" name="username" />
				</div>
				<div>
					<input type="password" placeholder="Password" required="" name="passwd" />
				</div>
				<div>
					<input type="submit" value="Log in" />
				</div>
			</form><!-- form -->
			<div class="button">
				<a href="#">Training with live project</a>
			</div><!-- button -->
		</section><!-- content -->
	</div><!-- container -->
</body>

</html>