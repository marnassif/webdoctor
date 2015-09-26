<SCRIPT>
function exconfirma(seq){
	if(confirm('Excluir paciente?')){
	parent.location.href="pacienteexclui.php?seq="+seq;
	}
	else
		return false;
}
</script>
<?php
include ("../login/conexao.php");
include ("../funcoes/cabecalho.php");

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
<link rel="stylesheet" href="../jquery-ui-1.9.2.custom/css/smoothness/jquery-ui-1.9.2.custom.css">
<SCRIPT src="../js/validacao.js"></script>

<SCRIPT type="text/javascript">
	jQuery(document).ready(function($){
		$('#busca').autocomplete({source:'busca.php', minLength:2, 
			messages: {noResults: '',
	        results: function() {}}
		});  });
	
	
	function validabusca(){
		if (document.consulta.busca.value == ""){
			alert("Inserir um nome para buscar!");
			document.consulta.busca.focus();
			return false;
		}

		document.consulta.submit();
		return true;
	}




function carrega_info(tipo, seq, data="")
{
    req1 = null;
    // Procura por um objeto nativo (Mozilla/Safari)
    if (window.XMLHttpRequest) {
        req1 = new XMLHttpRequest();
        req1.onreadystatechange = processReqChange1;
        req1.open("GET", 'dadosajax.php?tipo='+tipo+'&seq='+seq+'&data='+data, true);
        req1.send(null);
    // Procura por uma versao ActiveX (IE)
    } else if (window.ActiveXObject) {
        req1 = new ActiveXObject("Microsoft.XMLHTTP");
        if (req1) {
            req1.onreadystatechange = processReqChange1;
            req1.open("GET", 'dadosajax.php?tipo='+tipo+'&seq='+seq+'&data='+data, true);
            req1.send();
        }
    }
}
function processReqChange1()
{
    // apenas quando o estado for "completado"
    if (req1.readyState == 4) {
        // apenas se o servidor retornar "OK"
         if (req1.status == 200) {
            // procura pela div id="ausente" e insere o conteudo
            // retornado nela, como texto HTML
            document.getElementById('divcentral').innerHTML = req1.responseText;
        } else {
            alert("Houve um problema ao obter os dados:\n" + req1.statusText);
        }
    }
}


		
 </script>
 
<body>
<form name="consulta" action="buscapaciente.php" method="post">
		<div style="font-family: roboto; align:center; margin-top: 2%;  margin-left: 30%;">
		
 				Paciente: 
				<input type="text" id="busca" value="<?php echo ($nome); ?>" style="color:#123123;"size=50 readonly="readonly"/>
				<br/>
		</div>	
</form>


<div style="float: left; text-align: center; width: 10%;  margin-top: 8%;">  
<!-- style="float: left; text-align: center; width: 10%; margin-top: -25%;  margin-left: 3%;" -->
	<input type="hidden" name="seq" value="<?php echo $seq ?>" readonly="readonly"/>
		<div>
			<button type="button" style="width: 100%; height: 60px;  text-align: center; border: solid thick #ffffff;" onClick="carrega_info('dados','<?php echo $seq;?>')"> Dados Pessoais
			</button>
		</div>
		<br />
		<div> 
			<button type="button" style="width: 100%; height: 60px; text-align: center; border: solid thick #ffffff;" onClick="carrega_info('anamnese','<?php echo $seq;?>')">Anamnese
			</button>
		</div>
		<br />
		<div> 
			<button type="button" style="width: 100%; height: 60px; text-align: center; border: solid thick #ffffff;" onClick="carrega_info('orl','<?php echo $seq;?>')">Exames ORL
			</button>
		</div>
	</div>

	<form name="paciente" action="pacienteedita.php" method="post">
			

		<div id='divcentral' style="margin-top: 53px; margin-left: 400px;" >
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
						<td>Conv&ecirc;nio </td>
					</tr>
					<tr> <!-- convenio sexo -->
						<td ><input type="text" name="cpf" maxlength=14 value="<?php echo $cpf ?> "readonly="readonly"/></td>
						<td><input type="text" name="convenio" value="<?php echo $convenio?>"readonly="readonly"/></td>		
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
		</div>

		
		<br/><br/>


	</form>
 
 <!-- 
 margin: 0; padding: 0px; border-bottom: 1px solid #CCC; text-align: left; list-style-type: none  
 <input href='anamnese.php' style="width: 100%; height: 60px;  text-align: center; border: solid thick #ffffff;" type="button" value="Dados Pessoais"/>
 
 -->
	

	</body>
</html>