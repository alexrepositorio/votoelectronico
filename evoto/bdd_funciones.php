<?php 
ini_set('MAX_EXECUTION_TIME', -1);
function consultarcandidatosporcargo($cargo){
	require('connect.php');
	//$link=pg_connect("host=localhost user=postgres password='postgres' dbname=votoE port=5432");
	$SQL ="Select * from resumen_candidato where  cargo='".$cargo."'";
	$result=pg_query($link,$SQL);
	if (pg_num_rows($result)>0) {
		$obj=pg_fetch_all($result);
		return $obj;
	}else{
		return 0;
	}
}
function consultar_cargos(){
	require('connect.php');
	$SQL ="Select cargo from cargo";
	$cuenta_array=array();
	$result=pg_query($link,$SQL);
	if (pg_num_rows($result)>0) {
		$obj=pg_fetch_all($result);
		return $obj;
	}else{
		return 0;
	}
}
function crearalias(){
	require('connect.php');
    $existe=0;
    while ($existe==0) {    	
        $alias=substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);   	
    	$SQL ="Select * from cliente where alias='".$alias."'";
		$result=pg_query($link,$SQL);
		if (pg_num_rows($result)==0) {
			$existe=1;
		}   	
    }
    $SQL ="insert into cliente(alias,direccion_ip) values ('".$alias."','".$_SERVER['REMOTE_ADDR']."')";
	$result=pg_query($link,$SQL);
    return $alias;
}
function alias_id($alias){
	require('connect.php');
	$SQL ="Select id_persona from cliente where alias='".$alias."'";
	$result=pg_query($link,$SQL);
	$id=pg_fetch_assoc($result);
	$id=$id['id_persona'];
	return($id);

}
function almacenar_correo($estado){
	require('connect.php');
	$SQL ="insert into correo(correo,titulacion,estado) values ('".$_SESSION['correo']."','".$_SESSION['titulacion']."','".$estado."')";
	$result=pg_query($link,$SQL);
}
function voto_registrado(){
	require('connect.php');
	$SQL ="Select estado from correo where correo='".$_SESSION['correo']."'";
	$result=pg_query($link,$SQL);	
	if (pg_num_rows($result)==0) {
		return false;
	}else{
		return true;
	}  
}
function votar($id,$id_alias){
	date_default_timezone_set('UTC');
	$fecha=date("Y-m-d");
	require('connect.php');
	$SQL ="insert into voto(id_candidato,id_cliente,fecha) values (".$id.",".$id_alias.",'".$fecha."')";
	echo $SQL;
	$result=pg_query($link,$SQL);
}
function consultar_titulaciones(){
	require_once('connect.php');
	$SQL ="Select * from titulacion";
	$cuenta_array=array();
	$result=pg_query($link,$SQL);
	if (pg_num_rows($result)>0) {
		$obj=pg_fetch_array($result);
		return $obj;
	}else{
		return 0;
	}
}
function insertar_titulacion($titulacion){
	require_once('connect.php');
	$SQL ="insert into titulacion(titulacion) values (".$titulacion.")";
	$result=pg_query($link,$SQL);
	echo $SQL;
}









 ?>