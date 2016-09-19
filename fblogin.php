<?php
require_once('core/init.php');
$conn = new PDO("mysql:host=localhost;dbname=infotsav", "root", "Iiahtth");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$x = 0;
if(isset($_GET['fblogin']))
{
	//echo $_GET['fbid'];
	$sql = "SELECT * FROM `users` WHERE `fbid` = :fbid";
	$query = $conn->prepare($sql);
	$query->bindValue(':fbid', $_GET['fbid']);
	$query->execute();
	$result = $query->fetchAll(PDO::FETCH_ASSOC);
	
	if(empty($result)){
		$query="INSERT INTO users (name,email,fbid) VALUES (:name, :email, :fbid)";
		$q = $conn->prepare($query);
		$q->bindParam(':name',$_GET['name']);
		$q->bindParam(':email',$_GET['email']);
		$q->bindParam(':fbid',$_GET['fbid']);
		$q->execute();
		
		$sql = "SELECT * FROM `users` WHERE `fbid` = :fbid";
		$query = $conn->prepare($sql);
		$query->bindValue(':fbid', $_GET['fbid']);
		$query->execute();
		$result = $query->fetchAll(PDO::FETCH_OBJ);
		
		print_r($result);
		
		$query="INSERT INTO user_score (user_id,score) VALUES (:user_id, :score)";
		$q = $conn->prepare($query);
		$q->bindParam(':user_id',$result[0]->id);
		$q->bindParam(':score',$x);	
	         																																																																								
		$q->execute();
	}
	Session::put('user', $_GET['fbid']);
	$_SESSION['user'] = $_GET['fbid'];
	echo json_encode(array('status' => 'success', 'session' => Session::get('user')));
	die();
}

