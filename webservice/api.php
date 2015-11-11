<?php 

function get_student_info($id){
	require_once('conect.php');
	$SQL ="Select cuenta,correo,titulacion from cuentas where id_cuenta='".$id."'";
	$cuenta_array=array();
	$result=pg_query($link,$SQL);
	if (pg_num_rows($result)>0) {
		$obj=pg_fetch_assoc($result);
		return $obj;
	}else{
		return 0;
	}
	
}
/*
function get_student_cuentas(){
	require_once('conect.php');
	$SQL ="Select id,cuenta from cuenta";
	$cuenta_array=array();
	$resultado=mysqli_query($link,$SQL);
	if (mysqli_num_rows($resultado)>0) {
		$lista=mysqli_fetch_all($resultado,MYSQLI_ASSOC); 
		return $lista;
	}else{
		return 0;
	}

}
*/
function autenticar($user,$pwd){
	require_once('conect.php');
	$SQL ="Select id_cuenta,cuenta,correo,titulacion from cuentas where cuenta='".$user."' and contrasenia =md5('".$pwd."')";
	$result=pg_query($link,$SQL);
	if (pg_num_rows($result)>0) {
		$estudiante=pg_fetch_assoc($result); 
		return $estudiante;
	}else{
		return 0;
	}

}
if (isset($_GET["action"])) {
	switch ($_GET["action"]) {
		case 'autenticar':
			$value=autenticar($_GET['user'],$_GET['pwd']);
			break;
		case 'get_student':
			$value=get_student_info($_GET["id"]);
			break;
		default:
			echo "error";
			break;
	}
}
exit(json_encode($value))
 ?>