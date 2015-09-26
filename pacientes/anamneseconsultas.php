<?php
include ("../funcoes/cabecalho.php");
include ("../login/conexao.php");
$qry="select nome from pacientes where seq='".$seq."'";
$query = mysql_query($qry);
$nome = mysql_result($query,0,"nome");

$data= implode('-', array_reverse(explode('/',$data)));
$data_consulta= implode('-', array_reverse(explode('/',$data)));

$qry ="select * from anamneses where seq_paciente='".$seq."' and data='".$data."' ";
//echo ("$qry <br>");
$query = mysql_query($qry);


$queixa= mysql_result($query,0,"queixa");
$molestia = mysql_result($query,0,"molestia");
$ant_pessoal = mysql_result($query,0,"ant_pessoal");
$ant_familiar = mysql_result($query,0,"ant_familiar");
$habitos= mysql_result($query,0,"habitos");
$medicamentos= mysql_result($query,0,"medicamentos");
$obs = mysql_result($query,0,"obs");

$data_consulta= implode('/', array_reverse(explode('-',$data)));
$data= implode('/', array_reverse(explode('-',$data)));

?>
<SCRIPT src="../js/validacao.js"></script>
<body>
<form name="paciente" action="anamneseatualiza.php" OnSubmit="javascript:return validar();" method="post">
			<div style="font-family: roboto; align:center; margin-top: 2%;  margin-left: 35%;">
 				Paciente: 
				<input type="text" id="busca" value="<?php echo ($nome); ?>" style="color:#123123;"size=50 readonly="readonly"/>
				<br/>
			</div>	
		<table   style="align:center; margin-top: 4%; color:#FFFFFF;" > <!-- class="paciente" style="margin: 40px -96px 0px 500px; color:#FFFFFF;" -----border-right-width: 500px; -->
		
		 <!-- style="margin: 25px -96px 0px 500px; color:#FFFFFF; " -->
		 	<tr><td>Data da Consulta
		 		<input type="text" id="data_consulta" value="<?php echo ($data); ?>" name="data_consulta" onkeypress="return mascara_data(event,this);" readonly="readonly" maxlength=10 size=11/>
		 	</td></tr>
			<tr><th COLSPAN=2 style="text-align:center; font-family:Roboto-Thin; font-size:16px;">Anamnese</th></tr>
				<tr>
					<td>Queixa Principal</td>
				</tr>
				<tr > 
					<td COLSPAN=2 ><textarea  name="queixa" rows="3" cols="54"><?php echo ($queixa); ?></textarea></td>
				</tr>			
				<tr>
					<td>Hist&oacute;ria da Mol&eacute;stia Atual </td>
				</tr>
				<tr > 
					<td COLSPAN=2 ><textarea name="molestia" rows="3" cols="54"><?php echo ($molestia); ?></textarea></td>
				</tr>			
				<tr>
					<td>Antecedentes Pessoais</td>
				</tr>
				<tr > 
					<td COLSPAN=2 ><textarea name="ant_pessoal" rows="3" cols="54"><?php echo ($ant_pessoal); ?></textarea></td>
				</tr>		
				<tr>
					<td>Antecedentes Familiares e Heredit&aacute;rios</td>
				</tr>
				<tr > 
					<td COLSPAN=2 ><textarea  name="ant_familiar" rows="3" cols="54"><?php echo ($ant_familiar); ?></textarea></td>
				</tr>				<tr>
					<td> H&aacute;bitos Sociais </td>
				</tr>
				<tr > 
					<td COLSPAN=2 ><textarea  name="habitos" rows="3" cols="54"><?php echo ($habitos); ?></textarea></td>
				</tr>
				<tr>
				<td COLSPAN=2 >Medicamentos em Uso</td>
				</tr>	
				<tr >
					<td COLSPAN=2 ><textarea  name="medicamentos" rows="3" cols="54"><?php echo ($medicamentos); ?></textarea></td>
				</tr>
				
				<tr>
					<td>Observa&ccedil;&otilde;es</td>
				</tr>
				<tr >
					<td COLSPAN=2 ><textarea  name="obs" rows="3" cols="54"><?php echo ($obs); ?></textarea></td>
				</tr>	
				<!-- 
				<tr><th COLSPAN=2 style="text-align:center;">Exames Subsidi&aacute;rios</th></tr>		
				<tr>
					<td>Audiometria</td>
				</tr>
				<tr > 
					<td COLSPAN=2 ><textarea name="obs" rows="3" cols="54"></textarea></td>
				</tr>			
				<tr>
					<td>Exame Otoneurol&oacute;gico</td>
				</tr>
				<tr >
					<td COLSPAN=2 ><textarea name="obs" rows="3" cols="54"></textarea></td>
				</tr>		
				<tr>
					<td>Exames laboratoriais e Radiol&oacute;gicos</td>
				</tr>
				<tr > 
					<td COLSPAN=2 ><textarea name="obs" rows="3" cols="54"></textarea></td>
				</tr>				<tr>
					<td>Outros </td>
				</tr>
				<tr >
					<td COLSPAN=2 ><textarea name="obs" rows="3" cols="54"></textarea></td>
				</tr>		
				 -->	
		</table>
		<br/>
		<div style=" padding-left: 600px;">
			<input type="submit" value="Salvar" style="width: 100px; text-align:center; border: solid thick #ffffff; border-radius: 1em;" />
			<input type="reset" value="Limpar" onClick="return confirm('Limpar todos os campos?')"style="width: 100px; text-align:center; border: solid thick #ffffff; border-radius: 1em;" />
		</div>
			<br/>
		<INPUT TYPE="hidden" NAME="op" VALUE="anamnese" />
		
			
		<div style="align:left; margin-top: -56%; text-align: center; width: 10%;     margin-left: 18%;">
			<div>
				<select name="data_consultada" id="data_consultada" style="min-width:90px">
					<option>---</option>
					<?php
					$qry=("select data from anamneses where seq_paciente='$seq'");
					
					$query = mysql_query($qry);
					$total=mysql_numrows($query);
					for($i=0;$i<$total;$i++){
						$data = mysql_result($query,$i,"data");
						$data= implode('/', array_reverse(explode('-',$data)));
						?>
						<option selected="selected" ><?php echo $data ;?></option><?php 
					}
					?>
					
				</select>
			</div>
			<div> 
<!-- <button type="button" style="width: 67%;  text-align: center;  border: solid #ffffff; " onClick="parent.location.href='anamneseconsultas.php?seq=<?php echo $seq?>&data=document.getElementById('data_consultada').value);'">Consultar </button>  -->
			<button type="button" style="width: 67%;  text-align: center;  border: solid #ffffff; " onClick="parent.location.href='anamneseconsultas.php?seq=<?php echo $seq?>&data=document.getElementById(data_consultada).value';">Consultar 
			</button> 
			</div>
			<?php //echo ("fdp $data"); ?>
	</div>
	
</form>	

 
 <!-- 
 margin: 0; padding: 0px; border-bottom: 1px solid #CCC; text-align: left; list-style-type: none  
 -->
 
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

