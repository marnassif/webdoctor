<?php
include ("../funcoes/cabecalho.php");
include("../pdf/mpdf.php");


$pdf= " <br> <br>" ."Para:  " .$nomepaciente; 

$pdf=$pdf ." <br> <br> <br> <table style='width:100%; FONT-SIZE:19px; text-align:center; '>";

foreach ($buscar as $j => $qtd)
{
	$pdf= $pdf . "<tr><td style='text-align:left'> $buscar[$j] </td>";
	$pdf= $pdf . "<td style='text-align:left' > $dosagem[$j]</td>";
	$pdf= $pdf . "<td> $modo[$j] </td></tr>";
}
$pdf=$pdf . "</table>";
echo "$pdf ";


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


?>