<?
include ("../funcoes/cabecalho.php");
?>
<link rel="stylesheet" href="../jquery-ui-1.9.2.custom/css/smoothness/jquery-ui-1.9.2.custom.css">


<SCRIPT type="text/javascript">

jQuery(document).ready(function($){
		$('#busca').autocomplete({source:'busca.php', minLength:2, 
			messages: {noResults: '',
	        results: function() {}}
		});  });


function validar() {

	if (document.paciente.nome.value == ""){
		alert("Preencher o nome!")
		document.paciente.nome.focus();
		return false;
	}
	if (document.paciente.data.value == ""){
		alert("Preencher a data de nascimento!")
		document.paciente.data.focus();
		return false;
	}
	if (document.paciente.sexo.value == ""){
		alert("Selecionar o sexo!")
		document.paciente.sexo.focus();
		return false;
	}
	if (document.paciente.estado_civil.value == ""){
		alert("Preencher o estado civil!")
		document.paciente.estado_civil.focus();
		return false;
	}
	if (document.paciente.profissao.value == ""){
		alert("Preencher a profissao!")
		document.paciente.profissao.focus();
		return false;
	}
	if (document.paciente.cpf.value == ""){
		alert("Preencher o cpf!")
		document.paciente.cpf.focus();
		return false;
	}
	if (document.paciente.convenio.value == ""){
		alert("Preencher o convênio!")
		document.paciente.convenio.focus();
		return false;
	}
	if (document.paciente.rua.value == ""){
		alert("Preencher a rua!")
		document.paciente.rua.focus();
		return false;
	}
	if (document.paciente.cidade.value == ""){
		alert("Preencher a cidade!")
		document.paciente.cidade.focus();
		return false;
	}
	if (document.paciente.bairro.value == ""){
		alert("Preencher o bairro!")
		document.paciente.bairro.focus();
		return false;
	}
	
	if (document.paciente.estado.value == ""){
		alert("Escolher o estado!")
		document.paciente.estado.focus();
		return false;
	}
	
	if (document.paciente.celular.value == "(xx)xxxx-xxxx"){
		if (document.paciente.telefone.value == "(xx)xxxx-xxxx" || document.paciente.telefone.value == ""){
		alert("Inserir ao menos um telefone!")}
		document.paciente.telefone.focus();
		return false;}
	
	if (document.paciente.celular.value == ""){
		if (document.paciente.telefone.value == "" || document.paciente.telefone.value == "(xx)xxxx-xxxx"){
		alert("Inserir ao menos um telefone!")}
		document.paciente.telefone.focus();
		return false;}

	if (document.paciente.email.value == ""){
		alert("Preencher o email!")
		document.paciente.email.focus();
		return false;
	}

	document.paciente.submit();
	return true;
}

  </script>

<SCRIPT src="../js/validacao.js"></script>

<body>
<form name="consulta" action="buscapaciente.php" OnSubmit="javascript:return validabusca();" method="post">
		<div style="font-family: roboto; align:center; margin-top: 2%;  margin-left: 30%;">
		
 				Paciente: Nome/CPF
				<input type="text" id="busca" name="busca"  size=50/>
				<input type="submit" value="buscar" onClick="return confirm('Descartaras alteracoes?')" style="text-align: center; border: solid thick #ffffff; border-radius: 1em; " />
				<br/>
		</div>	
</form>

<form name="paciente" action="pacientesatualiza.php" OnSubmit="javascript:return validar();" method="post">
			

		<div style="margin-top: 53px; margin-left: 400px;" >
			<div style="display:inline-block; vertical-align:top;">
				<table style="align:center; color:#FFFFFF;"> <!-- " -----style="align:center; margin-top: 5%; color:#FFFFFF;" -->
					<!-------->
					<tr><th COLSPAN="2" style="text-align:center; font-family:Roboto-Thin; font-size:16px;">Informa&ccedil;&otilde;es Gerais</th></tr>
					<tr>
						<td  > Nome </td>
					</tr>
					<tr>
						<td colspan="2" >  <!-- Nome -->
						<input type="text" name="nome"  value="<?php echo $nome ?>" id="nome" size=44/>
					    </td>
					</tr>
					<tr>
						<td>Data Nascimento</td>
						<td>Sexo</td>
					</tr>
					<tr >
						<td> <!-- Data Nascimento -->
							<input type="text" name="nascimento" id="data" value="<?php echo $nascimento ?>" maxlength=10 onkeypress="return mascara_data(event,this);" onblur="return ValidarData(this);"  /> 
						</td>
						<td><!-- Sexo -->
						<select name="sexo" size="1" id="sexo" style="min-width:142px">
						<option> <?php echo $sexo ?></option>
							  <option value="Masculino">Masculino</option>
							  <option value="Feminino">Feminino</option>
						</select>
						</td>
					</tr>
					
					<!-------->
					<tr>
						<td>Estado Civil</td>
						<td>Profiss&atilde;o</td>
		
					</tr>
					<tr> <!-- estado civil e profissao -->
					
						<td>
							<select name="estado_civil" size="1" id="estado_civil" style="min-width:142px" >
								<option><?php echo $estado_civil ?></option>
								<option value="Solteiro">Solteiro</option>
								<option value="Casado">Casado</option>
								<option value="Divorciado">Divorciado</option>
								<option value="Viuvo">Viuvo</option>
								<option value="Outros">Outros</option>
							</select>
						</td>
						<td><input type="text" name="profissao" value="<?php echo $profissao?>"/></td>
						
					</tr>
					<!-------->
					<tr>
						<td>CPF</td>
						<td>Convenio </td>
					</tr>
					<tr> <!-- cpf convenio -->
						<td ><input type="text" name="cpf" value="<?php echo $cpf ?>" onChange="validarCPF(cpf)" onkeypress="return mascara_cpf(event,this);" maxlength=14/></td>
						<td><input type="text" name="convenio" value="<?php echo $convenio?>"/></td>		
					</tr>	
	
				</table>	
			</div>
				
			<div style="display:inline-block; vertical-align:top;">
			
			
				<!-- coluna direita!-->
				
				<table style="color:#FFFFFF; align:center;">
					<tr><th COLSPAN=2 style="align:center; text-align:center; font-family:Roboto-Thin; font-size:16px;">Endere&ccedil;o</th></tr>
					
					<!--ENDEREÇO-->
					<tr>
						<td>Rua</td>
						<td>Complemento</td>
					</tr>			
					<tr> <!-- rua complemento bairro-->
						<td><input type="text" name="rua" value="<?php echo $rua?>"/></td>
						<td><input type="text" name="complemento" value="<?php echo $complemento?>" /></td>
					</tr>
					<tr>
						<td>Cidade</td>
						<td >Bairro</td>
					</tr>			
					<tr> <!-- rua complemento bairro-->
						<td><input type="text" name="cidade" value="<?php echo $cidade?>"/></td>
						<td><input type="text" name="bairro" value="<?php echo $bairro?>"/></td>
					</tr>
								
					<tr>
						<td>Estado</td>
						<td>CEP</td>
						
					</tr>			
					<tr> <!--  -->
						<td>
							<select name="estado">
								<option><?php echo $estado ?></option>
								<option value="ac">Acre</option>
								<option value="al">Alagoas</option>
								<option value="ap">Amap&aacute;</option>
								<option value="am">Amazonas</option>
								<option value="ba">Bahia</option>
								<option value="ce">Cear&aacute;</option>
								<option value="df">Distrito Federal</option>
								<option value="es">Espirito Santo</option>
								<option value="go">Goi&aacute;s</option>
								<option value="ma">Maranh&atilde;o</option>
								<option value="ms">Mato Grosso do Sul</option>
								<option value="mt">Mato Grosso</option>
								<option value="mg">Minas Gerais</option>
								<option value="pa">Par&aacute;</option>
								<option value="pb">Para&iacute;ba</option>
								<option value="pr">Paran&aacute;</option>
								<option value="pe">Pernambuco</option>
								<option value="pi">Piau&iacute;</option>
								<option value="rj">Rio de Janeiro</option>
								<option value="rn">Rio Grande do Norte</option>
								<option value="rs">Rio Grande do Sul</option>
								<option value="ro">Rond&ocirc;nia</option>
								<option value="rr">Roraima</option>
								<option value="sc">Santa Catarina</option>
								<option value="sp">S&atilde;o Paulo</option>
								<option value="se">Sergipe</option>
								<option value="to">Tocantins</option>
							</select>
						</td>
						<td><input type="text" name="cep" value="<?php echo $cep ?>"  maxlength=9 onkeypress="return mascara_cep(event,this);"/></td>
					</tr>
					<!-- CONTATO -->
					
					<tr><th COLSPAN=2 style="text-align:center;">Contato</th></tr>
					<tr>
						<td>Telefone</td>
						<td>Celular</td>
					</tr>						
					<tr> 
						<td><input type="text" name="telefone" value="<?php echo $telefone ?>" onclick="value=''" onkeypress="return mascara_tel(event,this);" onChange="validarTelefone(this);" maxlength=13/></td>
						<td><input type="text" name="celular"  value="<?php echo $celular ?>" onclick="value=''" onkeypress="return mascara_tel(event,this);" onChange="validarTelefone(this);"  maxlength=13/></td>
					</tr>			
					
					<tr>
						<td>E-mail</td>
					</tr>						
					<tr> 
						<td colspan="2"><input type="text" name="email" id="email" value="<?php echo $email ?>" onChange="validarEmail(email)" size=46/></td>
					</tr>			
				</table>
			</div>
		</div>

		
		<br/><br/>
		<div style="padding-left: 650px; padding-top: 35px;">
			<input type="submit" value="Atualizar" style="width: 100px; text-align:center; border: solid thick #ffffff; border-radius: 1em;" />
		</div>
		
		<input type="hidden" name="seq" value="<?php echo $seq ?>" readonly="readonly"/>
		<INPUT TYPE="hidden" NAME="op" VALUE="atualizar" />
		</form>	
		
 
 <!-- 
 margin: 0; padding: 0px; border-bottom: 1px solid #CCC; text-align: left; list-style-type: none  
 <input href='anamnese.php' style="width: 100%; height: 60px;  text-align: center; border: solid thick #ffffff;" type="button" value="Dados Pessoais"/>
 
 -->

	<div style="float: left; text-align: center; width: 10%; margin-top: -25%;  margin-left: 3%;">
	<input type="hidden" name="seq" value="<?php echo $seq ?>" readonly="readonly"/>
		<div>
			<button type="button" style="width: 100%; height: 60px;  text-align: center; border: solid thick #ffffff;" onClick="parent.location.href='paciente.php'"> Dados Pessoais
			</button>
		</div>
		<br />
		<div> 
			<button type="button" style="width: 100%; height: 60px; text-align: center; border: solid thick #ffffff;" onClick="parent.location.href='anamnese.php'">Anamnese
			</button>
		</div>
		<br />
		<div> 
			<button type="button" style="width: 100%; height: 60px; text-align: center; border: solid thick #ffffff;" onClick="parent.location.href='orl.php'">Exames ORL
			</button>
		</div>
	</div>

	
	</body>
</html>

