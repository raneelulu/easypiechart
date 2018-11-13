<?php
	$con = mysqli_connect("localhost", "root", "mypw", "dbname");
	if(mysqli_connect_error())	{
		echo "Fail to connect DB".mysqli_connect_error();
    }
?>