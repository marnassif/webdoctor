<?php
/* numero destino -  2 digitos codigo pais ( Brasil = 55 ) + 2 digitos codigo de area + numero do celular
 O Nro de Destino deve ser informado com 8 ou 9 dнgitos se for um nъmero local.
Se for um numero de outra cidade, vocк deve inserir os 2 digitos do cуdigo de бrea na frente.
Ex.: (11)99192-3082.
Parкnteses, hнfen e espaзos serгo automaticamente suprimidos.
Nгo й necessбrio colocar zero na frente.
Quando for informado apenas 8 ou 9 dнgitos ( Ex. : 9191-9090 ) serб considerado o cуdigo de бrea padrгo que foi informado nos Parвmetros de SMS.
*/

// Constantes - Valores obtidos no menu Ferramentas -> Gateway do Mister Postman
$UserID = '7b454be3-635e-4acc-8c6c-3e99241b6179';
$Token = '17705486';

$enviar_para = "19996726423";
$enviar_para_concat ='55'.$enviar_para;
//echo $enviar_para_concat;

$destino = $enviar_para;
echo $enviar_para;
?><br /><?php
// mensagem a ser enviada
$mensagem = "teste sms TTC";

//echo $mensagem;
// Codifica a mensagem - URLEncode
$mensagem = urlencode($mensagem);
//echo $mensagem;


//DESCOMENTAR O GATEWAY ABAIXO PARA MSM FUNCIONAR
//$URLGateway = 'http://www.misterpostman.com.br/gateway.aspx?UserID='.$UserID.'&Token='.$Token.'&NroDestino='.$destino.'&Mensagem='.$mensagem.'';
echo "execucao comentada";
// Aciona o Gateway  - Opзгo ideal para PHP 4.3.x ou superior
$Content = file_get_contents($URLGateway);

// Coloca no video a resposta do gateway
echo $Content;

