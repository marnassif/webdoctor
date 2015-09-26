<?php 
function formata_data($data)
{
	//recebe o parâmetro e armazena em um array separado por -
	$data = explode('-', $data);
	//armazena na variavel data os valores do vetor data e concatena /
	$data = $data[2].'/'.$data[1].'/'.$data[0];

	//retorna a string da ordem correta, formatada
	return $data;
}

function formatarData($data){
	$rData = implode("-", array_reverse(explode("/", trim($data))));
	return $rData;
}

function mostraData ($data) {
	if ($data!='') {
		return (substr($data,8,2).'/'.substr($data,5,2).'/'.substr($data,0,4));
	}
	else { return ''; }
}
function formatar_data_contrario($d)//utilizado pelo google calendar
{
	$d1 = explode("/", $d);
	return $d1[2]."-".$d1[1]."-".$d1[0];
}


$teste1="01-01-2001";
$teste1 = formata_data($teste1);
echo "teste1 - " ;
echo $teste1;

echo" .2. ";
$teste2="02/02/2002";
$teste2 = formatarData($teste2);
echo "teste2 - " ;
echo $teste2;


echo" .3. ";
$teste3="2003-03-03";
$teste3 = mostraData($teste3);
echo "teste3 - " ;
echo $teste3;

echo" .4. ";
$teste4="04/04/2004";
$teste4 = formatar_data_contrario($teste4);
echo "teste4 - formatar_data_contrario - " ;
echo $teste4;


