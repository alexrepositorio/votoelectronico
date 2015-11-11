<html>

<body>
<?php 
include('conect.php');
if (isset($_GET["action"])=="autenticar") {
	extract($_POST);
	$ingreso=file_get_contents('http://localhost/webservice/api.php?action=autenticar&user='.$user.'&pwd='.$pwd);
	$ingreso=json_decode($ingreso,true);
	//print_r($ingreso);
	
	if ($ingreso !=0) {
		echo "logeado";
		echo "Cuenta:".$ingreso["cuenta"]."<br>";
		echo "Titulacion:".$ingreso["titulacion"];
	}else  {
		echo "error";
	}
	
}else{
	echo "<br><br><div align=center><h2>¡Bienvenido!</h2><br>
	<h4>para acceder debes introducir una cuenta de usuario</h4></div><br>";
	echo "<form name=form action=".$_SERVER['PHP_SELF']."?action=autenticar method='post'>
		<table >
			<tr>
				<td align=center><menuindex><h2>Usuario</td>
				<td align=center><menuindex><h2>Contraseña</td>
			</tr>";
	echo "	<tr>
				<td align=center><input type='text' name=user></td>
				<td align=center><input type='password' name=pwd></td>
			</tr>";
	echo "
		</table><br>
		<input type='submit' value='Entrar' ></form>
	</div>
	</div>";
}
 ?>

</body>
</html>