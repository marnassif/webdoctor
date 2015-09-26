<?php
include 'conexao.php';

require ("../phpmailer/class.phpmailer.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WebDoctor</title>
<link href="../css/style_login.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="gradient"></div>
</body>
</html>


<?php 

$qry="SELECT nome, user_name, password FROM usuarios WHERE email = '".$email."' and status != 3 LIMIT 1";
//echo ("$qry");
$result = mysql_query($qry);
$total = mysql_numrows($result);
//echo ("$total");
if($total != 0){
	$nome = mysql_result($result,0,"nome");
	$user_name = mysql_result($result,0,"user_name");
	$senha = mysql_result($result,0,"password");
	$mensagem = "Nome: ".$nome." Usu&aacute;rio: ".$user_name." Senha: ".$senha." ";
	
	$mail = new PHPMailer;
	$mail->IsSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';	// SMTP utilizado
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'marnassiftcc@gmail.com';                            // SMTP username
	$mail->Password = 'casqueiro';                           // SMTP password
	$mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted
	$mail->Port = 465;  		// A porta 465 deverá estar aberta em seu servidor
	$mail->From = 'marnassiftcc@gmail.com';
	$mail->FromName = 'webdoctor';
	$mail->AddAddress('marnassiftcc@gmail.com', 'webdoctor');  // Add a recipient
	$mail->AddAddress('marnassif@gmail.com');
	$mail->Subject = 'Lembrete de Senha';
	$mail->Body = $mensagem;
	$mail->AltBody = $mensagem;
	if(!$mail->Send()) {
		
	echo '<br>Message could not be sent.';
	echo '<br>Mailer Error: ' . $mail->ErrorInfo;
	exit;
}
	else{
		?>
			<script type="text/javascript">
				alert("A senha foi enviada para seu e-mail!");
				window.location.href = 'login.php';
			</script>
		<?php
	}
}
	else{
	?>
		<script type="text/javascript">
			alert("E-mail nao cadastrado!");
			window.location.href = 'novasenha.php';
		</script>
	<?php
	}
?>