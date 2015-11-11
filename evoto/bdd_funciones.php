<?php 

function consultarcandidatosporcargo($cargo){
	require_once('connect.php');
	$SQL ="Select * from candidatos where titulacion ='".$_SESSION["titulacion"]."' and cargo=".$cargo;
	$cuenta_array=array();
	$result=pg_query($link,$SQL);
	if (pg_num_rows($result)>0) {
		$obj=pg_fetch_assoc($result);
		return $obj;
	}else{
		return 0;
	}
}
function consultar_cargos(){
	require_once('connect.php');
	$SQL ="Select cargo from cargo";
	$cuenta_array=array();
	$result=pg_query($link,$SQL);
	if (pg_num_rows($result)>0) {
		$obj=pg_fetch_array($result);
		return $obj;
	}else{
		return 0;
	}

}










 ?>