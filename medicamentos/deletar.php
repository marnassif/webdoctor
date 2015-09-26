<?php
include ("../funcoes/cabecalho.php");
include ("../login/conexao.php");


	//echo "<br> $id_rem <br>";
	//echo "delete from remedios where id_rem=$id_rem";
	$query = mysql_query("delete from remedios where id_rem='$id_rem'");

	?>
	<script language="javascript">
	alert("Medicamento Excluido");
	window.location.href = "medicamento.php"; 
	</script>