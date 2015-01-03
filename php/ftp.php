<?php
	
	require "connect.php";
	
	$edit = (int)$_POST['id'];
	if(!$edit){
		//add new account
		$date = date('Y-m-d');
		$sql = "insert into ftp(
			date,
			domain,
			type,
			username,
			password
		)  values(
			'$date',
			'{$_POST['domain']}',
			'{$_POST['type']}',
			'{$_POST['username']}',
			'{$_POST['password']}'
		)";
	}else{ 		
		//edit existing account
		$id = (int)$_POST['id'];
		$sql = "update ftp set
			domain='{$_POST['domain']}',
			username='{$_POST['username']}',
			password='{$_POST['password']}'
		where id=$id";
	}
	$result = mysql_query($sql);
	if(!$result) die(mysql_error());
	header("Location: ../ftp.php");
	
?>