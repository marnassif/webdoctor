<?php
session_start();

include 'conexao.php';



function validaUsuario($usuario, $senha) {

	global $_SG;

	// Usa a funcao addslashes para escapar as aspas
	$nusuario = addslashes($usuario);
	$nsenha = addslashes($senha);

	// Monta uma consulta SQL (query) para procurar um usu‡rio
	$sql = "SELECT id,nome,email, status FROM usuarios WHERE user_name = '".$nusuario."' AND password = '".$nsenha."' and status != 3 LIMIT 1";
	$query = mysql_query($sql);
	$resultado = mysql_fetch_assoc($query);


	if (empty($resultado)) {

		return false;

	} else {
		$_SESSION['usuarioID'] = $resultado['id'];
		$_SESSION['usuarioNome'] = $resultado['nome'];
		$_SESSION['usuarioLogin'] = $usuario;
		$_SESSION['usuarioSenha'] = $senha;
		$_SESSION['usuarioEmail'] = $email;
		$_SESSION['status'] = $resultado['status'];

	}

	return true;
}


/**
 * Funcao para expulsar um visitante
 */
function expulsaVisitante() {
	global $_SG;

	unset($_SESSION['usuarioID'], $_SESSION['usuarioNome'], $_SESSION['usuarioLogin'], $_SESSION['usuarioSenha']);

	header("Location:login.php ");
}

?>