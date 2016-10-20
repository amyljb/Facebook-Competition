<?php
	
	// Change the database connection here
	$username = "root";
	$password = "mysql";
	$hostname = "localhost"; 
	
	//connection to the database
	$dbhandle = mysqli_connect($hostname, $username, $password);
	
	if ( !$dbhandle ) {
		die("Unable to connect to MySQL");
	}

	// rows
	$fields_num = count($fields);

	// create table if doesn't exist
	mysqli_select_db( $dbhandle, 'dev_fb_sample' );
	$result = mysqli_query( $dbhandle, 'SELECT * FROM users' );
    if(!$result) {
        $create = "CREATE TABLE IF NOT EXISTS users (
    		fname varchar(255),
    		lname varchar(255),
    		email varchar(255),
    		country varchar(255),
    		answer varchar(255),
    		date varchar(255)
        )";
        mysqli_query( $dbhandle, $create );
    }

	
?>