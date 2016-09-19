<?php
require("class.PHPMailer.php");


    $s="<html><head><title>Title</title></head><body><div>asfg</div></body></html>";

    $mail = new PHPMailer();

    $mail->IsSMTP();                                      // set mailer to use SMTP
    $mail->Host = "ssl://smtp.gmail.com";  // specify main and backup server
    $mail->Port = 465;
    $mail->SMTPDebug = 3;
    $mail->SMTPAuth = true;     // turn on SMTP authentication
    $mail->Username = "innovationthroughwaste@gmail.com";  // SMTP username
    $mail->Password = "eventphobias"; // SMTP password

    $mail->From = "innovationthroughwaste@gmail.com";
    $mail->FromName = "Infotsav'16";
    $mail->AddAddress("unishubh1@gmail.com", "Query");
//$mail->AddAddress("ellen@example.com");                  // name is optional
    $mail->AddReplyTo("unishubh1@gmail.com", "Information");

    $mail->WordWrap = 50;                                 // set word wrap to 50 characters
//$mail->AddAttachment("/var/tmp/file.tar.gz");         // add attachments
//$mail->AddAttachment("/tmp/image.jpg", "new.jpg");    // optional name
    $mail->IsHTML(true);                                  // set email format to HTML

    $mail->Subject = "You have a Query!";
    $mail->Body    = "<html>
<head>
    <meta charset=\"UTF-8\">
    <title>Title</title>
</head>
<body>
<div style='background-color: red'>
    <table>
        <tr>
            <td>Shubh</td>
            <td>Shukla</td>
        </tr>
        <tr>
        <td>Nice</td>
        <td>Nice</td>
</tr>
    </table>
</div>
</body>
</html>";
    $mail->AltBody = "This is the body in plain text for non-HTML mail clients";

    if(!$mail->Send())
    {
        echo "Message could not be sent. <p>";
        echo "Mailer Error: " . $mail->ErrorInfo;
//    echo "<pre>";
//    print_r($mail);
//    echo "</pre>";
        exit;
    }

//echo "Message has been sent";
//echo "<script>window.location = '../index.php';</script>";
//print_r($mail);

?>