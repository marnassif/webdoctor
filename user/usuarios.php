<?php
include ("../funcoes/cabecalho.php");
include ("../login/conexao.php");

?>

<html>
<body>
	<table id='user' width=500; style="margin-top:105px; cellspacing='10px' font-family:Roboto-Thin; color:#FFFFFF; font-size:16px;" >
<tr><th COLSPAN=3 style="align:center; text-align:center; font-family:Roboto-Thin; font-size:20px;">Usu&aacute;rios</th></tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<?php

$resultado = mysql_query("select nome, user_name, status from usuarios");
$total=mysql_numrows($resultado);
for($i=0; $i<$total; $i++){
$nome = mysql_result($resultado, $i, "nome");
$user_name = mysql_result($resultado, $i, "user_name");
$status = mysql_result($resultado, $i, "status");
if($status==0)
	$status="Bloqueado";
if($status==1)
	$status="Acesso total";
if($status==2)
	$status="Acesso restrito";
echo "<tr><td > $nome </td> <td > $user_name </td><td > $status </td></tr>";
}
?>
</table>
</body>
</html>

