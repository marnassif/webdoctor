<?php
session_start();
if(!isset($_SESSION['usuarioNome']) ) //&& $_SESSION['sstatus']!=1)
{	
	header('Location:../login/login.php');	
	}
else{


include ("../funcoes/cabecalho.php");


?>
	<div id="mainPicture" style="margin-top: 7.5%;  margin-left: 26%;">
		<div class="picture">
			<div id="headerTitle" >WebDoctor</div>
			<div id="headerSubtext" >Dr. M&eacute;dico</div>
		</div>
		</div>

	<?php 
}
	?>