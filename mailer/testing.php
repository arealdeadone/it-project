<?php 


$conn = new PDO("mysql:host=localhost;dbname=infotsav_contacts", "root", "root");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$z = 0;
$sql = "SELECT * FROM `mailers` WHERE 1";
$query = $conn->prepare($sql);
$query->execute();
   $result = $query->fetch(PDO::FETCH_ASSOC);
$s=array('contact@infotsav.com','shubhankar@infotsav.com','ravi@infotsav.com','unishubh@infotsav.com','aman@infotsav.com');
   while(isset($result['email']) && $z<=50 )
   {
   	echo $result['email'];
   	echo '<br>';
   	$result = $query->fetch(PDO::FETCH_ASSOC);
   	$z++;

   }




   	?>