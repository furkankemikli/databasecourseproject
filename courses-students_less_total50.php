<?php

$db = mysqli_connect('localhost', 'root', '', 'furkankemikli_Kemikli_Furkan_17846');

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}
	$sql = "SELECT C.CID, C.cname FROM Course C WHERE NOT EXISTS (SELECT C.cid FROM Enrolls E,Student S WHERE (E.CID=C.CID and S.totalcredit<50 and E.sid = S.sid))";
	
	$mysqli_result = mysqli_query($db, $sql);
	
	$count = mysqli_num_rows($mysqli_result);
	if($count==0) {
		echo "No instructor found...";
	}
	else {
		//Print out the results
		while($row = mysqli_fetch_assoc($mysqli_result))
		{
			echo "IDs of courses which is enrolled by students who have total credit less than 50: ".$row['CID']."<br>";
		}
	}

mysqli_close($db);
?>

</br>
<a href="index.html">Back to search page</a>