<?php

	require "connect.php";
	
	$sql = "create table passwords(
		id int auto_increment,
		primary key(id),
		date varchar(250),
		site_name varchar(250),
		site_url varchar(250),
		account varchar(250),
		password varchar(250),
		notes varchar(250)
	)";
	$result = mysql_query($sql);
	if(!$result)
		echo mysql_error() . "\n";
	else
		echo "Account table created\n";
	
	$sql = "create table ftp(
		id int auto_increment,
		primary key(id),
		domain varchar(250),
		type varchar(250),
		username varchar(250),
		password varchar(250),
		date varchar (250)
	)";
	$result = mysql_query($sql);
	if(!$result)
		echo mysql_error() . "\n";
	else
		echo "FTP table created\n";
	
	


?>