<?php
include ("../login/conexao.php");
include ("../funcoes/cabecalho.php");
?>
<SCRIPT type="text/javascript">

jQuery(document).ready(function($){
	$('#buscap').autocomplete({source:'buscapaciente.php', minLength:2, 
		messages: {noResults: '',
        results: function() {}}
	});  });


jQuery(document).ready(function($){
	$('input[id="buscar"]').autocomplete({source:'buscaremedio.php', minLength:2, 
		messages: {noResults: '',
        results: function() {}}
	});  });


function addRow(tableID){
	var table=document.getElementById(tableID);
	var rowCount=table.rows.length;
	var row=table.insertRow(rowCount);
	var colCount=table.rows[0].cells.length;
	for(var i=0;i<colCount;i++){
		var newcell=row.insertCell(i);
		newcell.innerHTML=table.rows[0].cells[i].innerHTML;
		switch(newcell.childNodes[0].type){
			case"text":newcell.childNodes[0].value="";
			break;
			case"checkbox":newcell.childNodes[0].checked=false;
			break;
		}
	}

	jQuery(document).ready(function($){
		$('input[id="buscar"]').autocomplete({source:'buscaremedio.php', minLength:2, 
			messages: {noResults: '',
	        results: function() {}}
		});  });
	
}

function deleteRow(tableID){
		var table=document.getElementById(tableID);
		var rowCount=table.rows.length;
		for(var i=0;i<rowCount;i++){
			var row=table.rows[i];
			var chkbox=row.cells[0].childNodes[1];
			if(null!=chkbox&&true==chkbox.checked){
				if(rowCount<=1){
					alert("Nao e possivel deletar todas as linhas.");
					break;
				}
			table.deleteRow(i);rowCount--;i--;
			}
		}
	}

	function validareceita(){

		if (document.paciente.buscap.value == ""){
			alert("Selecionar o paciente!");
			document.paciente.buscap.focus();
			return false;
		}

		document.receita.nomepaciente.value = document.paciente.buscap.value;
		document.receita.submit();
		return true;

	  }
  

	  
</script>

<link rel="stylesheet" href="../jquery-ui-1.9.2.custom/css/smoothness/jquery-ui-1.9.2.custom.css">

<SCRIPT src="../js/validacao.js"></script>

<html>


<form name="paciente"  OnSubmit="javascript:return validabusca();" method="post">
	<?php $tipo=1;?>
	<div style="font-family: roboto; color:#FFFFFF; font-weight: bold; align:center; margin-top: 2%;  margin-left: 32%;">
 			PACIENTE:
			<input type="text" id="buscap" name="busca"  size=60/>
		<br/>
	</div>	
</form>



<form name="receita" action="gerarareceita.php" target="_blank" OnSubmit="javascript:return validareceita();" method="post">
	<br><br><br>
	<h1 style="text-align:center; color:#FFFFFF; font-family:Roboto-Thin; font-size:16px; width=150;"> RECEITA M&Eacute;DICA</h1>
		 
	<table  width=500; style="margin-top:25px; cellspacing='10px' font-family:Roboto-Thin; color:#FFFFFF; font-size:16px;">
		<tr >
			<td>&nbsp;</td>
			<td>Medicamento	</td>
			<td>Quantidade	</td>
			<td> Modo de Uso </td>
		</tr>
	</table>
	<table id="tabela_receita" style="align:center; color:#FFFFFF; margin-top:5px;  width=300; height=100; "> 
		<tr>
			<td>
				<input type="checkbox" name="chk[]" id="check" size="25" />
			</td>
			<td>
				<input type="text" name="buscar[]" id="buscar" size="25" />
			</td>
			
			<td>
				<input type="text" name="dosagem[]" id="dosagem" size="10" />
			</td>			
			<td>
				<input type="text" name="modo[]" id="modo" size="35" />
			</td>
		</tr>
	</table>
	<br> <br>
	<input type="button" value="Adicionar Linha" onClick="javascript:addRow('tabela_receita')" style="border: solid thick #ffffff; border-radius: 0.5em; margin-left: 40%;"/>&nbsp;
	<input type="button" value="Remover Linha" onClick="javascript:deleteRow('tabela_receita')" style="border: solid thick #ffffff; border-radius: 0.5em; margin-left: 2%;" />
	<input type="hidden" value="" name="nomepaciente">
	
	<br><br><br><br><br>
	<div style="margin-left: 45%;">
		<input type="submit" value="Gerar Receita" style="width:100px; text-align:center; border: solid thick #ffffff; border-radius: 1em; " /> 
		
	</div>

 </form>

 <!--  float: left; text-align: center; width: 10%; margin-top: -25px;  margin-left: 2.8%;  -->
 
 <div style=" align:right;   margin-left: 80%; margin-top: -18%;"> 
	<button type="button" style="height: 60px; text-align: center; border: solid thick #ffffff;" onClick="parent.location.href='../medicamentos/medicamento.php'">Gerir Medicamentos
	</button>
</div>

