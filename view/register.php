
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="../css/style-login.css">

	<title>Rekreativni tenis | Registracija</title>
</head>
<?php
 $action=isset($_REQUEST['action'])?$_REQUEST['action']:"";

$username = isset($_POST['username'])?$_POST['username']:'';
$email =isset($_POST['email'])?$_POST['email']:'';
$password =isset($_POST['password'])?$_POST['password']:'';
$cpassword = isset($_POST['cpassword'])?$_POST['cpassword']:'';
$phone = isset($_POST['phone'])?$_POST['phone']:'';
$adress = isset($_POST['adress'])?$_POST['adress']:'';




?>

<style>
	 a:link {
            text-decoration: none;
        }
</style>
<body style='background-image:url("https://i.imgur.com/Q3sEQSN.jpg")'>
	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Registracija</p>
			<div class="input-group">
				<input type="text" placeholder="Korisničko ime" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Lozinka" name="password" value="<?php echo $password ?>" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Potvrdi lozinku" name="cpassword" value="<?php echo $cpassword ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Telefon" name="phone" value="<?php echo $phone ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Adresa" name="adress" value="<?php echo $adress  ?>" required>
			</div>
			<div class="input-group">
				
			<input type="submit" name="action" value="Register" class="btn"> 
			</div>
			<p class="login-register-text">Imate nalog? <a href="../User/?action=LoginFrom">Ulogujte se</a>.</p>
		</form>
	</div>
</body>
</html>