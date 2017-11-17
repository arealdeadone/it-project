<?php
require("class.phpmailer.php");
/*$conn = new PDO("mysql:host=localhost;dbname=infotsav_contacts", "root", "root");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM `mailers` WHERE 1";
$query = $conn->prepare($sql);
$query->execute();

$z=0;
   $result = $query->fetch(PDO::FETCH_ASSOC);
$s=array('contact@infotsav.com','shubhankar@infotsav.com','ravi@infotsav.com','unishubh@infotsav.com','aman@infotsav.com');*/
   //while(isset($result['email']))
   //{
     // $i=rand(0, 5);
    //  echo "1<br>";
      //$z++;
      // if($result['email'] != '')
      // {
      //echo $result['email'].'<br>';

       //$s=array('mohanshubhankar@gmail.com');
   
   $mail = new PHPMailer();

   $mail->IsSMTP();
   // set mailer to use SMTP
   $mail->SMTPSecure = 'ssl'; 
   $mail->Host = "smtp.yandex.com";  // specify main and backup server
   $mail->Port = 465;
   $mail->SMTPDebug = 1;
   $mail->SMTPAuth = true;     // turn on SMTP authentication
   $mail->Username = 'contact@infotsav.com';  // SMTP username
   $mail->Password = "123456789"; // SMTP password

   $mail->From = "contact@infotsav.com";
   //$mail->From = $s[$i];
   $mail->FromName = "Infotsav'16";
   $mail->AddAddress('unishubh1@gmail.com', "Infotsav'16");
  
//$mail->AddAddress("ellen@example.com");                  // name is optional
//$mail->AddReplyTo("unishubh1@gmail.com", "Information");

   $mail->WordWrap = 50;                                 // set word wrap to 50 characters
//$mail->AddAttachment("/var/tmp/file.tar.gz");         // add attachments
//$mail->AddAttachment("/tmp/image.jpg", "new.jpg");    // optional name
   $mail->IsHTML(true);                                  // set email format to HTML

  $mail->body = "Ola!

Infotsav, the techno-managerial fest of ABV-IIITM, Gwalior and is often alluded as Central India’s largest. It is back this year with even greater pomp and fervor.

Since its inception in 2002, Infotsav has seen ever growing participation, always nurturing its aim of providing a competitive platform for innovative young engineers and entrepreneurs, promoting excellence in technical thinking and strategic management.

It's been a legacy that we, Team Infotsav have been carrying forward every year. Each year, we have evolved, and became better than the earlier set benchmarks.

We are back with the same intent. We intend to make Infotsav`16 the most exuberant celebration of the developments on the Techno-managerial front.

To spread the word, we are providing golden opportunity to students throughout the nation to be a part of Infotsav and represent it in their Colleges. Start applying for the post of campus ambassador here:

www.infotsav.com/ca


Eligibility criteria:

    Sincere and responsible candidates.
    No restriction based on year of study.


Regards,

Team Infotsav`16


For more updates: Website- www.infotsav.com";


   $mail->Subject    = "Infotsav'16";
   $mail->AltBody = "This is the body in plain text for non-HTML mail clients";
   if(!$mail->Send())
   {
       /*echo $result['email'].'<br>';
       echo "Sender ".$s[$i]."<br>";
      echo "Message could not be sent. <p>";
      echo "Mailer Error: " . $mail->ErrorInfo;*/
      echo "<br>";
     // exit;
   }
   else 
      echo 'send<br>';



//}

     
    //$result = $query->fetch(PDO::FETCH_ASSOC);

//}


?>