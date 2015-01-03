<?php

	require "connect.php";
	
	$id = (int)$_POST['id'];
	$sql = "delete from {$_POST['table']} where id=$id";
	$result = mysql_query($sql);
	
?>