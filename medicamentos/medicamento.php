<?php
include ("../funcoes/cabecalho.php");
include ("../login/conexao.php");

?>
<script type="text/javascript">

function confirma_exclusao(id_rem){
	//alert(remedio);
	if (confirm('Deletar Medicamento?')){
		document.location = 'deletar.php?id_rem='+id_rem;
	}
}

function editar(id_rem) {
	
    var remedio2 = prompt("Renomear remedio");
    if (remedio != null) {
        document.getElementById("remedio").innerHTML = remedio2 ;
        //alert("Editar medicamento");
        //document.location = 'deletar.php?op=ex&rem='+remedio;
    }
}

function fdp(remedio){
	
	var rem = document.getElementById('table').getElementsByTagName('td');
	alert("çaporra e foda!" + remedio);
	//
}

</script>
<html>
	<body>
		<table id='medicamentos' width=500; style="margin-top:105px; cellspacing='10px' font-family:Roboto-Thin; color:#FFFFFF; font-size:16px;" >
		<tr><th COLSPAN=3 style="align:center; text-align:center; font-family:Roboto-Thin; font-size:20px;">Medicamentos</th></tr>
		<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<?php
//$op="";
$resultado = mysql_query("select nome, id_rem from remedios order by nome");
$total=mysql_numrows($resultado); 
for($i=0;$i<$total;$i++){
	$remedio = mysql_result($resultado,$i,"nome");
	$id_rem = mysql_result($resultado,$i,"id_rem");
	echo "<tr height=60%><td > $remedio </td> <td> 
	<a href='javascript:editar($id_rem);'><img src='edit.png' alt='Editar'></a>	</td><td> 
	<a href='javascript:confirma_exclusao($id_rem);'>	<img src='delete.gif' alt='Excluir'></a> </td></tr>";
}

?>
</table>
	</body>
</html> 

<?php 
/*
<button onclick="myFunction()">Try it</button>
<p id="treta"></p>

<script>
function myFunction() {
    var remedio= prompt("Nome do remedio");
    if (remedio != null) {
        document.getElementById("treta").innerHTML = remedio;
    }
}
</script>
*/