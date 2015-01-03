<?php

	$conn = mysql_connect("localhost", "root", "muro2kiri");
	if(!$conn) die(mysql_error());
	$db = mysql_select_db("ben");
	if(!$db) die(mysql_error());
	
?>