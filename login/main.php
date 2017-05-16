<?php
    include('session.php');
?>
<html>
<head>
	<title>Update BC database</title>
</head>

<style>
input[type=text], select {
    width: 30%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=int], select {
    width: 30%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    background-color: #4CAF50;
    width: 40%;
    color: white;
    padding: 14px 20px;
    margin-top: 2%;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

</style>

<body>
<center>
	<form action="schoolMaster.php" >

		<input type = "submit" value="School Updater">
		
	</form>

    <form action="teacherMaster.php" >

        <input type = "submit" value="Teacher Updater">
        
    </form>
    <form action="cluster.php">

        <input type="submit" value="Cluster Updater">        

    </form>

    <form action="listSchool.php" >

        <input type = "submit" value="View School">
        
    </form>

    <form action="listTeacher.php" >

        <input type = "submit" value="View Teacher">
        
    </form>

    <form action="/delivery/deliveryReport.php" >

        <input type = "submit" value="Delivery Reports">
        
    </form>

    <form action="logout.php" >

        <input type = "submit" value="Logout">
        
    </form>

    

</center>

</body>
</html>