<?php
	ini_set('display_errors', 1);
	error_reporting(E_ALL);


	$name= $_POST['username'];
	$pass= $_POST['password'];

	echo $name.$pass;


	class MyDB extends SQLite3
	{
		function __construct()
		{
			$this->open('test.db');
		}
	}


	$db = new MyDB();

	if(!$db)
	{
		echo $db->lastErrorMsg();
	}

	else
	{
//		echo "Opened database successfully\n";
	}


	$insert = "INSERT INTO logins (username, password) VALUES ('$name', '$pass')";

	$db->exec($insert) or die("Unable to add\n");


//	echo "Operation done successfully\n";
	$db->close();

?>
