<?php
// Inclui o arquivo com o sistema de seguran�a
include("secao.php");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$usuario = (isset($_POST['username'])) ? $_POST['username'] : '';
	$senha = (isset($_POST['password'])) ? $_POST['password'] : '';


	if (validaUsuario($usuario, $senha) == true) {

		if($_SESSION['status']==1) //Medico
		{
			header("Location: ../medico/medico.php");
				
		}else if($_SESSION['status']==2){

			header("Location: ../secretaria/secretaria.php");
		}

	} else {

		header("Location: index.php");
	}
}

?>