<?php 
	include('cabecera.php');
	include('bdd_funciones.php');
	$titulaciones=consultar_titulaciones();
	switch (isset($_GET["action"])) {
		case 'titulacion':
			insertar_titulacion($_POST['titulacion']);		
			break;
		default:
			break;
	}
 ?>
 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-6">
                <?php 
                echo "<table>
                		<tr>
                			<th>
                				Titulaciones
                			</th>
                		</tr>";
                	if ($titulaciones==0) {
                		echo "<tr>
	                			<td>no existen titulaciones disponibles  </td>
	                		</tr>";
                	}else{
                		foreach ($titulaciones as $titulacion) {
	                		echo "<tr>
	                			<td>".$titulacion['titulacion']."  </td>
	                		</tr>";
                		}
                	}
                	echo "</table>";
                 ?>
                	
                    <form role="form" action="".<?php echo $_SERVER['PHP_SELF']; ?>."?action=titulacion method='post'">
                        <div class="form-group">
                            <label>Agregar Titulacion</label>
                            <input type='text' name='titulacion'></td>
                        </div>
                        <button type="submit" class="btn btn-default">Guardar</button>
                    </form>

                </div>
                <div class="col-lg-6">
                    <h1>Disabled Form States</h1>

                    <form role="form">

                        <fieldset disabled>

                            <div class="form-group">
                                <label for="disabledSelect">Disabled input</label>
                                <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input" disabled>
                            </div>

                            <div class="form-group">
                                <label for="disabledSelect">Disabled select menu</label>
                                <select id="disabledSelect" class="form-control">
                                    <option>Disabled select</option>
                                </select>
                            </div>

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox">
                                    Disabled Checkbox
                                </label>
                            </div>

                            <button type="submit" class="btn btn-primary">Disabled Button</button>

                        </fieldset>

                    </form>

                    <h1>Form Validation</h1>

                    <form role="form">

                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess">Input with success</label>
                            <input type="text" class="form-control" id="inputSuccess">
                        </div>

                        <div class="form-group has-warning">
                            <label class="control-label" for="inputWarning">Input with warning</label>
                            <input type="text" class="form-control" id="inputWarning">
                        </div>

                        <div class="form-group has-error">
                            <label class="control-label" for="inputError">Input with error</label>
                            <input type="text" class="form-control" id="inputError">
                        </div>

                    </form>

                    <h1>Input Groups</h1>

                    <form role="form">
                        <div class="form-group input-group">
                            <span class="input-group-addon"> </span>
                            <input type="text" class="form-control" placeholder="Username">
                        </div>

                        <div class="form-group input-group">
                            <input type="text" class="form-control">
                            <span class="input-group-addon">.00</span>
                        </div>

                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-eur"></i></span>
                            <input type="text" class="form-control" placeholder="Font Awesome Icon">
                        </div>

                        <div class="form-group input-group">
                            <span class="input-group-addon">$</span>
                            <input type="text" class="form-control">
                            <span class="input-group-addon">.00</span>
                        </div>

                        <div class="form-group input-group">
                            <input type="text" class="form-control">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                            </span>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>    

</body>
</html>

 