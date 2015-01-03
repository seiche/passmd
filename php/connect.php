<?php

	$conn = mysql_connect("HOST", "USERNAME", "PASSWORD");
	if(!$conn) die(mysql_error());
	$db = mysql_select_db("DB_NAME");
	if(!$db) die(mysql_error());
	
?>
