<?php
class clase_postgres{
	//variables para la conexion
	var $BaseDatos;
	var $Servidor;
	var $Usuario;
	var $Clave;
	/*Identificadores de conexion y consulta*/
	var $Conexion_ID = 0;
	var $consulta_ID = 0;
	/*Numero de error y error de texto*/
	var $Errno = 0;
	var $Error = "";
	function clase_postgres(){
		//Constructor//	
	}
	function conectar($host, $port, $db, $user, $pass){
		//Conexion//
		if ($host!="") $this ->Servidor = "localhost";		
		if ($port!="") $this ->Puerto = "5432";
		if ($db!="") $this ->BaseDatos = "votoE";
		if ($user !="") $this ->Usuario = "postgres";
		if ($pass !="") $this ->Clave = "postgres";
		//Conectamos al servidor de la base de datos//
		$this->Conexion_ID=pg_connect("host=$this->Servidor port=$this->Puerto dbname=$this->BaseDatos user=$this->Usuario password=$this->Clave"); 
		if (!$this->Conexion_ID) {
			$this ->Error="La conexion con el servidor fallida".pg_last_error($this->Conexion_ID);
			return 0;
		}
		/*Si todo tiene exito, retorno el identificador de la conexion*/
		return $this->Conexion_ID;

	}
	//Ejecuta cualquier consulta 
	function consulta($sql=""){
		if ($sql=="") {
			$this -> Error="No hay ningun SQL";
			return 0;
		}
		//ejecutamos la consulta
		$this ->consulta_ID = pg_query($this->Conexion_ID, $sql);
		if (!$this->Conexion_ID) {
			$this->Errno= pg_last_error($this->Conexion_ID);
		}
		//retorna la consulta ejecutada
		return $this->consulta_ID;
	}
	//Devuleve el numero de campos de la consulta 
	function numcampos(){
		return pg_num_fields ($this->consulta_ID);//PG_A
	}
	//Devuelve el numero de registros de la consulta
	function numregistros(){
		return pg_num_rows($this->consulta_ID);//PG_A
	}
	//Devuelve el nombre de un campo de la consulta
	function nombrecampo($numcampo){
		return pg_field_name($this->consulta_ID, $numcampo);//PG_A
	}
	//Muestra los resultados  de la consulta
	function verconsultadmin2($administrador){
		//mostrar los nombres de los campos
		$this->seleccionar($administrador);
		for ($i=1; $i < $this->numcampos() ; $i++) { 
			echo "<th>".$this->nombrecampo($i)."</th>";
		}
	}function verconsultabla($administrador){
		//mostrar los nombres de los campos
		$this->seleccionar($administrador);
		for ($i=0; $i < $this->numcampos() ; $i++) { 
			echo "<th>".$this->nombrecampo($i)."</th>";
		}
	}
	function mostrartabla($administrador){
		$this->seleccionar($administrador);
		while ($row = pg_fetch_array($this->consulta_ID)) {//PG_A
			echo "<tr>";
			for ($i=0; $i < $this->numcampos() ; $i++) { 
				echo "<td>".($row[$i])."</td>";
			}
			echo "</tr>";
		}
	}

	function verconsultadmin($administrador){
		$this->seleccionar($administrador);
		while ($row = pg_fetch_array($this->consulta_ID)) {//PG_A
			echo "<tr>";
			for ($i=1; $i < $this->numcampos() ; $i++) { 
				echo "<td>".($row[$i])."</td>";
			}
				switch ($administrador) {
					case 1:
					    echo "<td><a type='button' class='btn btn-warning' href='admin_tablas.php?id=$row[0]&act=1&pid=1'>Borrar</a></td>";
					    //echo "<td><a type='button' class='btn btn-success' href='admin_tablas.php?id=$row[0]&act=2&pid=1&func=1'>Editar</a></td>";
						break;
					case 2:
						echo "<td><a type='button' class='btn btn-warning' href='admin_tablas.php?id=$row[0]&act=1&pid=2'>Borrar</a></td>";
						//echo "<td><a type='button' class='btn btn-success' href='admin_tablas.php?id=$row[0]&act=2&pid=2&func=1'>Editar</a></td>";
						break;
					case 3:
					    echo "<td><a type='button' class='btn btn-warning' href='admin_tablas.php?id=$row[0]&act=1&pid=3'>Borrar</a></td>";
					    //echo "<td><a type='button' class='btn btn-success' href='admin_tablas.php?id=$row[0]&act=2&pid=3&func=1'>Editar</a></td>";
						break;
					case 4:
					    echo "<td><a type='button' class='btn btn-warning' href='admin_tablas.php?id=$row[0]&act=1&pid=4'>Borrar</a></td>";
					    //echo "<td><a type='button' class='btn btn-success' href='admin_tablas.php?id=$row[0]&act=2&pid=4&func=1'>Editar</a></td>";
						break;
					case 5:
					    echo "<td><a type='button' class='btn btn-warning' href='admin_tablas.php?id=$row[0]&act=1&pid=5'>Borrar</a></td>";
					    //echo "<td><a type='button' class='btn btn-success' href='admin_tablas.php?id=$row[0]&act=2&pid=5&func=1'>Editar</a></td>";
						break;
					case 6:
						echo "<td><a type='button' class='btn btn-warning' href='admin_tablas.php?id=$row[0]&act=1&pid=6'>Borrar</a></td>";
						//echo "<td><a type='button' class='btn btn-success' href='admin_tablas.php?id=$row[0]&act=2&pid=6&func=1'>Editar</a></td>";
						break;
					case 7:
					    echo "<td><a type='button' class='btn btn-warning' href='admin_tablas.php?id=$row[0]&act=1&pid=7'>Borrar</a></td>";
					    //echo "<td><a type='button' class='btn btn-success' href='admin_tablas.php?id=$row[0]&act=2&pid=7&func=1'>Editar</a></td>";
						break;
					case 8:
					    echo "<td><a type='button' class='btn btn-warning' href='admin_tablas.php?id=$row[0]&act=1&pid=8'>Borrar</a></td>";
					    //echo "<td><a type='button' class='btn btn-success' href='admin_tablas.php?id=$row[0]&act=2&pid=8&func=1'>Editar</a></td>";
						break;
					case 9:
					    echo "<td><a type='button' class='btn btn-warning' href='admin_tablas.php?id=$row[0]&act=1&pid=9'>Borrar</a></td>";
					    //echo "<td><a type='button' class='btn btn-success' href='admin_tablas.php?id=$row[0]&act=2&pid=9&func=1'>Editar</a></td>";
						break;					
					default:
						break;
				}
			echo "</tr>";
		}
	}
	function nombcandidatos(){
		$result=$this->consulta("select candidato from candidato");
		$row = pg_fetch_all($this->consulta_ID);
		foreach( $row as $index => $data ) {
			$row[ $index ] = $row[ $index ]['candidato'];
		}
		/*echo " rowNombC ";
		print_r($row);
		echo " rowNombC fin";*/
		return $row;
	}


	function candidatos(){
		$result=$this->consulta("select id_candidato from candidato");
		$row = pg_fetch_all($this->consulta_ID);
		foreach( $row as $index => $data ) {
			$row[ $index ] = $row[ $index ]['id_candidato'];
		}
		/*echo "rowCandidatos ";
		print_r($row);
		echo " rowCandidatos fin";*/
		return $row;
	}


	function barras2($cargo){
		$candidatos = $this->candidatos();
		$nombcandidatos = $this->nombcandidatos();
		//echo json_encode($candidatos);
		$arr= [];
		$nt;
		for($i=0;$i<count($candidatos);$i++) {
			$row = pg_fetch_assoc($this->consulta("select 
				candidato.candidato,
				count(*)
				from candidato left join voto on candidato.id_candidato=voto.id_candidato
				left join titulacion on titulacion.id_titulacion=candidato.id_titulacion
				left join cargo on candidato.id_cargo=cargo.id_cargo
				where titulacion.titulacion='".$_SESSION['titulacion']."' and 
				cargo='".$cargo."' and  candidato.id_candidato=".$candidatos[$i]."
				group by candidato.candidato"));
			foreach($row as $jsonArrayItem['label']=>$jsonArrayItem['value']) {
				$rnum[$i]=intval($jsonArrayItem['value']);
				$arr[$i]=array('x' =>($jsonArrayItem['label']),'y' => (intval($rnum[$i])));
			}
		}
		//echo json_encode($arr);
		return $arr; 
	}

	function dona(){
		$candidatos = $this->candidatos();
		$nombcandidatos = $this->nombcandidatos();
		$rnum = [];
		$row = [];
		$arr= [];
		for($i=0;$i<count($candidatos);$i++) {
			$row = pg_fetch_assoc($this->consulta("select count(id_candidato) FROM voto where id_candidato=".$candidatos[$i].";"));
			foreach($row as $jsonArrayItem['label']=>$jsonArrayItem['value']) {
				$rnum[$i]=intval($jsonArrayItem['value']);
				$arr[$i]=array('label' =>($nombcandidatos[$i]),'value' => (intval($rnum[$i])));
			}
		}
		return $arr;
	}

	function seleccionar($administrador){
		switch ($administrador) {
			case 1:
				$this->consulta("select * from candidato");
				break;
			case 2:
				$this->consulta("select * from cargo");
				break;
			case 3:
				$this->consulta("select * from cliente");
				break;
			case 4:
				$this->consulta("select * from correo");
				break;
			case 5:
				$this->consulta("select * from lista");
				break;
			case 6:
				$this->consulta("select * from periodo");
				break;
			case 7:
				$this->consulta("select * from titulacion");
				break;
			case 8:
				$this->consulta("select * from voto");
				break;
			case 9:
				$this->consulta("select * from directiva");
				break;
			case 10:
				$this->consulta("select * from tabla_voto");
				break;
			default:
				break;
		}
	}

	function insertar($administrador){
		switch ($administrador) {
			case 1:
				$this->consulta("insert into candidato(candidato, descripcion, id_cargo, id_lista, id_titulacion,id_periodo)
					values ('".($_POST['candidato'])."','".($_POST['descripcion'])."','".$_POST['id_cargo']."','".$_POST['id_lista']."','".$_POST['id_titulacion']."','".$_POST['id_periodo']."')");
				break;
			case 2:
				$this->consulta("insert into cargo(cargo)
					values ('".($_POST['cargo'])."')");
				break;
			case 3:
				$this->consulta("insert into lista(lista, descripcion)
					values ('".($_POST['lista'])."','".($_POST['descripcion'])."')");
				break;
			case 4:
				$this->consulta("insert into periodo(periodo)
					values ('".($_POST['periodo'])."')");
				break;
			case 5:
				$this->consulta("insert into titulacion(titulacion)
					values ('".($_POST['titulacion'])."')");
				break;
			case 6:
				$this->consulta("insert into directiva (id_titulacion, id_periodo, id_candidato, id_cargo)
					values ('".($_POST['id_titulacion'])."','".($_POST['id_periodo'])."','".$_POST['id_candidato']."','".$_POST['id_cargo']."')");
				break;
			default:
				break;
		}
	}

	function eliminar($administrador, $id){
		switch ($administrador) {
			case 1:
				$this->consulta("delete from candidato where id_candidato='".$id."'");
				break;
			case 2:
				$this->consulta("delete from cargo where id_cargo='".$id."'");  
				break;
			case 3:
				$this->consulta("delete from lista where id_lista='".$id."'");  
				break;
			case 4:
				$this->consulta("delete from periodo where id_periodo='".$id."'");  
				break;
			case 5:
				$this->consulta("delete from titulacion where id_titulacion='".$id."'"); 
				break;
			case 6:
				$this->consulta("delete from directiva where id_directiva='".$id."'");  
				break;
			default:
				break;
		}
	}

	function formconsultadmin($administrador){
		$this->seleccionar($administrador);
 		echo "<form action='admin_registro.php?act=3&&pid=".$administrador."' method='post' class='form-signin'>";
 		echo "<div class='row text-center'><h3>Nuevo Registro</h3></div><br>";

 		if($administrador==3){
 			for ($i=0; $i < $this->numcampos(); $i++) {
 				echo "<div>
 						<div class='col-md-3'>";
	 				echo    "<label for='".$this->nombrecampo($i)."' style='text-transform:uppercase'>".$this->nombrecampo($i).": </label>
	 			        </div>
	 			     <div class='col-md-8'>
	 			        <input name='".$this->nombrecampo($i)."'class='form-control'  placeholder='".$this->nombrecampo($i)."'  required autofocus><br></div>";
	 			echo "</div>";
	 		}
 		}else{
 			for ($i=1; $i < $this->numcampos(); $i++) {
 				if ($this->nombrecampo($i)=='id_candidato') {
 					echo "<div>
 						<div class='col-md-3'>";
	 				echo    "<label for='".$this->nombrecampo($i)."' style='text-transform:uppercase'>".$this->nombrecampo($i).": </label>
	 			        </div>
	 			     <div class='col-md-8'>
	 			        <input name='".$this->nombrecampo($i)."'class='form-control'  placeholder='".$this->nombrecampo($i)."'><br></div>";
	 			echo "</div>";
 				}else{
 					echo "<div>
 						<div class='col-md-3'>";
	 				echo    "<label for='".$this->nombrecampo($i)."' style='text-transform:uppercase'>".$this->nombrecampo($i).": </label>
	 			        </div>
	 			     <div class='col-md-8'>
	 			        <input name='".$this->nombrecampo($i)."'class='form-control'  placeholder='".$this->nombrecampo($i)."'  required autofocus><br></div>";
	 			echo "</div>";
 				} 				
	 		}
 		} 		
 		echo "<input type='hidden' name='bandera' value='3' >";
 		echo "<input class='btn btn-info' type='submit' value='Guardar'>";
 		echo "</form>";
 	}
 	/*
 	function formedicionadmin($editar,$id){
 		switch ($editar) {
 			case 7:
 				echo "<form action='actualizar_titulacion()' method='post'>";
			 				echo "<h4 class='tith4'>Actualizar Registro</h4>";
			 				$this->consulta("select * from titulacion where id_titulacion='".$id."'");
			 				$a=$this->consulta("select * from titulacion where id_titulacion='".$id."'");
			 				echo "$a"."clase_postgres 154";
			 				break;
			 			default:
			 				break;
			 		} 
			 		$row = pg_fetch_array($this->consulta_ID);
			 		echo print_r($row)." 159";
			 
			 		for ($i=1; $i < $this->numcampos(); $i++) {
			 			for ($i=1; $i < $this->numcampos(); $i++) {
			 				echo $this->nombrecampo($i).": <input name='".($this->nombrecampo($i))."'class='form-control' value='".($row[$this->nombrecampo($i)])."' placeholder='".$this->nombrecampo($i)."'><br>";
						}
			 		}
			 		if(isset($_GET['id'])){
			 			echo "<input type='hidden' name='id' value='".$_GET['id']."' >";
			 		}
			 		echo "<input type='hidden' name='bandera' value='2' >";
			 		echo "<input class='btn btn-warning2' type='submit' style='width:230px; text-align: center; display: block;'; value='Actualizar'>";
 		echo "</form>";
 		
 	}*/
}
?>