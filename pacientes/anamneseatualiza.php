<SCRIPT src="../js/validacao.js"></script>
<?php

include ("../login/conexao.php");
include ("../funcoes/cabecalho.php");

if($op=="cadastro"){


	//variáveis no padão pro BD

	$nascimento= implode('-', array_reverse(explode('/',$nascimento)));
	$cpf= implode('', explode('.',$cpf));
	$cpf= implode('', explode('-',$cpf));
	$cep= implode('', explode('-',$cep));

	$qry="select * from pacientes where cpf='".$cpf."'";
	echo "$qry";
	$query = mysql_query($qry);
	$total=mysql_num_rows($query);
	echo "<br>total=$total<br>";

	if(mysql_num_rows($query)!=0){

		$qry="insert into pacientes (nome, nascimento, convenio, sexo, estado_civil, profissao,
		cpf, email, rua, complemento, bairro, cidade, telefone, celular, estado, cep)
		values('$nome','$nascimento','$convenio','$sexo', '$estado_civil', '$profissao',
		'$cpf', '$email', '$rua', '$complemento', '$bairro', '$cidade', '$telefone', '$celular', '$estado', '$cep')";
		$query = mysql_query($qry);

}
	echo "$qry";
 	$qry="select seq from pacientes where nome='".$nome."'";
 	$query = mysql_query($qry);
 	$seq = mysql_result($query,0,"seq");
 	echo ("<br> seq=$seq");
	echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL= buscapaciente.php?seq='.$seq.'">';

}

if($op=="anamnese"){
	
$data_consulta= implode('-', array_reverse(explode('/',$data_consulta)));
//echo $data_consulta;
	//echo "porraaaa$seq";

$qry = "select data from anamneses where seq_paciente='$seq' and data='$data_consulta'";
$query = mysql_query($qry);

if(mysql_num_rows($query)!=0){

	$qry="update anamneses set queixa='".$queixa."', molestia='".$molestia."',
	ant_pessoal='".$ant_pessoal."', ant_familiar='".$ant_familiar."', habitos='".$habitos."', medicamentos='".$medicamentos."', obs='".$obs."' 
			where seq_paciente='".$seq."' and data='".$data_consulta."' ";
	
	//echo "$qry";
	$query = mysql_query($qry);
	echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL= buscapaciente.php?seq='.$seq.'">';
	
}
else{
	$qry=" insert into anamneses (seq_paciente, data, queixa, molestia, 
	ant_pessoal, ant_familiar, habitos, medicamentos, obs)
	values ('$seq', '$data_consulta', '$queixa', '$molestia', 
	'$ant_pessoal', '$ant_familiar', '$habitos', '$medicamentos', '$obs')";
	//echo "$qry";
	$query = mysql_query($qry);
	echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL= buscapaciente.php?seq='.$seq.'">';
	}
}

if($op=="atualizar"){


	$qry="update pacientes set nome='".$nome."', nascimento='".$nascimento."', convenio='".$convenio."', sexo='".$sexo."', estado_civil='".$estado_civil."', profissao='".$profissao."',
			 email='".$email."', rua='".$rua."', complemento='".$complemento."', bairro='".$bairro."', cidade='".$cidade."', telefone='".$telefone."', celular='".$celular."', estado='".$estado."', cep='".$cep."'
			 where seq='".$seq."' ";

	echo "$qry";
	//$query = mysql_query($qry);
	//echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL= buscapaciente.php">';

}
/*
if($op=="excluir"){
	//echo ("exlcuir aqui!!!");

	$qry="update pacientes set status='0' where seq='".$seq."' ";
	echo ("$qry");
	//echo ("DESCOMENTAR SELECT!!!");
	//$query = mysql_query($qry);
	//echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL= paciente.php">';
}*/

