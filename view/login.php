<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="../css/style-login.css">

	<title>Rekreativni tenis | Login</title>
</head>
<?php
    $email =isset($_POST['email'])?$_POST['email']:'';
	$password =isset($_POST['password'])?$_POST['password']:'';

?>
<body style='background-image:url("https://i.imgur.com/Q3sEQSN.jpg")'>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $password ?>" required>
			</div>
			<div class="input-group">
			<input type="submit" name="action" value="Login" class="btn"> 	
			</div>
			<p class="login-register-text">Nemate nalog? <a href="../User/?action=RegisterFrom">Registracija</a>.</p>
		</form>
	</div>
</body>
</html>