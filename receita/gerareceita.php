<?php

$pdf=" <br> <br> <br> ";
$j=0;
foreach ($chk as $qtd)
{
	$pdf= $pdf . "$buscar[$j]" .  "...........";
	$pdf= $pdf . $dosagem[$j] . "...........";
	$pdf= $pdf . $modo[$j] . "<br>";
	$j++;
}
//echo "$pdf ;


include ("../funcoes/cabecalho.php");
include("../pdf/mpdf.php");

$html = '

<html>
	<body>
	<div style="font-family: roboto; align:center; ">

		<table style="FONT-SIZE:23px; text-align:center; width:100%;">
			<tr style="FONT-SIZE:35px;">
				<td> Dr. M&eacute;dico </td>
			</tr>
			<tr>
				<td> M&eacute;dico - CRM: 12345 </td>
			</tr>
			<tr>
				<td>Otorrinolaringologista</td>
			</tr>

		</table>
	</div>
	</body>
</html>

';

$mpdf=new mPDF();
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($pdf);
$mpdf->Output();
exit;

/*

Dr. Luis Mauricio S. Nassif
Médico - CRM: 31547
Otorrinolaringologista

*/

?>