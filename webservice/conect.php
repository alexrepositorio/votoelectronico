<?php
	include("config.php");
	if(!($link=pg_connect("host=localhost user=alex password='alex' dbname=syllabus port=5432"))){
		echo "Error: ".pg_last_error($link);
		exit();
	}	
?>