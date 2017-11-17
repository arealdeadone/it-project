<?php
$con=mysql_connect("localhost","root","");
$db=mysql_select_db("gold",$con);

$search=mysql_real_escape_string($_GET['search']);
$query=mysql_query("SELECT `first_name` FROM `users` WHERE `email` LIKE '$search%'");
while($row=mysql_fetch_assoc($query))
  {
    echo $row['first_name']."<br>";
  }
mysql_free_result($query)
?>