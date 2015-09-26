
<?php
include ("../login/conexao.php");

if ( !isset($_REQUEST['term']) )
	exit;

$rs = mysql_query('select nome from remedios where nome like "'. mysql_real_escape_string($_REQUEST['term']) .'%" ');

//
$data = array();
if ( $rs && mysql_num_rows($rs) )
{
while( $row = mysql_fetch_array($rs, MYSQL_ASSOC) )
{
$data[] = array(
		'label' => $row['nome'],
		'value' => $row['nome']
		);
}
}

// jQuery wants JSON data
echo json_encode($data);
flush();
?>