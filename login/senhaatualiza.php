<?php

include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$email = (isset($_POST['email'])) ? $_POST['email'] : '';
}
echo "$email";
echo "<br>teste<br>";


	global $_SG;

	// Usa a funcao addslashes para escapar as aspas
	$email = addslashes($email);

	// Monta uma consulta SQL (query) para procurar um usuario
	$qry="SELECT * FROM usuarios WHERE email = '".$email."' and status != 3 LIMIT 1";
	echo "$qry <br>";
	$query = mysql_query($qry);
	echo "$query";
	$nome = mysql_result($query,0,"nome");
	$user_name = mysql_result($query,0,"user_name");
	$senha = mysql_result($query,0,"password");
 
	if (!$query) 
		echo "E-mail inválido!";
	else 
	{
		echo "$nome $user_name $senha aquii <br>";
		
		
		
	}
	