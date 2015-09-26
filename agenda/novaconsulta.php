<?php
include ("../funcoes/cabecalho.php");


?>
<SCRIPT type="text/javascript">

jQuery(document).ready(function($){
	$('#busca').autocomplete({source:	'../pacientes/busca.php', minLength:2,
	messages: {noResults: '',
	results: function() {}}
	});  });



function validacao()
{
	if (document.agendamento.data.value == ""){
		alert("Preencher a data!");
		document.agendamento.data.focus();
		return false;
	}
	if (document.agendamento.hora_inicio.value == ""){
		alert("Informar a hora de inicio da consulta!");
		document.agendamento.hora_inicio.focus();
		return false;
	}if (document.agendamento.hora_fim.value == ""){
		alert("Preencher a data!");
		document.agendamento.hora_fim.focus();
		return false;
	}
	if (document.agendamento.busca.value == ""){
		alert("Selecionar o paciente!");
		document.agendamento.busca.focus();
		return false;
	}
		
	document.agendamento.submit();
	return true;
	
}
function mascara_hora(e,hr)
{
	var tecla = e.keyCode ? e.keyCode : e.which ? e.which : e.charCode;	
	if (tecla >= 48 && tecla <= 57)
	{
		if (hr.value.length == 2){
		hr.value += ':';
		}
	}
	else{
		if (tecla == 8 || tecla == 9 || tecla == 46)
			return true;
		else
			return false;
	}
}


</script>



<link rel="stylesheet" href="../jquery-ui-1.9.2.custom/css/smoothness/jquery-ui-1.9.2.custom.css">
<SCRIPT src="../js/pqp.js"></script>
<form name="agendamento" OnSubmit="javascript:return validacao();" action="../ZendGdata-1.12.11/teste2.php"  >
	<?php $tipo=1;?>
	<div style="font-family: roboto; color:#FFFFFF; font-weight: bold; align:center; margin-top: 2%;  margin-left: 32%;">
 			PACIENTE:
			<input type="text" id="busca" name="busca"  size=60/>
		<br/>
	</div>	

<br><br><br>
<h1 style="text-align:center; color:#FFFFFF; font-family:Roboto-Thin; font-size:16px; width=150;"> AGENDAMENTO </h1>

<div style=" align:center; margin-top: 2%;  margin-right:15%; float:right;">

	<iframe 
		src="https://www.google.com/calendar/embed?showTitle=0&amp;showPrint=0&amp;&amp;showCalendars=0&amp;showTz=0&mode=WEEK&amp;height=700&amp;wkst=1&amp;hl=pt_BR&amp;bgcolor=%23333399&amp;src=marnassiftcc%40gmail.com&amp;color=%232952A3&amp;ctz=America%2FSao_Paulo" style=" border-width:0 " width="600" height="400" frameborder="0" scrolling="no">
	</iframe>

</div>


	<div style="font-family: roboto; color:#FFFFFF; font-weight: bold; align:center; float:left; margin-top: 10%;  margin-left: 10%;">
		<p><strong>Data &nbsp;&nbsp;&nbsp;&nbsp;</strong>
		<input id="data" name="data" type="text" maxlength=10 onkeypress="return mascara_data(event,this);" onblur="return ValidarDataAgenda(this);" /></p>
		<p><strong>Hor&aacute;rio de In&iacute;cio</strong>
		<input name="hora_inicio" id="hora_inicio" type="text"  maxlength=5 onkeypress="return mascara_hora(event,this);"/></p><br>
		<p><strong>Hor&aacute;rio do T&eacute;rmino </strong>
		<input name="hora_fim" id="hora_fim" type="text" maxlength=5 onkeypress="return mascara_hora(event,this);"/></p><br>
		<button value="Agendar" type="submit" style="align:center; text-align: center; border: solid thick #ffffff; border-radius: 1em;">Agendar Consulta
		</button>
	</div>
</form>