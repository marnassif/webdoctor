<?php

include ("../login/conexao.php");
include ("../funcoes/cabecalho.php");
	
	$qry="update pacientes set status='0' where seq='".$seq."' ";
	//echo "$qry";
	$query = mysql_query($qry);
	echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL= paciente.php">';
?>