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
//echo "$qry";
$query = mysql_query($qry);
$total=mysql_numrows($query);
//echo "<br>total=$total<br>";

//if(mysql_numrows($query)==0){

	$qry="insert into pacientes (nome, nascimento, convenio, sexo, estado_civil, profissao,
	cpf, email, rua, complemento, bairro, cidade, telefone, celular, estado, cep)
	values('$nome','$nascimento','$convenio','$sexo', '$estado_civil', '$profissao',
	'$cpf', '$email', '$rua', '$complemento', '$bairro', '$cidade', '$telefone', '$celular', '$estado', '$cep')";
	$query = mysql_query($qry);
	
//}
	

//echo "$qry";
 	$qry="select seq from pacientes where nome='".$nome."'";
 	$query = mysql_query($qry);
 	$seq = mysql_result($query,0,"seq");
//	echo ("<br> seq=$seq");
//	echo ("<br> seq=$cpf");
	//echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL= buscapaciente.php?seq=echo($seq);">';
	  echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL= buscapaciente.php?seq='.$seq.'">';
}

if($op=="anamnese"){

	
	$qry=" insert into anamneses (principal, origem, recorrencia, historico, otoscopia, audiometria, obs) 
 			values ('$principal',' $origem', '$recorrencia', '$historico', '$otoscopia', '$audiometria', '$obs')";
	//echo "$qry";
	$query = mysql_query($qry);
	}
	
if($op=="atualizar"){
	
	$nascimento= implode('-', array_reverse(explode('/',$nascimento)));
	
	$qry="update pacientes set nome='".$nome."', nascimento='".$nascimento."', convenio='".$convenio."', sexo='".$sexo."', estado_civil='".$estado_civil."', profissao='".$profissao."',
			 email='".$email."', rua='".$rua."', complemento='".$complemento."', bairro='".$bairro."', cidade='".$cidade."', telefone='".$telefone."', celular='".$celular."', estado='".$estado."', cep='".$cep."'
			 where seq='".$seq."' ";
		
		//echo "$qry";
		$query = mysql_query($qry);
		echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL= buscapaciente.php?seq='.$seq.'">';
		
}
	
if($op=="excluir"){
	//echo ("exlcuir aqui!!!");
	
	$qry="delete from pacientes where seq='".$seq."' ";
	//echo ("$qry");
	//echo ("DESCOMENTAR SELECT!!!");
	$query = mysql_query($qry);
	
	echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL= paciente.php">';
}

if($op=="orl"){
	$data_consulta= implode('-', array_reverse(explode('/',$data_consulta)));
	
	$qry = "select data from orl where seq_paciente='$seq' and data='$data_consulta'";
	$query = mysql_query($qry);
	
	if(mysql_num_rows($query)!=0){
	
	$qry=" update orl set data='".$data_consulta."', orelha='".$orelha."', nariz='".$nariz."', boca='".$boca."', 
			faringe='".$faringe."', laringe='".$laringe."', face='".$face."', cervical='".$cervical."'
			 where seq_paciente='".$seq."' and data='".$data_consulta."' ";
	//echo "$qry";
	$query = mysql_query($qry);
	echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL= buscapaciente.php?seq='.$seq.'">';
	}
	else{
		$qry=" insert into orl (seq_paciente, data, orelha, nariz, boca, faringe, laringe, face, cervical)
		values ('$seq', '$data_consulta', '$orelha', '$nariz', '$boca', '$faringe', '$laringe', '$face', '$cervical')";
		//echo "$qry";
		$query = mysql_query($qry);
		echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL= buscapaciente.php?seq='.$seq.'">';
	}
	
}













