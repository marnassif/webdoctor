<?php
include ("../funcoes/cabecalho.php");
include ("../login/conexao.php");
include ("../login/conexao.php");
$qry="select nome from pacientes where seq='".$seq."'";
$query = mysql_query($qry);
$nome = mysql_result($query,0,"nome");



$data= implode('-', array_reverse(explode('/',$data)));

$qry ="select * from orl where seq_paciente='".$seq."' and data='".$data."' ";
//echo ("$qry <br>");
$query = mysql_query($qry);


$orelha = mysql_result($query,0,"orelha");
$nariz = mysql_result($query,0,"nariz");
$boca = mysql_result($query,0,"boca");
$faringe = mysql_result($query,0,"faringe");
$laringe = mysql_result($query,0,"laringe");
$face = mysql_result($query,0,"face");
$cervical = mysql_result($query,0,"cervical");

$data= implode('/', array_reverse(explode('-',$data)));


?>
<body>
<form name="paciente" action="pacientesatualiza.php" OnSubmit="javascript:return validar();" method="post">
			<div style="font-family: roboto; align:center; margin-top: 2%;  margin-left: 35%;">
 				Paciente: 
				<input type="text" id="busca" value="<?php echo ($nome); ?>" style="color:#123123;"size=50 readonly="readonly"/>
				<br/>
			</div>	
		<table   style="align:center; margin-top: 4%; color:#FFFFFF;" > <!-- class="paciente" style="margin: 40px -96px 0px 500px; color:#FFFFFF;" -----border-right-width: 500px; -->
		
			<tr><td>Data da Consulta
		 		<input type="text" id="data" value="<?php echo ($data); ?>" name="data" maxlength=10 size=11/>
		 	</td></tr>
		<tr><th COLSPAN=2 style="text-align:center; font-family:Roboto-Thin; font-size:16px;">Exames Otorrinolaringol&oacute;gicos</th></tr>
				<tr>
					<td>Orelha</td>
				</tr>
				<tr >
					<td COLSPAN=2 ><textarea name="orelha" rows="3" cols="54"><?php echo ($orelha); ?></textarea></td>
				</tr>			
				<tr>
					<td>Nariz</td>
				</tr>
				<tr >
					<td COLSPAN=2 ><textarea name="nariz" rows="3" cols="54"><?php echo ($nariz); ?></textarea></td>
				</tr>			
				<tr>
					<td>Boca</td>
				</tr>
				<tr >
					<td COLSPAN=2 ><textarea name="boca" rows="3" cols="54"><?php echo ($boca); ?></textarea></td>
				</tr>		
				<tr>
					<td>Faringe</td>
				</tr>
				<tr >
					<td COLSPAN=2 ><textarea name="faringe" rows="3" cols="54"><?php echo ($faringe); ?></textarea></td>
				</tr>				<tr>
					<td>Laringe</td>
				</tr>
				<tr >
					<td COLSPAN=2 ><textarea name="laringe" rows="3" cols="54"><?php echo ($laringe); ?></textarea></td>
				</tr>
				<tr>
				<td COLSPAN=2 >Face</td>
				</tr>	
				<tr >
					<td COLSPAN=2 ><textarea name="face" rows="3" cols="54"><?php echo ($face); ?></textarea></td>
				</tr>			
				<tr>
				<td COLSPAN=2 >Cervical</td>
				</tr>	
				<tr >
					<td COLSPAN=2 ><textarea name="cervical" rows="3" cols="54"><?php echo ($cervical); ?></textarea></td>
				</tr>
		</table>
		<br/><br/>
		<div style="margin-top: -2%;  margin-left: 39%;">

			<input type="submit" value="Salvar" style="width: 100px; text-align:center; border: solid thick #ffffff; border-radius: 1em;" />
			<button type="button" style="width: 100px; text-align:center; border: solid thick #ffffff; border-radius: 1em;">Excluir</button>
			<input type="reset" value="Limpar" style="width: 100px; text-align:center; border: solid thick #ffffff; border-radius: 1em;" />
		</div>

		<INPUT TYPE="hidden" NAME="op" VALUE="anamnese" />
		
		<div style="align:left; margin-top: -54%; text-align: center; width: 10%;     margin-left: 18%;">
			<div>
				<select name="data" id="data" style="min-width:90px">
					<option>---</option>
			<?php	$qry=("select data from orl where seq_paciente='$seq'");
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
				<button type="button" style="width: 67%;  text-align: center;  border: solid #ffffff; " onClick="parent.location.href='orlconsultas.php?seq=<?php echo $seq?>&data=<?php echo $data ?>'">Consultar
				</button>
			</div>
			
	</div>
		</form>	

 
 <!-- 
 margin: 0; padding: 0px; border-bottom: 1px solid #CCC; text-align: left; list-style-type: none  
 -->
 		 	
	<div style="float: left; text-align: center; width: 10%; margin-top: -1%;  margin-left: 3%;">
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

