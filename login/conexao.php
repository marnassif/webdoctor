<?php 
//Realizando a conexao com o banco de dados
$dbname='WebDoctor'; 

$usuario='root'; 

$password=''; 

//if(!($id = mysql_connect('192.168.56.101',$usuario,$password)))
if(!($id = mysql_connect('10.0.2.15',$usuario,$password)))
{
   echo "N‹o foi poss’vel estabelecer uma conex‹o com o gerenciador MySQL. 
   		Favor Contactar o Administrador.";
   exit;
} 

if(!($con=mysql_select_db($dbname,$id))) { 
   echo "Nao foi poss’vel selecionar o banco MySQL. 
   		 Favor Contactar o Administrador.";
   exit; 
} 

?>