
<?php
include('cabecera_login.php'); 
echo "<body>";
$mensaje='';
if (isset($_GET["action"])=="autenticar") {
	extract($_POST);
	$ingreso=file_get_contents('http://localhost/webservice/api.php?action=autenticar&user='.$user.'&pwd='.$pwd);
	$ingreso=json_decode($ingreso,true);

	if ($ingreso !=0) {
		session_start();
        $_SESSION['cuenta']=$user;
        $_SESSION['correo']=$ingreso['correo'];
        $_SESSION['titulacion']=$ingreso['titulacion'];
		header ('Location: index.php');
		
	}else  {
		$mensaje= "Usuario o contraseña incorrectos, intentelo de nuevo";
	}
}
	echo "<br><br><div align=center><h2>¡Bienvenido!</h2><br>
	<h4>para acceder debes introducir una cuenta de usuario</h4><br>";
	echo $mensaje;
	echo "<form name=form action=".$_SERVER['PHP_SELF']."?action=autenticar method='post'>
		<table >
			<tr>
				<td align=center><menuindex><h2>Usuario</td>
				<td align=center><menuindex><h2>Contraseña</td>
			</tr>";
	echo "	<tr>
				<td align=center><input type='text' name=user color='black'></td>
				<td align=center><input type='password' name=pwd></td>
			</tr>";
	echo "
		</table><br>
		<input type='submit' value='Entrar' ></form>
	</div>
	</div>
	</div>";
 ?>

</body>