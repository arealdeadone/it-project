<?php
require("class.phpmailer.php");
$conn = new PDO("mysql:host=localhost;dbname=infotsav_contacts", "root", "root");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);











$i = 0;










$sql = "SELECT * FROM `mailers` WHERE 1 LIMIT 1500,400";
$query = $conn->prepare($sql);
$query->execute();

$z=0;
   $result = $query->fetch(PDO::FETCH_ASSOC);
$s=array('devansh@infotsav.com','shashank@infotsav.com','ambuj@infotsav.com','ashish@infotsav.com');
   while(isset($result['id'])) 
   {
      $i++;
	if($i >= 4)
	$i = $i % 4;
    //  echo "1<br>";
      $z++;
       if($result['email'] != '')
       {
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
   $mail->Username = $s[$i];  // SMTP username
   $mail->Password = "123456789"; // SMTP password

  // $mail->From = "contact@infotsav.com";
   $mail->From = $s[$i];
   $mail->FromName = "Infotsav'16";
   $mail->AddAddress($result['email'], "Infotsav'16");
  
//$mail->AddAddress("ellen@example.com");                  // name is optional
//$mail->AddReplyTo("unishubh1@gmail.com", "Information");

   $mail->WordWrap = 50;                                 // set word wrap to 50 characters
//$mail->AddAttachment("/var/tmp/file.tar.gz");         // add attachments
//$mail->AddAttachment("/tmp/image.jpg", "new.jpg");    // optional name
   $mail->IsHTML(true);                                  // set email format to HTML

   $mail->Body = '<!DOCTYPE html>
<html>
<head>
<title>INVOTSAV 16 | ABV-IIITM,GWALIOR</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" />
	<style type="text/css">
    	
	    body{
            width: 100%; 
            background-color: #9f9fa3; 
            margin:0; 
            padding:0; 
            -webkit-font-smoothing: antialiased;
        }
        
        html{
            width: 100%; 
        }
        
        table{
            font-size: 14px;
            border: 0;
        }
		 /* ----------- responsivity ----------- */
		 @media only screen and (max-width: 768px){
			.container {
				width: 700px !important;
			}
		}
        @media only screen and (max-width: 640px){
        
            /*------ top header ------ */
            .header-bg{width: 440px !important; height: 10px !important;}
            .main-header{line-height: 28px !important;}
            .main-subheader{line-height: 28px !important;}
            
            /*----- --features ---------*/
            .feature{width: 420px !important;}
            .feature-middle{width: 400px !important; text-align: center !important;}
            .feature-img{width: 440px !important; height: auto !important;}
            
            .container{width: 440px !important;}
            .container-middle{width: 420px !important;}
            .mainContent{width: 400px !important;}
            
            .main-image{width: 400px !important; height: auto !important;}
            .banner{width: 400px !important; height: auto !important;}
            /*------ sections ---------*/
            .section-item{width: 400px !important;}
            .section-img{width: 400px !important; height: auto !important;}
            /*------- prefooter ------*/
            .prefooter-header{padding: 0 10px !important; line-height: 24px !important;}
            .prefooter-subheader{padding: 0 10px !important; line-height: 24px !important;}
            /*------- footer ------*/
            .top-bottom-bg{width: 420px !important; height: auto !important;}
            table {
				width: 100% !important;
				text-align:center;
			}
        }
        
        @media only screen and (max-width: 479px){
        
        	/*------ top header ------ */
            .header-bg{width: 280px !important; height: 10px !important;}
            .top-header-left{width: 260px !important; text-align: center !important;}
            .top-header-right{width: 260px !important;}
            .main-header{line-height: 28px !important; text-align: center !important;}
            .main-subheader{line-height: 28px !important; text-align: center !important;}
            
            /*------- header ----------*/
            .logo{width: 260px !important;}
            .nav{width: 260px !important;}
            
            /*----- --features ---------*/
            .feature{width: 260px !important;}
            .feature-middle{width: 240px !important; text-align: center !important;}
            .feature-img{width: 260px !important; height: auto !important;}

            
            .container{width: 290px !important;}
            .container-middle{width: 260px !important;}
            .mainContent{width: 240px !important;}
            
            .main-image{width: 240px !important; height: auto !important;}
            .banner{width: 240px !important; height: auto !important;}
            /*------ sections ---------*/
            .section-item{width: 240px !important;}
            .section-img{width: 240px !important; height: auto !important;}
            /*------- prefooter ------*/
            .prefooter-header{padding: 0 10px !important;line-height: 28px !important;}
            .prefooter-subheader{padding: 0 10px !important; line-height: 28px !important;}
            /*------- footer ------*/
            .top-bottom-bg{width: 260px !important; height: auto !important;}
			table {
				  width: 100% !important;
			}
            .gallery-img a img {
				height: 134px !important;
			}
			.gallery-img1 a img {
				height: 60px !important;
			}
			.gallery-img2 a img {
				height: 60px !important;
			}
	    }
    </style>
    
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
		<tr bgcolor="#eeeeee"><td height="30"></td></tr>
        <tr bgcolor="#eeeeee">
            <td width="100%" align="center" valign="top" bgcolor="#eeeeee">
                <!-- main content -->
                <table width="900" border="0" cellpadding="0" cellspacing="0" align="center" class="container top-header-left" bgcolor="eeeeee">
					<!-- banner -->
						<tr>
							<td>
								<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="FFFFFF" style="background:url(https://i.imgsafe.org/185e4d1028.jpg); background-size:cover;" height="430">
									<tr>
										<td>
											<table border="0" width="580" align="center" cellpadding="0" cellspacing="0" class="container-middle">	
												<tr>
													<td>
														<table border="0" align="center" cellpadding="0" cellspacing="0">
															<tr>
																<td align="center">
																	<table border="0" align="center" cellpadding="0" cellspacing="0">
																		<tr>
																			<td>&nbsp;&nbsp;</td>
																			<td>

																			</td>
																		</tr>
																	</table>
																</td>
															</tr>
														</table>
													</td>
												</tr>
												<tr>
													<td height="10"></td>
												</tr>

												<tr><td height="170"></td></tr>
												<tr>
													<td>
														<table border="0" width="560" align="center" cellpadding="0" cellspacing="0" class="container-middle">
															
															<tr>
																<td align="center" style="font-size: 2em; color: #FFFFFF;;letter-spacing:1px; text-align: center; font-family:Eras ITC,serif;" mc:edit="text-1">

																</td>
															</tr>
															<tr><td height="10"></td></tr>
															<tr>
																<td align="center" style="font-size: 15px; color: #FFFFFF; font-weight: normal; text-align: center; font-family:Candara" mc:edit="text-1">

																</td>
															</tr>
															<tr>
																<td valign="top" height="60">
																</td>
															</tr>
															
															<tr>
																<!--visit our website-->
															</tr>
														</table>
													</td>
												</tr>
												<tr><td height="80"></td></tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					<!-- banner -->
					<!-- banner-bottom -->
						<tr>
							<td>
								<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#1af">
									<tr><td height="15"></td></tr>
									<tr>
										<td>
											<table border="0" width="560" align="center" cellpadding="0" cellspacing="0" class="container-middle">
												<tr>
													<td align="center" width="560" style="font-size:20px;color:black;line-height:1.8em;text-transform:capitalize;font-family:Candara;">The annual <b>Techno-Managerial</b> fest of <b>ABV-IIITM,Gwalior</b> is Back!</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr><td height="15"></td></tr>
								</table>
							</td>
						</tr>
					<!-- //banner-bottom -->
					<!-- welcome -->
						<tr><td bgcolor="ffffff" height="40"></td></tr>
						<tr><td bgcolor="ffffff">
								<table width="560" border="0" align="center" cellpadding="0" cellspacing="0" class="mainContent">
									<tr>	
										<td align="center" mc:edit="title1" class="main-header" style="color: #1af; font-size: 1.7em; font-family:Eras ITC,serif;letter-spacing:1px;">
											About INFOTSAV 2016
										</td>
									</tr>
									<tr>
										<td height="20"></td>
									</tr>
									<tr bgcolor="ffffff">
										<td mc:edit="text1" class="main-subheader" style="color: #777; font-size: 1.2em;font-family: Candara;text-align:justify; font-weight: normal; line-height: 1.5em;">
											With vivid fests jubilations hovering around every college, Infotsav is unique in its kind as it encourages knowledge
											with fun. It is an unprecedented fest which focuses on enhancing technical skill development and raging towards bang-on
											entrepreneurship.
											An amalgamation	of Technical, Managerial, Online Simulation and Quizzing Events, Infotsav is back to challenge
											innovative minds.
											A series of Challenging and exciting Technical events will be held including Programming Contest, Software development,
											App Development contests which will have a new flavour. Several other skill based events such as Web Development,
											Code Rush and BugSpot are also a great snack for code lovers. The Fest is a perfect concoction of technical and
											non-technical events.
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr><td height="40" bgcolor="ffffff"></td></tr>
					<!--next section-->
						<tr><td bgcolor="bab4b6" height="40"></td></tr>
						<tr><td bgcolor="bab4b6">
								<table width="560" border="0" align="center" cellpadding="0" cellspacing="0" class="mainContent">
									<tr>	
										<td align="center" mc:edit="title1" class="main-header" style="color: #FFFFFF; font-size: 2em; font-family:Eras ITC,serif;">
											Our Flagship events
										</td>
									</tr>
									<tr>
										<td height="20"></td>
									</tr>
									<tr>
										<td height="30"></td>
									</tr>
									<tr>
										<td>
											<table border="0" width="900" align="center" cellpadding="0" cellspacing="0" class="container-middle">
												<tr >
													<td>
														
														<!-- feature 1 -->
														<table border="0" width="270" align="left" cellpadding="0" cellspacing="0" style="cursor: pointer;border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;margin-left: 5%;" class="feature">
															<tr>
																<td align="center">
																	<a href="http://www.infotsav.com/Info/technicalnew.php" target="_blank"> <img style="display: block;" src="https://i.imgsafe.org/16f5d3c142.jpg" alt="" class="feature-img"></a>
																</td>
															</tr>
															<tr><td height="25"></td></tr>
															<tr>
																<td align="center">
																	<table border="0" width="250" align="center" cellpadding="0" cellspacing="0" class="feature-middle">
																		
																		<tr>
																			<td align="center" mc:edit="title2" style="color: #FFFFFF; font-size: 1.5em; font-weight: normal; font-family:Eras ITC,serif;">
																					7 TECHNICAL EVENTS
																			</td>
																		</tr>
																		<tr><td height="10"></td></tr>
																		<tr>
																			<td style="color:#FFFFFF; font-size: 1em; font-family: Candara; text-align:center;line-height:1.8em;">Events including Bugspot,Techathlon,Code rush,   Hackathon,Algo writing,SCRUD,Jobs</td>
																		</tr>
																		
																	</table>
																</td>
															</tr>
														</table><!-- end feature 1 -->

														<!--new-->
														<table border="0" width="270" align="left" cellpadding="0" cellspacing="0" style="cursor: pointer;border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="feature">
															<tr>
																<td align="center">
																	<a href="http://www.infotsav.com/Info/onlinenew.php" target="_blank"> <img style="display: block;" src="https://i.imgsafe.org/16f63e8148.jpg" alt="" class="feature-img"></a>
																</td>
															</tr>
															<tr><td height="25"></td></tr>
															<tr>
																<td align="center">
																	<table border="0" width="250" align="center" cellpadding="0" cellspacing="0" class="feature-middle">

																		<tr>
																			<td align="center" mc:edit="title2" style="color: #FFFFFF; font-size: 1.5em; font-weight: normal; font-family:Eras ITC,serif;">
																				5 ONLINE EVENTS
																			</td>
																		</tr>
																		<tr><td height="10"></td></tr>
																		<tr>
																			<td style="color:#FFFFFF; font-size: 1em; font-family: Candara; text-align:center;line-height:1.8em;">Events including<br>Forex, Job bureau,<br>Trove Trace, Snap Trap</td>
																		</tr>

																	</table>
																</td>
															</tr>
														</table>

														<!--newend-->
														
														<!--<table width="5" border="0" align="left" cellpadding="0" cellspacing="0">-->
															<!--<tr>-->
																<!--<td height="30" width="5"></td>-->
															<!--</tr>-->
														<!--</table>-->
														
														<!-- feature 2 -->
														<table border="0" width="270" align="left" cellpadding="0" cellspacing="0" class="feature">
															<tr>
																<td align="center">
																	<a href="http://www.infotsav.com/Info/managerialnew.php" target="_blank"> <img style="display: block;" src="https://i.imgsafe.org/16f5f3cefc.jpg" alt="" class="feature-img"></a>
																</td>
															</tr>
															<tr><td height="25"></td></tr>
															<tr>
																<td align="center">
																	<table border="0" width="250" align="center" cellpadding="0" cellspacing="0" class="feature-middle">
																		
																		<tr>
																			<td align="center" mc:edit="title2" style="color: #FFFFFF; font-size: 1.5em; font-weight: normal; font-family:Eras ITC,serif;">
																				5 MANAGERIAL EVENTS
																			</td>
																		</tr>
																		<tr><td height="10"></td></tr>
																		<tr>
																			<td style="color:#FFFFFF; font-size: 1em; font-family: Candara; text-align:center;line-height:1.8em;">Events including <br>Sameeksha, Brandsome, Pinnacle, <br>Smart cities, ITW</td>
																		</tr>
																		
																	</table>
																</td>
															</tr>
														</table><!-- end feature 2 -->
														
														
													</td>
												</tr>	
												
											</table>
											
										</td>
									<!--</tr>-->
									<!--<tr>-->
										<!--<td height="60"></td>-->
									<!--</tr>-->

									<!--<tr>-->
										<!--<td>-->
											<!--<table border="0" width="560" align="center" cellpadding="0" cellspacing="0" class="container-middle">-->
												<!--<tr>-->
													<!--<td>-->

														<!--&lt;!&ndash; feature 1 &ndash;&gt;-->
														<!--<table border="0" width="270" align="left" cellpadding="0" cellspacing="0" style="cursor: pointer;border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="feature">-->
															<!--<tr>-->
																<!--<td align="center">-->
																	<!--<img style="display: block;" src="images/4.jpg" alt="" class="feature-img">-->
																<!--</td>-->
															<!--</tr>-->
															<!--<tr><td height="25"></td></tr>-->
															<!--<tr>-->
																<!--<td align="center">-->
																	<!--<table border="0" width="250" align="center" cellpadding="0" cellspacing="0" class="feature-middle">-->

																		<!--<tr>-->
																			<!--<td align="center" mc:edit="title2" style="color: #FFFFFF; font-size: 1.5em; font-weight: normal; font-family:Eras ITC,serif;">-->
																				<!--5 ONLINE EVENTS-->
																			<!--</td>-->
																		<!--</tr>-->
																		<!--<tr><td height="10"></td></tr>-->
																		<!--<tr>-->
																			<!--<td style="color:#FFFFFF; font-size: 1em; font-family: Candara; text-align:center;line-height:1.8em;">Events including<br>Forex, Job bureau,<br>Trove Trace, Snap Trap</td>-->
																		<!--</tr>-->

																	<!--</table>-->
																<!--</td>-->
															<!--</tr>-->
														<!--</table>&lt;!&ndash; end feature 1 &ndash;&gt;-->

														<!--<table width="5" border="0" align="left" cellpadding="0" cellspacing="0">-->
															<!--<tr>-->
																<!--<td height="30" width="5"></td>-->
															<!--</tr>-->
														<!--</table>-->

														<!--&lt;!&ndash; feature 2 &ndash;&gt;-->
														<!--<table border="0" width="270" align="right" cellpadding="0" cellspacing="0" class="feature">-->
															<!--<tr>-->
																<!--<td align="center">-->
																	<!--<img style="display: block;" src="images/5.jpg" alt="" class="feature-img">-->
																<!--</td>-->
															<!--</tr>-->
															<!--<tr><td height="25"></td></tr>-->
															<!--<tr>-->
																<!--<td align="center">-->
																	<!--<table border="0" width="250" align="center" cellpadding="0" cellspacing="0" class="feature-middle">-->

																		<!--<tr>-->
																			<!--<td align="center" mc:edit="title2" style="color: #FFFFFF; font-size: 1.5em; font-weight: normal; font-family:Eras ITC,serif;">-->
																				<!--ROBOFIESTA-->
																			<!--</td>-->
																		<!--</tr>-->
																		<!--<tr><td height="10"></td></tr>-->
																		<!--<tr>-->
																			<!--<td style="color:#FFFFFF; font-size: 1em; font-family: Candara; text-align:center;line-height:1.8em;">Events including<br> Course Chaser, Blazing Wheels,<br>Robo Soccer, Robo War</td>-->
																		<!--</tr>-->

																	<!--</table>-->
																<!--</td>-->
															<!--</tr>-->
														<!--</table>&lt;!&ndash; end feature 2 &ndash;&gt;-->


													<!--</td>-->
												<!--</tr>-->

											<!--</table>-->

										<!--</td>-->
									<!--</tr>-->
									<tr>
										<td height="60"></td>
									</tr>

									<tr>
										<td>
											<table border="0" width="900" align="center" cellpadding="0" cellspacing="0" class="container-middle">
												<tr >
													<td>

														<!-- feature 1 -->
														<table border="0" width="270" align="left" cellpadding="0" cellspacing="0" style="cursor: pointer;border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;margin-left: 5%;" class="feature">
															<tr>
																<td align="center">
																	<a href="http://www.infotsav.com/Info/gamiacsnew.php" target="_blank"> <img style="display: block;" src="https://i.imgsafe.org/16f5ea1fd1.jpg" alt="" class="feature-img"></a>
																</td>
															</tr>
															<tr><td height="25"></td></tr>
															<tr>
																<td align="center">
																	<table border="0" width="250" align="center" cellpadding="0" cellspacing="0" class="feature-middle">

																		<tr>
																			<td align="center" mc:edit="title2" style="color: #FFFFFF; font-size: 1.5em; font-weight: normal; font-family:Eras ITC,serif;">
																				GAMIACS EVENTS
																			</td>
																		</tr>
																		<tr><td height="10"></td></tr>
																		<tr>
																			<td style="color:#FFFFFF; font-size: 1em; font-family: Candara; text-align:center;line-height:1.8em;">Events including<br>CS GO</td>
																		</tr>

																	</table>
																</td>
															</tr>
														</table><!-- end feature 1 -->

														<!--new-->
														<table border="0" width="270" align="left" cellpadding="0" cellspacing="0" style="cursor: pointer;border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="feature">
															<tr>
																<td align="center">
																	<a href="http://www.infotsav.com/Info/robonew.php" target="_blank"> <img style="display: block;" src="https://i.imgsafe.org/16f5f6338f.jpg" alt="" class="feature-img"></a>
																</td>
															</tr>
															<tr><td height="25"></td></tr>
															<tr>
																<td align="center">
																	<table border="0" width="250" align="center" cellpadding="0" cellspacing="0" class="feature-middle">

																		<tr>
																			<td align="center" mc:edit="title2" style="color: #FFFFFF; font-size: 1.5em; font-weight: normal; font-family:Eras ITC,serif;">
																				4 ROBOTICS EVENTS
																			</td>
																		</tr>
																		<tr><td height="10"></td></tr>
																		<tr>
																			<td style="color:#FFFFFF; font-size: 1em; font-family: Candara; text-align:center;line-height:1.8em;">Events including<br> Course Chaser, Blazing Wheels,<br>Robo Soccer, Robo War</td>
																		</tr>

																	</table>
																</td>
															</tr>
														</table>

														<!--newend-->

														<!--<table width="5" border="0" align="left" cellpadding="0" cellspacing="0">-->
														<!--<tr>-->
														<!--<td height="30" width="5"></td>-->
														<!--</tr>-->
														<!--</table>-->

														<!-- feature 2 -->
														<table border="0" width="270" align="left" cellpadding="0" cellspacing="0" class="feature">
															<tr>
																<td align="center">
																	<a href="http://www.infotsav.com/Info/quiznew.php" target="_blank"> <img style="display: block;" src="https://i.imgsafe.org/16f615aa43.jpg" alt="" class="feature-img"></a>
																</td>
															</tr>
															<tr><td height="25"></td></tr>
															<tr>
																<td align="center">
																	<table border="0" width="250" align="center" cellpadding="0" cellspacing="0" class="feature-middle">

																		<tr>
																			<td align="center" mc:edit="title2" style="color: #FFFFFF; font-size: 1.5em; font-weight: normal; font-family:Eras ITC,serif;">
																				QUIZ
																			</td>
																		</tr>
																		<tr><td height="10"></td></tr>
																		<tr>
																			<td style="color:#FFFFFF; font-size: 1em; font-family: Candara; text-align:center;line-height:1.8em;">Events including<br>Arthashastra, EnigmaProgramming, Aptitude quiz, Anime Mania</td>
																		</tr>

																	</table>
																</td>
															</tr>
														</table><!-- end feature 2 -->


													</td>
												</tr>

											</table>

										</td>
									</tr>
									
								</table>
							</td>
						</tr>
						<tr><td height="40" bgcolor="bab4b6"></td></tr>
					<!-- //approach -->
					<!-- contact -->
						<tr bgcolor="181818">
							<td>
								<table class="container" width="900" align="center" border="0" cellpadding="0" cellspacing="0">
									<table border="0" width="900" align="center" cellpadding="0" cellspacing="0" class="container-middle">

										<tr>
											<td></td>
											<td align="center" style="font-size: 2em;padding-top: 3%;padding-bottom:
											 2%;padding-left:10%;color: #FFFFFF;;letter-spacing:1px; text-align: center; font-family:Eras ITC,serif;" mc:edit="text-1">
												Contact Us
											</td>
										</tr>
										<tr><td height="10"></td></tr>
										<tr>
											<td align="left" style="font-size: 15px; color: #FFFFFF; font-weight: normal; text-align: left;padding-left: 5%; font-family:Candara" mc:edit="text-1">
												&emsp;<b>Ravi Sharnagat</b><br> &emsp;7691965202<br> &emsp;ravi@infotsav.com
											</td>
											<td align="left" style="padding-left:5%;font-size: 15px; color: #FFFFFF; font-weight: normal; text-align: left; font-family:Candara" mc:edit="text-1">
												&emsp;<b>Kriti Poddar</b><br> &emsp;9977081333<br> &emsp;kriti@infotsav.com
											</td>
											<td align="left" style="padding-left:5%;font-size: 15px; color: #FFFFFF; font-weight: normal; text-align: left; font-family:Candara" mc:edit="text-1">
											&emsp;<b>Contact</b> : contact@infotsav.com<br><a href="https://www.facebook.com/Infotsav/?fref=ts" target="_blank">
																						<!-- Place Your Social Media Icon--><img width="30" height="30"style="padding-left:5%;padding-top: 2%;" src="https://i.imgsafe.org/16de44acb6.png" alt=" " />
																					</a>
																					<a href="https://www.instagram.com/infotsav2016/" target="_blank">
													<!-- Place Your Social Media Icon--><img width="30" height="30"style="padding-top: 2%;padding-left: 16%;" src="https://i.imgsafe.org/16f5927c01.png" alt=" " />
																					</a>
																					<a href="https://www.youtube.com/channel/UC9t8LEKnMKxGB_s7Qal9uJg" target="_blank">
																	<!-- Place Your Social Media Icon--><img width="30" height="30"style="padding-top: 2%;padding-left: 16%;" src="https://i.imgsafe.org/16f565daba.jpg" alt=" " />
																					</a>


										</td>
										<!--<tr>-->
											<!--<td align="left" style="font-size: 15px; color: #FFFFFF;padding-top: 3%; font-weight: normal; text-align: left; font-family:Candara" mc:edit="text-1">-->
											<!--&emsp;<b>Kriti Poddar</b><br> &emsp;9977081333<br> &emsp;kriti@infotsav.com-->
											<!--</td>-->
										<!--</tr>-->
										</tr>

										<!--<tr>-->
										<!--<td></td>-->
										<!--<td align="center" style="font-size: 2em;padding-top: 5%; color: #FFFFFF;;letter-spacing:1px; text-align: center; font-family:Eras ITC,serif;" mc:edit="text-1">-->
										<!--<a href="https://www.facebook.com/Infotsav/?fref=ts">-->

										<!--&lt;!&ndash; Place Your Social Media Icon&ndash;&gt;-->
										<!--<img width="40" height="40" src="images/1.png" alt=" " />-->

										<!--</a>-->
										<!--</td>-->
										<!--</tr>-->
										<tr>
											<td valign="top" height="60">
											</td>
											<!--visit our website-->
										</tr>
									</table>

									<tr>
										<td height="50" style="font-size: 1px; line-height: 50px;">&nbsp;</td>
									</tr>

								<tr>
									<td>


										<!--<table class="twelve" width="270" align="left" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">-->

											<!--<tr>-->
												<!--<td align="center" style="line-height: 0px;">-->

													<!--<table class="twelve" border="0" align="left" cellpadding="0" cellspacing="0">-->

														<!--<tr>-->
															<!--<td height="4"></td>-->
														<!--</tr>-->
													<!--</table>-->

												<!--</td>-->
											<!--</tr>-->

											<!--<tr>-->
												<!--<td height="15" style="font-size: 1px; line-height: 15px;">&nbsp;</td>-->
											<!--</tr>-->

											<!--<tr>-->
												<!--<td style="font-family: Candara; font-size: 1em; color: #999999; line-height: 1.8em;" data-size="Contact Text" data-color="Contact Text">-->
													<!--&lt;!&ndash; Edit About Text &ndash;&gt;-->


												<!--</td>-->
											<!--</tr>-->


											<!--<tr>-->
												<!--<td height="24" style="font-size: 1px; line-height: 24;">&nbsp;</td>-->
											<!--</tr>-->


											<!--<tr>-->
												<!--<td align="center" style="line-height: 0px;">-->

													<!--<table class="twelve" width="75" border="0" align="left" cellpadding="0" cellspacing="0">-->

														<!--<tr>-->
															<!--<td align="center">-->
																<!--<table border="0" align="center" cellpadding="0" cellspacing="0">-->

																	<!--<tr>-->
																		<!--<td>-->

																			<!--&lt;!&ndash; Place URL to Social Media &ndash;&gt;-->
																			<!--<a href="https://www.facebook.com/Infotsav/?fref=ts">-->

																				<!--&lt;!&ndash; Place Your Social Media Icon&ndash;&gt;-->
																				<!--<img width="40" height="40" src="images/1.png" alt=" " />-->

																			<!--</a>-->

																		<!--</td>-->
																		<!--<td>-->
																			<!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>-->
																	<!--</tr>-->

																<!--</table>-->
															<!--</td>-->
														<!--</tr>-->

													<!--</table>-->
												<!--</td>-->
											<!--</tr>-->


										<!--</table>-->

										<!-- SPACE -->
										<!--<table class="twelve" width="1" align="left" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">-->

											<!--<tr>-->
											<!--<td width="1" height="40" style="font-size: 40px; line-height: 40px;"></td>-->
											<!--</tr>-->

											<!--</table>-->
											<!--&lt;!&ndash; END SPACE &ndash;&gt;-->

											<!--<table class="twelve" width="250" align="right" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">-->


											<!--<tr>-->
											<!--<td style="font-family: Eras ITC,serif; font-size:1.5em; color:#FFFFFF;">-->
											<!--&lt;!&ndash; Edit Title&ndash;&gt;-->
											<!--Contact Us-->

											<!--</td>-->
											<!--</tr>-->

											<!--<tr>-->
											<!--<td height="15" style="font-size: 1px; line-height: 15px;">&nbsp;</td>-->
											<!--</tr>-->

											<!--<tr>-->
											<!--<td style="font-family: Candara; font-size: 1em; color: #ffffff; line-height:2em;">-->
											<!--&lt;!&ndash; Edit Text &ndash;&gt;-->

											<!--</td>-->
											<!--</tr>-->

											<!--<tr>-->
											<!--<td style="font-family: Candara; font-size: 1em; color: #999999; line-height:2em;">-->
											<!--&lt;!&ndash; Edit Text &ndash;&gt;-->
											<!--<b>Ravi Sharnagat</b></b><br>-->
											<!--&emsp;&emsp;&emsp;7691965202<br>-->
											<!--&emsp;&emsp;&emsp;ravi@infotsav.com-->

											<!--</td>-->
											<!--</tr>-->

											<!--<tr>-->
											<!--<td style="font-family: Candara; font-size: 1em; color: #999999; line-height:2em;width: ">-->
											<!--&lt;!&ndash; Edit Text &ndash;&gt;-->
											<!--<b>Shubhankar Mohan</b><br>-->
											<!--&emsp;&emsp;&emsp;7417222635<br>-->
											<!--&emsp;&emsp;&emsp;shubhankar@infotsav.com-->

											<!--</td>-->
											<!--</tr>-->
											<!--<tr>-->
											<!--<td style="font-family: Candara; font-size: 1em; color: #999999; line-height:2em;">-->
											<!--&lt;!&ndash; Edit Text &ndash;&gt;-->
											<!--<b>Kriti Poddar</b><br>-->
											<!--&emsp;&emsp;&emsp;9977081333<br>-->
											<!--&emsp;&emsp;&emsp;kriti@infotsav.com-->


											<!--</td>-->
											<!--</tr>-->

											<!--<tr>-->
											<!--<td style="font-family: Candara; font-size: 1em; color: #ffffff; line-height:2em;">-->
											<!--&lt;!&ndash; Edit Text &ndash;&gt;-->
											<!--Email :-->

											<!--</td>-->
											<!--</tr>-->

											<!--<tr>-->
											<!--<td style="font-family: Candara; font-size: 1em; color: #999999;line-height:2em;">-->

											<!--&lt;!&ndash; Edit Text &ndash;&gt;-->
											<!--contact@infotsav.com-->

											<!--</td>-->
											<!--</tr>-->


											<!--</table>-->

									</td>
								</tr>

								<tr>
									<td height="50" style="font-size: 1px; line-height: 50px;">&nbsp;</td>
								</tr>


							</table>
							</td>
						</tr>
						<tr>
							<td align="center" bgcolor="#202020" data-bgcolor="Footer BG">

								<!--<table width="560" border="0" align="center" cellpadding="0" cellspacing="0" class="container">-->

									<!--<tr>-->
										<!--<td height="10" style="font-size: 1px; line-height: 10px;">&nbsp;</td>-->
									<!--</tr>-->

									<!--<tr>-->
										<!--<td>-->

											<!--<table class="twelve" width="350" border="0" align="left" cellpadding="0" cellspacing="0">-->
												<!--<tr>-->
													<!--<td style="font-family: Candara; font-size: 1em; color: #999999; line-height: 24px;"class="editable">-->

														<!--&lt;!&ndash; Edit Copyright Text &ndash;&gt;-->



													<!--</td>-->
												<!--</tr>-->
											<!--</table>-->

											<!--&lt;!&ndash; SPACE &ndash;&gt;-->
											<!--<table width="1" height="10" border="0" cellpadding="0" cellspacing="0" align="left">-->
												<!--<tr>-->
													<!--<td height="10" style="font-size: 0;line-height: 0;border-collapse: collapse;padding-left: 24px;">-->
														<!--&nbsp;-->
													<!--</td>-->
												<!--</tr>-->
											<!--</table>-->
											<!--&lt;!&ndash; END SPACE &ndash;&gt;-->

											<!--&lt;!&ndash;<table class="twelve" width="180" border="0" align="right" cellpadding="0" cellspacing="0">&ndash;&gt;-->
												<!--&lt;!&ndash;<tr>&ndash;&gt;-->
													<!--&lt;!&ndash;<td style="font-family: Candara; font-size: 1em; color: #999999; line-height: 24px;">&ndash;&gt;-->


													<!--&lt;!&ndash;</td>&ndash;&gt;-->
												<!--&lt;!&ndash;</tr>&ndash;&gt;-->
											<!--&lt;!&ndash;</table>&ndash;&gt;-->

										<!--</td>-->
									<!--</tr>-->

									<!--<tr>-->
										<!--<td height="10" style="font-size: 1px; line-height: 10px;">&nbsp;</td>-->
									<!--</tr>-->

								<!--</table>-->

							</td>
						</tr>
					<!-- //contact -->
				</table>
				 <tr bgcolor="#eeeeee"><td height="35"></td></tr>
			</td>
		</tr>
	</table>
</body>
</html>';


   $mail->Subject    = "Infotsav'16";
   $mail->AltBody = "This is the body in plain text for non-HTML mail clients";
   if(!$mail->Send())
   {
       echo $result['email'].'<br>';
       echo "Sender ".$s[$i]."<br>";
      echo "Message could not be sent. <p>";
      echo "Mailer Error: " . $mail->ErrorInfo;
      echo "<br>";
     // exit;
   }
   else 
      echo 'send<br>';



}

     
    $result = $query->fetch(PDO::FETCH_ASSOC);

}


?>
