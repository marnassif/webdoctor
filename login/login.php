<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WebDoctor</title>

<link href="../css/style_login.css" rel="stylesheet" type="text/css" />

<script type="text/javascript"
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$(".username").focus(function() {
		$(".user-icon").css("left","-48px");
	});
	$(".username").blur(function() {
		$(".user-icon").css("left","0px");
	});

		$(".password").focus(function() {
			$(".pass-icon").css("left","-48px");
		});
		$(".password").blur(function() {
			$(".pass-icon").css("left","0px");
		});
});
</script>

</head>
<body>

	<div id="wrapper">

		<div class="user-icon"></div>
		<div class="pass-icon"></div>

		<form name="login-form" class="login-form" action="valida.php" method="post">

			<div class="header">
				<h1>Digite seus dados :</h1>
			</div>

			<div class="content">
			Usu&aacute;rio</br>
				<input name="username" type="text" class="input username"
					value="Username" onfocus="this.value=''" /> 
			<br>
			<br>Senha</br>
			<input name="password"
					type="password" class="input password" value="Password"
					onfocus="this.value=''" />
			</div>
			
			<div align="center">
			<a href="novasenha.php">Esqueci minha senha!</a>
			</div>

			<div class="footer">
				<input style ="position: relative; left: 60px;" type="submit" name="submit" value="Login" class="button" />

			</div>
			
			

		</form>

	</div>

	<div class="gradient"></div>

</body>
</html>
