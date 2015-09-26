
<?php
include ("../login/conexao.php");
//include ("../funcoes/cabecalho.php");


if($tipo=="dados"){
	$qry="select * from pacientes where nome='".$busca."' or seq='".$seq."' ";
	$query = mysql_query($qry);
	$seq = mysql_result($query,0,"seq");
	$nome = mysql_result($query,0,"nome");
	$nascimento = mysql_result($query,0,"nascimento");
	$convenio = mysql_result($query,0,"convenio");
	$sexo = mysql_result($query,0,"sexo");
	$estado_civil = mysql_result($query,0,"estado_civil");
	$profissao = mysql_result($query,0,"profissao");
	$cpf = mysql_result($query,0,"cpf");
	$email = mysql_result($query,0,"email");
	$rua = mysql_result($query,0,"rua");
	$complemento = mysql_result($query,0,"complemento");
	$bairro = mysql_result($query,0,"bairro");
	$cidade = mysql_result($query,0,"cidade");
	$telefone = mysql_result($query,0,"telefone");
	$celular = mysql_result($query,0,"celular");
	$estado = mysql_result($query,0,"estado");
	$cep = mysql_result($query,0,"cep");
	$nascimento= implode('/', array_reverse(explode('-',$nascimento)));
	
	?>
			<div  style="display:inline-block; vertical-align:top;">
				<table style="align:center; color:#FFFFFF;"> <!-- " -----style="align:center; margin-top: 5%; color:#FFFFFF;" -->
					<!-------->
					<tr><th COLSPAN="2" style="text-align:center; font-family:Roboto-Thin; font-size:16px;">Informa&ccedil;&otilde;es Gerais</th></tr>
					<tr>
						<td  > Nome </td>
					</tr>
					<tr>
						<td colspan="2" >  <!-- Nome -->
						<input type="text" name="nome" value="<?php echo $nome ?>" size=44  readonly="readonly"/>
					    </td>
					</tr>
					<tr>
						<td>Data Nascimento</td>
						<td>Sexo</td>
					</tr>
					<tr >
						<td> <!-- Data Nascimento -->
							<input type="text" name="nascimento" value="<?php echo $nascimento ?>" id="data"  readonly="readonly" /> 
						</td>
						<td><!-- Sexo -->
						<input type="text" name="sexo" id="sexo" value="<?php echo $sexo ?>" readonly="readonly" /> 
						</td>
					</tr>
					
					<!-------->
					<tr>
						<td>Estado Civil</td>
						<td>Profiss&atilde;o</td>
		
					</tr>
					<tr> <!-- estado civil e profissao -->
					
						<td>
						<input type="text" name="estado_civil" id="estado_civil" value="<?php echo $estado_civil ?>"readonly="readonly" /> 
						</td>
						<td><input type="text" name="profissao" value="<?php echo $profissao?>" readonly="readonly"/></td>
						
					</tr>
					<!-------->
					<tr>
						<td>CPF</td>
						<td>Convenio </td>
					</tr>
					<tr> <!-- convenio sexo -->
						<td ><input type="text" name="cpf" maxlength=14 value="<?php echo $cpf ?> "readonly="readonly"/></td>
						<td><input type="text" name="convenio" value="<?php echo $convenio?>"readonly="readonly"/></td>		
					</tr>	
	
				</table>	
			</div>
				<!-- coluna direita!-->
			<div style="display:inline-block; vertical-align:top;">
				
				<table style="color:#FFFFFF; align:center;">
					<tr><th COLSPAN=2 style="align:center; text-align:center; font-family:Roboto-Thin; font-size:16px;">Endere&ccedil;o</th></tr>
					
					<!--ENDEREÇO-->
					<tr>
						<td>Rua</td>
						<td>Complemento</td>
					</tr>			
					<tr> <!-- rua complemento bairro-->
						<td><input type="text" name="rua" value="<?php echo $rua?>" readonly="readonly"/></td>
						<td><input type="text" name="complemento" value="<?php echo $complemento?>" readonly="readonly"/></td>
					</tr>
					<tr>
						<td>Cidade</td>
						<td >Bairro</td>
					</tr>			
					<tr> <!-- rua complemento bairro-->
						<td><input type="text" name="cidade" value="<?php echo $cidade?>" readonly="readonly"/></td>
						<td><input type="text" name="bairro" value="<?php echo $bairro?>" readonly="readonly"/></td>
					</tr>
								
					<tr>
						<td>Estado</td>
						<td>CEP</td>
						
					</tr>			
					<tr> <!--  -->
						<td>
						<input type="text" name="estado" value="<?php echo $estado ?>" readonly="readonly"/>
						</td>
						<td><input type="text" name="cep" value="<?php echo $cep ?>" readonly="readonly"/></td>
					</tr>
					<!-- CONTATO -->
					
					<tr><th COLSPAN=2 style="text-align:center;">Contato</th></tr>
					<tr>
						<td>Telefone</td>
						<td>Celular</td>
					</tr>						
					<tr> 
						<td><input type="text" name="telefone" value="<?php echo $telefone ?>" readonly="readonly" maxlength=13/></td>
						<td><input type="text" name="celular"  value="<?php echo $celular ?>" readonly="readonly" maxlength=13/></td>
					</tr>			
					
					<tr>
						<td>E-mail</td>
					</tr>						
					<tr> 
						<td colspan="2"><input type="text" name="email" id="email" value="<?php echo $email ?>" readonly="readonly" size=46/></td>
					</tr>			
				</table>
			</div>
			
			<div style=" margin-left: 20%; margin-top: 3%;">
				<input type="submit" value="Editar" onClick="return confirm('Editar paciente?')" style="width: 100px; text-align:center; border: solid thick #ffffff; border-radius: 1em;" />			
				
				<input type="hidden" name="seq" value="<?php echo $seq ?>" readonly="readonly"/>
				<INPUT TYPE="hidden" NAME="op" VALUE="cadastro" />
			
				<button type="button" style="width: 100px;	  text-align: center; border: solid thick #ffffff; border-radius: 1em;" onClick="exconfirma(<?php echo $seq ?>)" > Excluir 
				</button>
			</div>
			<?php 
	
}
else if($tipo=="anamnese"){
	if($data){
	
		$qry ="select * from anamneses where seq_paciente='".$seq."' and data='".$data."' ";
		//echo $qry;
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
	}
	else 
	{
		$data=date("d/m/Y");
	}
?>
<form name="salvar" action="anamneseatualiza.php"  method="post">
	<div style="align:center; margin-top: 1%;  margin-left: -20%;" >
			<div>
				<select name="data" id="data" style="width: 10%; text-align: center; ">
					<option  style="text-align: center;">__/__/____</option>
					
			<?php	$qry="select a.data, b.nome from anamneses a right join pacientes b on a.seq_paciente=b.seq where b.seq='$seq'";
					
					$query = mysql_query($qry);
					$total=mysql_numrows($query);
					$nome = mysql_result($query,0,"nome");
					for($i=0;$i<$total;$i++){
						$databd = mysql_result($query,$i,"data");
						$datalegal= implode('/', array_reverse(explode('-',$databd))); ?>
						<option  style="text-align: center;" value="<?php echo $databd ?>"><?php echo $datalegal ?></option>
			<?php } ?>
				</select>
				
			</div>
			<div > 
				<button type="button" style="width: 10%;  text-align: center;  border: solid #ffffff; " onClick="carrega_info('anamnese','<?php echo $seq;?>', document.getElementById('data').value)">Consultar
				</button>
			</div>
			
	</div>
	
	
		<table   style="align:center;  margin-left: 10%; margin-top: -3%; color:#FFFFFF;" > <!-- class="paciente" style="margin: 40px -96px 0px 500px; color:#FFFFFF;" -----border-right-width: 500px; -->
		
		 <!-- style="margin: 25px -96px 0px 500px; color:#FFFFFF; " -->
		 	<tr><td>Data da Consulta
		 	
		 		<input  readonly="readonly" type="text" id="data_consulta" value="<?php echo ($data); ?>" name="data_consulta" onkeypress="return mascara_data(event,this);" readonly="readonly" maxlength=10 size=11/>
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
			
		</table>
		<input type="hidden" name="seq" value="<?php echo $seq ?>" readonly="readonly"/>
		<INPUT TYPE="hidden" NAME="op" VALUE="anamnese" />
		<div style=" margin-left: 20%; margin-top: 3%;">
			<input type="submit" value="Salvar" style="width: 100px; text-align:center; border: solid thick #ffffff; border-radius: 1em;" />
			<input type="reset" value="Limpar" onClick="return confirm('Limpar todos os campos?')"style="width: 100px; text-align:center; border: solid thick #ffffff; border-radius: 1em;" />
		</div>
</form>
	<?php 
}
else if($tipo=="orl"){

	if($data){
	
		$qry ="select * from orl where seq_paciente='".$seq."' and data='".$data."' ";
		//echo $qry;
		$query = mysql_query($qry);
		$orelha = mysql_result($query,0,"orelha");
		$nariz = mysql_result($query,0,"nariz");
		$boca = mysql_result($query,0,"boca");
		$faringe = mysql_result($query,0,"faringe");
		$laringe = mysql_result($query,0,"laringe");
		$face = mysql_result($query,0,"face");
		$cervical = mysql_result($query,0,"cervical");
		
		$data_consulta= implode('/', array_reverse(explode('-',$data)));
		$data= implode('/', array_reverse(explode('-',$data)));	
	}
	else
	{
		$data=date("d/m/Y");
	}
?>
<form name="salvar" action="pacientesatualiza.php"  method="post">
	<div style="align:center; margin-top: 1%;  margin-left: -20%;" >
		<div>
			<select name="data" id="data" style="width: 10%; text-align: center;">
				<option  style="text-align: center;">__/__/____</option>
				
		<?php	$qry="select a.data, b.nome from orl a right join pacientes b on a.seq_paciente=b.seq where b.seq='$seq'";
				
				$query = mysql_query($qry);
				$total=mysql_numrows($query);
				$nome = mysql_result($query,0,"nome");
				for($i=0;$i<$total;$i++){
					$databd = mysql_result($query,$i,"data");
					$datalegal= implode('/', array_reverse(explode('-',$databd))); ?>
					<option  style="text-align: center;" value="<?php echo $databd ?>"><?php echo $datalegal ?></option>
		<?php } ?>
			</select>
			
		</div>
		<div > 
			<button type="button" style="width: 10%;  text-align: center;  border: solid #ffffff; " onClick="carrega_info('orl','<?php echo $seq;?>', document.getElementById('data').value)">Consultar
			</button>
		</div>
			
	</div>

	<table   style="align:center;  margin-left: 10%; margin-top: -3%; color:#FFFFFF;" > <!-- class="paciente" style="margin: 40px -96px 0px 500px; color:#FFFFFF;" -----border-right-width: 500px; -->
	
		<tr><td>Data da Consulta
		 		<input type="text" id="data_consulta" value="<?php echo ($data); ?>" name="data_consulta" onkeypress="return mascara_data(event,this);" readonly="readonly" maxlength=10 size=11/>
	 	</td></tr>
		
		
		<tr>
			<th COLSPAN=2 style="text-align:center; font-family:Roboto-Thin; font-size:16px;">Exames Otorrinolaringol&oacute;gicos</th></tr>
		<tr>
			<td>Orelha</td>
		</tr>
		<tr >
			<td COLSPAN=2 ><textarea name="orelha" rows="3" cols="54"> <?php echo ($orelha); ?></textarea></td>
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
	<input type="hidden" name="seq" value="<?php echo $seq ?>" readonly="readonly"/>
		<INPUT TYPE="hidden" NAME="op" VALUE="orl" />
		<div style=" margin-left: 20%; margin-top: 3%;">
			<input type="submit" value="Salvar" style="width: 100px; text-align:center; border: solid thick #ffffff; border-radius: 1em;" />
			<input type="reset" value="Limpar" onClick="return confirm('Limpar todos os campos?')"style="width: 100px; text-align:center; border: solid thick #ffffff; border-radius: 1em;" />
		</div>
</form>
	<?php 	
}
?>
