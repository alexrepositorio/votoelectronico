<?php
	if(!($link=pg_connect("host=localhost user=postgres password='postgres' dbname=votoE port=5432"))){
		echo "Error: ".pg_last_error($link);
		exit();
	}	
?>
