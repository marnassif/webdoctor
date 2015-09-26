function mascara_data(e,dt)
{
	var tecla = e.keyCode ? e.keyCode : e.which ? e.which : e.charCode;	
	if (tecla >= 48 && tecla <= 57)
	{
		if (dt.value.length == 2){
		dt.value += '/';
		}
		if (dt.value.length == 5){
		dt.value += '/';
		}
	}
	else{
		if (tecla == 8 || tecla == 9 || tecla == 46)
			return true;
		else
			return false;
	}
}

function ValidarDataAgenda(caixa){
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
				}
				else { //2
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
						}
						else { //4
							if (ano < vano)
							{
								alert("Data incorreta!! Ano informado anterior ao ano atual");
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