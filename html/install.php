<?php
	require 'connectDB.php';

	//Connect to database
	$servername = "localhost";
	$username = "root";		//put your phpmyadmin username.(default is "root")
	$password = "";			//if your phpmyadmin has a password put it here.(default is "root")
    
	// Leave out the DB name since we are creating it
	$conn = new mysqli($servername, $username, $password);

	// Create database
	$sql = "CREATE DATABASE ".$dbname;
	if ($conn->query($sql) === TRUE) {
	    echo "Database created successfully";
	} else {
	    echo "Error creating database: " . $conn->error;
	}

	echo "<br>";
    
	$conn = new mysqli($servername, $username, $password, $dbname);

	// sql to create table
	$sql = "CREATE TABLE IF NOT EXISTS `users` (
			`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`username` varchar(100),
			`serialnumber` double,
			`gender` varchar(10),
			`email` varchar(50),
			`fingerprint_id` int(11),
			`fingerprint_select` tinyint(1) NOT NULL DEFAULT '0',
			`user_date` date,
			`time_in` time,
			`del_fingerid` tinyint(1) NOT NULL DEFAULT '0',
			`add_fingerid` tinyint(1) NOT NULL DEFAULT '0'
	) ENGINE=InnoDB DEFAULT CHARSET=latin1";

	if ($conn->query($sql) === TRUE) {
	    echo "Table users created successfully<br>";
	} else {
	    echo "Error creating table: " . $conn->error."<br>";
	}

	$sql = "CREATE TABLE IF NOT EXISTS `users_logs` (
			`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`username` varchar(100) NOT NULL,
			`serialnumber` double NOT NULL,
			`fingerprint_id` int(5) NOT NULL,
			`checkindate` date NOT NULL,
			`timein` time NOT NULL,
			`timeout` time NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=latin1";

	if ($conn->query($sql) === TRUE) {
	    echo "Table users_logs created successfully<br>";
	} else {
	    echo "Error creating table: " . $conn->error."<br>";
	}
		
	$conn->close();
?>