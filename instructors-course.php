<?php

$db = mysqli_connect('localhost', 'root', '', 'furkankemikli_Kemikli_Furkan_17846');

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}
	$sql = "SELECT t.issn FROM teaches t GROUP BY t.issn HAVING Count(*) > 2";
	
	$mysqli_result = mysqli_query($db, $sql);
	
	$count = mysqli_num_rows($mysqli_result);
	if($count==0) {
		echo "No instructor found...";
	}
	else {
		//Print out the results
		while($row = mysqli_fetch_assoc($mysqli_result))
		{
			echo "Instructor ID which has courses more than 2 is: ".$row['issn']."<br>";
		}
	}

mysqli_close($db);
?>

</br>
<a href="index.html">Back to search page</a>