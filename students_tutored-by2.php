<?php

$db = mysqli_connect('localhost', 'root', '', 'furkankemikli_Kemikli_Furkan_17846');

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}
	$sql = "SELECT S.sname,S.sid FROM Tutor_Tutees T,Student S WHERE S.sid = T.tutee_id GROUP BY S.sid HAVING Count(*) > 2";
	
	$mysqli_result = mysqli_query($db, $sql);
	
	$count = mysqli_num_rows($mysqli_result);
	if($count==0) {
		echo "No instructor found...";
	}
	else {
		//Print out the results
		while($row = mysqli_fetch_assoc($mysqli_result))
		{
			echo "Student names and ids who is tutored by more than two student: ".$row['sname']."	".$row['sid']."<br>";
		}
	}

mysqli_close($db);
?>

</br>
<a href="index.html">Back to search page</a>