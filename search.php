<?php

// To receive values sent from POST Form: $_POST['name']

// Basic mysqli functions for database connection
// For database connection: $link = mysqli_connect($host, $username, $password, $database);
// For closing the database connection: mysqli_close($link);
/* 
 * For executing a query: $result = mysqli_query($link, $query);
 * mysqli_query returns FALSE on failure. For successful SELECT queries mysqli_query returns a mysqli_result object 
 * For other queries mysqli_query returns TRUE 
 */
// For getting the error produced by mysql: mysqli_error($link);
// For getting number of rows in the result: mysqli_num_rows($result);
// For receiving one row in the result: $row = mysqli_fetch_assoc($result); (i.e. works similar to getline function in C++)
// For accessing the results in the row: $row['columname']

//Receive the value sent by POST form


//Make the database connection with mysqli_connect function 
$db = mysqli_connect('localhost', 'root', '', 'furkankemikli_Kemikli_Furkan_17846');

$id = (int)$_POST['idInput'];
if($id == ""){
	echo "No ID sent<br>";
}
else {
	
	//Prepare the query
	$sql = "SELECT * FROM student s WHERE s.sid=$id";
	
	//Execute and receive the result of the query
	$mysqli_result = mysqli_query($db, $sql);
	
	//Receive the number of rows returned by the query
	$count = mysqli_num_rows($mysqli_result);
	if($count==0) {
		echo "No student found with ID: $id";
	}
	else {
		//Print out the results
		while($row = mysqli_fetch_assoc($mysqli_result))
		{
			echo $row['sname']." ".$row['ssurname']." is ".$row['age']." years old with total credit: ".$row['totalcredit']." and with email: ".$row['semail']."<br>";
		}
	}
}

mysqli_close($db);
?>

</br>
<a href="index.html">Back to search page</a>




