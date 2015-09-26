<?php
session_start();
include ("../funcoes/cabecalho.php");
include ("../login/conexao.php");
$qry="select nome from pacientes where seq='".$seq."'";
$query = mysql_query($qry);
$nome = mysql_result($query,0,"nome");
?>
<SCRIPT src="../js/validacao.js"></script>
<body>
<form name="paciente" action="anamneseatualiza.php"  method="post">
			<div style="font-family: roboto; align:center; margin-top: 2%;  margin-left: 35%;">
 				Paciente: 
				<input type="text" id="busca" value="<?php echo ($nome); ?>" style="color:#123123;"size=50 readonly="readonly"/>
				<br/>
			</div>	
		<table   style="align:center; margin-top: 4%; color:#FFFFFF;" > 
		 	<tr><td>Data da Consulta
		 		<input type="text" id="data_consulta" name="data_consulta" onkeypress="return mascara_data(event,this);"  maxlength=10 size=11/>
		 	</td></tr>
			<tr><th COLSPAN=2 style="text-align:center; font-family:Roboto-Thin; font-size:16px;">Anamnese</th></tr>
				<tr>
					<td>Queixa Principal</td>
				</tr>
				<tr > 
					<td COLSPAN=2 ><textarea name="queixa" rows="3" cols="54"></textarea></td>
				</tr>			
				<tr>
					<td>Hist&oacute;ria da Mol&eacute;stia Atual </td>
				</tr>
				<tr > 
					<td COLSPAN=2 ><textarea name="molestia" rows="3" cols="54"></textarea></td>
				</tr>			
				<tr>
					<td>Antecedentes Pessoais</td>
				</tr>
				<tr > 
					<td COLSPAN=2 ><textarea name="ant_pessoal" rows="3" cols="54"></textarea></td>
				</tr>		
				<tr>
					<td>Antecedentes Familiares e Heredit&aacute;rios</td>
				</tr>
				<tr > 
					<td COLSPAN=2 ><textarea name="ant_familiar" rows="3" cols="54"></textarea></td>
				</tr>				<tr>
					<td> H&aacute;bitos Sociais </td>
				</tr>
				<tr > 
					<td COLSPAN=2 ><textarea name="habitos" rows="3" cols="54"></textarea></td>
				</tr>
				<tr>
				<td COLSPAN=2 >Medicamentos em Uso</td>
				</tr>	
				<tr >
					<td COLSPAN=2 ><textarea name="medicamentos" rows="3" cols="54"></textarea></td>
				</tr>
				
				<tr>
					<td>Observa&ccedil;&otilde;es</td>
				</tr>
				<tr >
					<td COLSPAN=2 ><textarea name="obs" rows="3" cols="54"></textarea></td>
				</tr>	
				
		</table>
		<br/>
		<div style=" padding-left: 600px;">
			<input type="submit" value="Salvar" style="width: 100px; text-align:center; border: solid thick #ffffff; border-radius: 1em;" />
			<input type="reset" value="Limpar" onClick="return confirm('Limpar todos os campos?')"style="width: 100px; text-align:center; border: solid thick #ffffff; border-radius: 1em;" />
		</div>
			<br/>
		<INPUT TYPE="hidden" NAME="op" VALUE="anamnese" />
		<INPUT TYPE="hidden" NAME="seq" VALUE="<?php echo $seq ?>" />
			
		<div style="align:left; margin-top: -56%; text-align: center; width: 10%; margin-left: 18%;">
			<div>
				<select name="data_consultada" id="data" style="min-width:90px">
					<option>---</option>
			<?php	$qry=("select data from anamneses where seq_paciente='$seq'");
					$query = mysql_query($qry);
					$total=mysql_numrows($query);
					for($i=0;$i<$total;$i++){
						$data = mysql_result($query,$i,"data");
						
						$data= implode('/', array_reverse(explode('-',$data))); ?>
						<option value="<?php echo $data ?>"><?php echo $data ?></option>
			<?php } ?>
				</select>
			</div>
			<div> 
				<button type="button" style="width: 67%;  text-align: center;  border: solid #ffffff; " onClick="parent.location.href='anamneseconsultas.php?seq=<?php echo $seq?>&data=<?php echo $data ?>'">Consultar
				</button>
			</div>
			
	</div>
	
</form>	

 
 
	<div style="align:left; margin-top: -1%; text-align: center; width: 10%;     margin-left: 3%;">
		<div> 
			<button type="button" style="width: 100%; height: 60px;  text-align: center; border: solid thick #ffffff;" onClick="parent.location.href='buscapaciente.php?seq=<?php echo $seq ?>'"> Dados Pessoais
			</button>
		</div>
		<br/>
		<div> 
			<button type="button" style="width: 100%; height: 60px; text-align: center; border: solid thick #ffffff;" onClick="parent.location.href='anamnese.php?seq=<?php echo $seq ?>'">Anamnese
			</button>
		</div>
		<br/>
		<div> 
			<button type="button" style="width: 100%; height: 60px; text-align: center; border: solid thick #ffffff;" onClick="parent.location.href='orl.php?seq=<?php echo $seq ?>'">Exames ORL
			</button>
		</div>
	</div>

	
	</body>
</html>

