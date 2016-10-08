<?php
$con= new PDO('mysql:host=localhost;dname=infotsav');  //mysql_connect("localhost","root","");
//$db=mysql_select_db("infotsav",$con);

$search=$_GET['search'].'%';
$query= $con->prepare("SELECT `name`,`email` FROM `users` WHERE `email` LIKE ?");
print_r($query);
$query->bindParam(1,$search);
$query->execute();
print_r($con);
$rows = $query->fetch(PDO::FETCH_ASSOC);
print_r($rows);
echo $rows['name'];
?>