<link rel="stylesheet" href="../jquery-ui-1.9.2.custom/css/smoothness/jquery-ui-1.9.2.custom.css">
<?php
include ("../funcoes/cabecalho.php");
include ("../login/conexao.php");

//session_start();
?>
<script>
$(document).ready(function(){
	$(".botao").button();

$(".trh").hover(function() {
    $(this).css("color", "#1B4EAD");//#8cbdf8
}, function() {
    $(this).css("color", "#FFFFFF");
}); });

</script>

<?php
//echo "pqp";
$qry="select seq, nome, nascimento, profissao from pacientes order by nome";
$query = mysql_query($qry);
$total = mysql_num_rows($query);
$fim=$total;

$data=date("Y");

for($i = 0;$i<$total; $i++){//Pega o nome dos campos
	$seq[] = mysql_result($query,$i,"seq");
	$nome[] = mysql_result($query,$i,"nome");
	//$nascimento= mysql_result($query,$i,"nascimento");	
	$idade[]= mysql_result($query,$i,"nascimento");
	
	$ano=explode('-',$idade[$i]);
	
	$idade[$i]=$data-$ano[0];
	
	
	//$idade[]=implode('/', array_reverse(explode('-',$nascimento)));
	$profissao[] = mysql_result($query,$i,"profissao");
}
 //$idade[]=implode('/', array_reverse(explode('-',$nascimento)));
 /*
$ano=explode('-',$nascimento)



*/

//Montando o cabeçalho da tabela
$table = '<table cellpadding="6"; border=0; cellspacing="5";  style="color:#FFFFFF;  align:center; margin-top: 105px; border-radius: 1em;"><tr>';
$table .= '<tr >';
$table .= '<th  bgcolor="#85a9df" colspan="4" style="text-align:center; font-family:Roboto-Thin; font-size:16px;" >'.Pacientes.'</th>';
$table .= '</tr>';
$table .= '<td style="text-align:center;"  bgcolor="#85a9df"  colspan="2">'.Nome.'</td>';
$table .= '<td style="text-align:center;"  bgcolor="#85a9df" >'.Idade.'</td>';
$table .= '<td style="text-align:center;"  bgcolor="#85a9df" >'.Profissao.'</td>';



//Montando o corpo da tabela
$table .= '<tbody>';

	for($i = 0;$i < $total; $i++){
		$table .= '<tr class="trh">';
		
		$table .= '<td  bgcolor="#85a9df"> <a href="buscapaciente.php?seq='.$seq[$i].'" > <img src="../images/visualizar.gif"></a></td>';
		$table .= '<td  bgcolor="#85a9df" >'.$nome[$i].'</td>';
		$table .= '<td  bgcolor="#85a9df" style="text-align:center;" >'.$idade[$i].'</td>';
		$table .= '<td  bgcolor="#85a9df" style="text-align:center;">'.$profissao[$i].'</td>';
		$table .= '</tr>';
		
		
	}
	
	$fim--;


//Finalizando a tabela
$table .= '</tbody></table>';

//Imprimindo a tabela
echo $table;


?>

<div>
	
	
	
	
	
</div>

