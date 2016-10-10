<?php
/**
 * Created by PhpStorm.
 * User: Arvind Rachuri
 * Date: 10/6/2016
 * Time: 3:13 AM
 */
require_once 'core/init.php';

echo "<html>
        <head>
            <script>
                var reg = 1;";

$user = new User();

if(!$user->isLoggedIn())
    Redirect::to('index.php');


$eid = $_POST['eid'];
$db = new PDO('mysql:host=localhost;dbname=infotsav','root','Iiahtth');
$qu = $db->prepare("SELECT * FROM eventdetails WHERE id= ?");
$qu->bindParam(1,$eid);
$qu->execute();
$row = $qu->fetch(PDO::FETCH_ASSOC);

$tname = $_POST['tname'];
$emails = array();

for($i=0; $i<$row['maxmembers']; $i++){
    $f = $i+1;
    if(empty($_POST["$f"]))
        break;
    $emails[$i] = $_POST["$f"];
}

$uid = array();

for($i=0; $i<count($emails); $i++) {
    $qu = $db->prepare("SELECT * FROM `users` WHERE `email`=?");
    $qu->bindParam(1,$emails[$i]);
    $qu->execute();
    $res = $qu->fetch(PDO::FETCH_OBJ);
    if(empty($res))
        echo "alert('".$emails[$i]."- This email does not Exist'); window.history.go(-1); reg=0";
    @$uid[$i] = $res->id;
}

$sql = "INSERT INTO `teams`(`tname`";

for($i=1; $i<=count($uid); $i++)
    $sql .= ", `part".$i."`";
$sql .= ") VALUES(?";
for($i=1; $i<=count($uid); $i++)
    $sql .= ", ?";
$sql .= ")";

$qu = $db->prepare($sql);

$qu->bindParam(1,$tname);

for($i=0, $j=2; $i<count($uid); $i++, $j++)
    $qu->bindParam($j,$uid[$i]);

$qu->execute();

$tid = $db->prepare('SELECT * FROM `teams` ORDER BY `tid` DESC LIMIT 1');
$tid->execute();
$tid = $tid->fetch(PDO::FETCH_OBJ);
$tid = $tid->tid;

$qu = $db->prepare('INSERT INTO `events`(`eid`,`tid`) VALUES (?, ?)');
$qu->bindParam(1, $eid);
$qu->bindParam(2, $tid);
$qu->execute();


echo "        
            if(reg)
            {
                alert('Successfully Registered!');
                window.location='index.php';
            }
        </script>
    </head>
</html>
";

