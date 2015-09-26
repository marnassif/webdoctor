

function validarCPF(dados){
    var cpf = dados.value;
    var filtro = /^\d{3}.\d{3}.\d{3}-\d{2}$/i;
    if(!filtro.test(cpf)){
    	alert("CPF invalido. Tente novamente.");
    	document.paciente.cpf.focus();
    	return false;
    }

    cpf = remove(cpf, ".");
    cpf = remove(cpf, "-");
	if(cpf.length <11){
		var tamanho = cpf.length;
		var falta = 11 - tamanho;
		do{
		cpf = "0" + cpf;
		falta = falta -1;
		}while(falta>0)
	}
    if(cpf.length != 11 || cpf == "00000000000" || cpf == "11111111111" ||
    cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" ||
    cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" ||
    cpf == "88888888888" || cpf == "99999999999")
    {
    	alert("CPF invalido. Tente novamente.");
    	document.paciente.cpf.focus();
    	return false;
    }
	soma = 0;
	for(i = 0; i < 9; i++)
       	soma += parseInt(cpf.charAt(i)) * (10 - i);
	resto = 11 - (soma % 11);
   	if(resto == 10 || resto == 11)
    	resto = 0;
   	if(resto != parseInt(cpf.charAt(9))){
    	alert("CPF invalido. Tente novamente.");
    	document.paciente.cpf.focus();
    	return false;
   	}
	soma = 0;
	for(i = 0; i < 10; i ++)
    	soma += parseInt(cpf.charAt(i)) * (11 - i);
   	resto = 11 - (soma % 11);
   	if(resto == 10 || resto == 11)
    	resto = 0;
   	if(resto != parseInt(cpf.charAt(10))){
    	alert("CPF invalido. Tente novamente.");
    	document.paciente.cpf.focus();
    	return false;
   	}
   	return true;
}


function remove(str, sub) {
   i = str.indexOf(sub);
   r = "";
   if (i == -1) return str;
   r += str.substring(0,i) + remove(str.substring(i + sub.length), sub);
   return r;
}



function ValidarData(caixa)
{
data = Limpa(caixa.value);
var vdt = new Date();
var vano = vdt.getFullYear();
if (data!='')
{
	var dia = data.substring(0,2);
	var mes = data.substring(2,4);
	var ano = data.substring(4,8);
	if (dia < 1 || mes < 1 || ano < 1000 || mes > 12)
	{
		alert("Data incorreta!!");
		caixa.value = '';
		return false;
	} else {
	
		if ((mes==04 && dia > 30) || (mes==06 && dia > 30) || (mes==09 && dia > 30) || (mes==11 && dia > 30))
		{
			alert("Dia incorreto !!! O mes especificado contem no maximo 30 dias.");
			caixa.value = '';
			return false;
		}else { //1
			if ((mes==01 && dia > 31) || (mes==03 && dia > 31) || (mes==05 && dia > 31) || (mes==07 && dia > 31) || (mes==08 && dia > 31) || (mes==10 && dia > 31) || (mes==12 && dia > 31))
			{
				alert("Dia incorreto !!! O mes especificado contém no maximo 30 dias.");
				caixa.value = '';
				return false;
			}else { //2
				if(ano%4!=0 && mes==2 && dia>28)
				{
					alert("Data incorreta!! O mes especificado contem no máximo 28 dias.");
					caixa.value = '';
					return false;
				}else { //3
					if(ano%4==0 && mes==2 && dia>29)
					{			
						alert("Data incorreta!! O mes especificado contém no maximo 29 dias.");
						caixa.value = '';
						return false;
					}else { //4
						if (ano > vano)
						{
							alert("Data incorreta!! Ano informado maior que ano atual");
							caixa.value = '';
							return false;
						}else
							return true;
						}//4
					} //3
				} //2
			} //1
		}

} 
}
function Limpa(c)
{
	qtd = c.length;
	var v = '';
	for (i=0; i < qtd; i++)
		for(t=0; t < 10; t++){
			if(c.substring(i,i+1) == t && c.substring(i,i+1) != " ")
			v += c.substring(i,i+1);
		}
	return(v);
}


function mascara_data(e,dtnasc)
{
	var tecla = e.keyCode ? e.keyCode : e.which ? e.which : e.charCode;	

	if (tecla >= 48 && tecla <= 57)
	{
		if (dtnasc.value.length == 2){
		dtnasc.value += '/';
		}
		if (dtnasc.value.length == 5){
		dtnasc.value += '/';
		}
	}
	else{
		if (tecla == 8 || tecla == 9 || tecla == 46)
			return true;
	
		else
			return false;
	}

}
function mascara_cpf(e,cpf)
{
	var tecla = e.keyCode ? e.keyCode : e.which ? e.which : e.charCode;	

	if (tecla >= 48 && tecla <= 57)
	{
		if (cpf.value.length == 3){
		cpf.value += '.';
		}
		if (cpf.value.length == 7){
			cpf.value += '.';
			}
		if (cpf.value.length == 11){
		cpf.value += '-';
		}
	}
	else{
		if (tecla == 8 || tecla == 9 || tecla == 46)
			return true;
	
		else
			return false;
	}

}

function mascara_tel(e,tel)
{
	var tecla = e.keyCode ? e.keyCode : e.which ? e.which : e.charCode;	

	if (tecla >= 48 && tecla <= 57)
	{
		if (tel.value.length == 0){
		tel.value += '(';
		}
		if (tel.value.length == 3){
		tel.value += ')';
		}
		if (tel.value.length == 8){
			tel.value += '-';
			}
	}
	else{
		if (tecla == 8 || tecla == 9 || tecla == 46)
			return true;
	
		else
			return false;
	}

}

function mascara_cep(e,cep)
{
	var tecla = e.keyCode ? e.keyCode : e.which ? e.which : e.charCode;	

	if (tecla >= 48 && tecla <= 57)
	{
		if (cep.value.length == 5){
		cep.value += '-';
		}
	}
	else{
		if (tecla == 8 || tecla == 9 || tecla == 46)
			return true;
	
		else
			return false;
	}

}



function validarEmail(str){
var email=str.value;
var parte1 = email.indexOf("@");
var parte2 = email.indexOf(".");
var parte3 = email.length;
if(!(parte1 >= 3 && parte2 >= 6 && parte3 >= 9)) {
	alert("E-mail invalido!");
	document.paciente.email.focus();
    return false;
	}
}

function validarTelefone(tel){
if(tel.value.length!=13){
	alert("Telefone invalido!");
	document.paciente.telefone.focus();
	return false;
}
else 
	return true;
}