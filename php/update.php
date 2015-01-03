<?php
	
	require "connect.php";
	
	$edit = (int)$_POST['id'];
	if(!$edit){
		//add new account
		$date = date('Y-m-d');
		$sql = "insert into passwords(
			date,
			site_name,
			site_url,
			account,
			password,
			notes
		)  values(
			'$date',
			'{$_POST['site_name']}',
			'{$_POST['site_url']}',
			'{$_POST['account']}',
			'{$_POST['password']}',
			'{$_POST['notes']}'
		)";
	}else{ 		
		//edit existing account
		$id = (int)$_POST['id'];
		$sql = "update passwords set
			site_name='{$_POST['site_name']}',
			site_url='{$_POST['site_url']}',
			account='{$_POST['account']}',
			password='{$_POST['password']}',
			notes='{$_POST['notes']}' 
		where id=$id";
	}
	$result = mysql_query($sql);
	if(!$result) die(mysql_error());
	header("Location: ../");
	
?>