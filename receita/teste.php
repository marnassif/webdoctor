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
		$('#buscar').autocomplete({source:'buscaremedio.php', minLength:2, 
			messages: {noResults: '',
	        results: function() {}}
		});  });

//funções tabela dinâmica:
    var conta=0;
	function novaLinha(){
		conta++;
		var parte1 = "<td  id='tabela_linha_" + conta + "'><input type='button' ";
		var parte2 = "value='remover' onClick=\"javascript:removeLinha('tabela_linha_"+conta+"')\"></input>";
		document.getElementById("tabela_remedio").innerHTML += parte1 + parte2;
		document.getElementById("tabela_remedio").innerHTML += "</td></tr>";
	}
	
	 var line=0;
	function novaLine(){
		line++;
		var p1 = "<tr><td COLSPAN='2' id='tabela_linha_" + conta + "'>Medicamento</td><td COLSPAN='2' id='tabela_linha_" + conta + "'>Quantidade</td></tr><tr><td COLSPAN='2' id='tabela_linha_" + conta + "'><input type='text' id='buscar' size='65' /></td><td COLSPAN='2' id='tabela_linha_" +line+ "'><input type='text' id='dosagem' size='25' /></td></tr><tr><td COLSPAN='3'> Modo de Uso </td></tr><tr><td COLSPAN='3' id='tabela_linha_" +line+ "'><input type='text' id='buscar' size='95' /></td><input type='button'value='remover' onClick=\"javascript:removeLinha('tabela_linha_"+line+"')\"></input>";

		document.getElementById("tabela_receita").innerHTML += p1;
		document.getElementById("tabela_receita").innerHTML += "</td></tr>";
   }

	function removeLinha(id){

		teste = document.getElementById(id);
		tr = teste.parentNode.parentNode;
		objtable = tr.parentNode;
		indtr = tr.rowIndex;

		objtable.deleteRow(indtr);
		}

	
	/*function removeLinha(id){

		teste = document.getElementById(id);
		teste.parentNode.parentNode.removeChild(teste.parentNode);
		document.getElementById('tabela_receita').removeChild(teste);
	}*/

	/*
	 function novaLinha(){
		conta++;
       var parte1 = "<tr><td>Teste " + conta + "</td>";
      	var parte2 = "<td  id='tabela_linha_" + conta + "'><input type='button' ";
      	var parte3 = "value='remover' onClick=\"javascript:removeLinha('tabela_linha_"+conta+"')\"></input>";

    	document.getElementById("tabela_produto").innerHTML += parte1+ parte2 + parte3;
    	document.getElementById("tabela_produto").innerHTML += "</td></tr>";

  }*/
</script>

<link rel="stylesheet" href="../jquery-ui-1.9.2.custom/css/smoothness/jquery-ui-1.9.2.custom.css">

<SCRIPT src="../js/validacao.js"></script>

<html>


<form name="paciente" action="buscapaciente.php" OnSubmit="javascript:return validabusca();" method="post">
	<?php $tipo=1;?>
	<div style="font-family: roboto; font-weight: bold; align:center; margin-top: 2%;  margin-left: 32%;">
 			PACIENTE:
			<input type="text" id="buscap" name="busca"  size=60/>
		<br/>
	</div>	
</form>



<form name="receita" action="buscaremedio.php" OnSubmit="javascript:return validabusca();" method="post">

<!-- <input type="button" value="+1" onClick="javascript:novaLinha()"></input> -->
<input type="button" value="FDP" onClick="javascript:novaLine()"></input>


<!-- 
	<table id="tabela_remedio" style="color:#FFFFFF; margin-top: ">
	<th COLSPAN="4" style="text-align:center; font-family:Roboto-Thin; font-size:16px; width=150;">RECEITA M&Eacute;DICA</th>

         <tr>

             <td COLSPAN="2">
				<input type="text" id="buscar" size="65" />
			</td>

             <td id="tabela_linha_1"><input type="button" value="remover" ></td>

             </tr>

      </table>
 -->	
<table id="tabela_receita" style="align:center; color:#FFFFFF; margin-top: 45px;  width=300; height=100; "> 
		<tr  height=30>
			<th COLSPAN="4" style="text-align:center; font-family:Roboto-Thin; font-size:16px; width=150;">RECEITA M&Eacute;DICA</th>
		</tr>
		<tr>
			<td COLSPAN="2">Medicamento	</td>
			<td COLSPAN="2">Quantidade	</td>
		</tr>
		<tr>
			<td COLSPAN="2">
				<input type="text" id="buscar" size="65" />
			</td>
			
			<td COLSPAN="2">
				<input type="text" id="dosagem" size="25" />
			</td>
		</tr>
		
		<tr>
			<td COLSPAN="3"> Modo de Uso </td>
		</tr>
		<tr>
			<td COLSPAN="3">
				<input type="text" id="modo" size="95" />
			</td>
		</tr>
	</table>
      
      
 </form>



	
	
