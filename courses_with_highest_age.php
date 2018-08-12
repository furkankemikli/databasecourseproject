<?php

$db = mysqli_connect('localhost', 'root', '', 'furkankemikli_Kemikli_Furkan_17846');

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}
	$sql = "SELECT C.CNAME FROM enrolls E3, course C WHERE C.CID=E3.CID AND E3.sid IN (SELECT s.sid FROM Student s WHERE s.age = (SELECT MAX(s1.age) FROM Student s1)) GROUP BY C.cname";
	
	$mysqli_result = mysqli_query($db, $sql);
	
	$count = mysqli_num_rows($mysqli_result);
	if($count==0) {
		echo "No instructor found...";
	}
	else {
		//Print out the results
		while($row = mysqli_fetch_assoc($mysqli_result))
		{
			echo "Name of courses which has student who has higher age are: ".$row['CNAME']."<br>";
		}
	}

mysqli_close($db);
?>

</br>
<a href="index.html">Back to search page</a>