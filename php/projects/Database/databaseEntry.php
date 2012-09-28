<?php
//Let's initialize the arguments for our database connection
$host = 'localhost';			//servername, (localhost)
$username = 'root';	//mysql username
$passwd = 'password';	//mysql password
$database_name = 'singlesemail_d7';	//database we wish to use
$database_table = '$email';




/**
 * Try to execute the following code, catching any errors thrown and displaying them. 
 */
try {
	//Create a new PDO object
	$DBH = new PDO("mysql:host=$host;dbname=$database_name", $username, $passwd);
}
catch (PDOException $e) {
	print("Error!: " . $e->getMessage() . "</br>");
}

//prepare our SQL statement for multiple executes
$stmt = $DBH->prepare("INSERT INTO emails (email, zip, first_name, register_date) VALUES (:email, :zip, :first_name, :timestamp);");

//bind our variables to the prepared sql statement
$stmt->bindParam(":email", $email);
$stmt->bindParam(":zip", $zip);
$stmt->bindParam(":first_name", $first_name);
$stmt->bindParam(":timestamp", microtime(TRUE));


/*
 * Example of execution statement
*/
$email = "test@foo.com";
$zip = 111111;
$first_name = "foo";
$stmt->execute();
//*/


?>