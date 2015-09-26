<SCRIPT src="../js/validacao.js"></script>
<?php

include ("../login/conexao.php");
include ("../funcoes/cabecalho.php");

if($op=="cadastro"){

	$data_consulta= implode('-', array_reverse(explode('/',$data_consulta)));
	//echo $data_consulta;
	//echo "porraaaa$seq";
	
	$qry = "select data from orl where seq_paciente='$seq' and data='$data_consulta'";
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
		echo "$qry";
		//$query = mysql_query($qry);
		//echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL= buscapaciente.php?seq='.$seq.'">';
	}
	}


