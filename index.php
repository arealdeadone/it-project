<?php
	require_once 'core/init.php';
	$user = new User();
	if($user->isLoggedIn()){
		if(Input::exists('get')&&isset($_GET['updatescore'])){
			$x = Input::get('px');
			$y = Input::get('py');
			$db = DB::getInstance();
			$row = $db->get("coords", array('id', '=', 1))->first();
			$obj = (object) array('x' => $x, 'y' => $y);

			$where = array('user_id', '=', $user->data()->id);
			$updRecord = $db->get('user_score',$where)->first();
			$updData = array('score' => $updRecord->score+1);

			//print_r($updData);

			if(isset($_GET['main'])){
				if(in_array($obj,json_decode($row->coordinates)))
					$db->update('user_score',$updRecord->id,$updData);
			}
			elseif(isset($_GET['side']))
			{
				$res = '[';
				$res .= $row->coordside1.',';
				$res .= $row->coordside2.',';
				$res .= $row->coordside3.',';
				$res .= $row->coordside4.',';
				$res .= $row->coordside5.',';
				$res .= $row->coordside6.']';

				for($i=0; $i<count(json_decode($res)); $i++) {
					if(in_array($obj,json_decode($res)[$i]))
					{
						if(!$db->update('user_score',$updRecord->id,$updData))
							die($db->error());
					}

				}

			}

			header('Content-Type: application/json');
			echo json_encode(array('status' => 'success', 'message' => 'Success'));
			die();
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
  	<title>Infotsav'16 | ABV IIITM</title>
	<meta name="description" content="Infotsav Annual Techno-Managerial Fest ABV IIITM">
	<meta name="keywords" content="Infotsav, ABV IIITM, techfest, Techno, Managerial, Techno-Managerial, Events, Coding, Robofiesta, Robotics, Qiuz">
	<meta property="og:image" content="shareImg.jpg" />

	<link rel="SHORTCUT ICON" href="favicon.png">


  <!-- Styles -->
	<!--<link href="http://fonts.googleapis.com/css?family=Lekton" rel="stylesheet" type="text/css">-->
	<!--<link href="http://fonts.googleapis.com/css?family=Molengo" rel="stylesheet" type="text/css">-->
  	<link type="text/css" rel="stylesheet" href="css/reset.css" />
	<?php
		if($user->isLoggedIn())
		{
			echo '<link type="text/css" rel="stylesheet" href="css/style_login.css" />';
			echo ($user->data()->avtar == 1)?'<link type="text/css" rel="stylesheet" href="css/ash.css" />' : '<link type="text/css" rel="stylesheet" href="css/misty.css" />';
		}
		else
  			echo '<link type="text/css" rel="stylesheet" href="css/style.css" />'
	?>
	<!-- Scripts -->
	<script type="'text/javascript'">
	(function(){

	  var _z = console;
	  Object.defineProperty( window, "console", {
			get : function(){
				if( _z._commandLineAPI ){
				throw "Sorry, Can't execute scripts!";
					  }
				return _z;
			},
			set : function(val){
				_z = val;
			}
	  });

	})();
</script>

	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-51785381-2', 'auto');
		ga('send', 'pageview');

	</script>
	<script src="scripts/jquery-1.6.3.min.js" type="text/javascript"></script>
	<script src="scripts/jquery.spritely-0.6.js" type="text/javascript"></script>

	<link rel="stylesheet" href="css/sweetalert.css" />
	<script src="scripts/sweetalert.min.js"></script>
	<script src="scripts/encrypt.min.js"></script>

	<script src="scripts/jquery.nicescroll.js"></script>
	<script src="scripts/data.js" type="text/javascript"></script>
	<?php
		if($user->isLoggedIn())
		{
			echo '<script src="scripts/spawnPokemon.js" type="text/javascript"></script>';
			echo '<script src="scripts/game_play.js" type="text/javascript"></script>';
		}
		else
			echo '<script src="scripts/game.js" type="text/javascript"></script>';

		if(Session::exists('home')){
			echo '<script>swal("Oh Yeah!","'.Session::flash('home').'","success")</script>';
		}
	?>

  <!--[if lt IE 9]>
		<script type="text/javascript">
			window.location = 'ie.html';
		</script>
	<![endif]-->
	<script type="text/javascript">



		$(document).ready(function(){
			$("html").niceScroll();
		});
		$(document).ready(function(){
			$("#lightbox").niceScroll();
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#innerLoading .me').sprite({fps: 12, no_of_frames: 4}).spState(1);
			var game = new Game();
		});
		</script>

	<style>
    		@font-face{
	font-family: newbold;
	src:url(cuyabrabold.otf);
}
    	</style>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#innerLoading .me').sprite({fps: 12, no_of_frames: 4}).spState(1);
			var game = new Game();
		});


		function startGame() {
			$('html, body').animate({scrollTop: 0});
			$('#loadingGame').fadeOut('fast', function(){
				$(this).remove();
			})
		}
	</script>

</head>
<body onload="startGame(); <?php if($user->isLoggedIn() && !Session::exists('spawned')) { echo 'getdata();'; Session::put('spawned',true);} ?>">
<!--	<audio autoplay="autoplay" src="audio/aud.mp3" id="music">-->
<!--		<embed src="audio/aud.mp3" hidden="true" loop="false" autostart="true" height="0" width="0" style="z-index: -99; display: ;"></embed>-->
<!--	</audio>-->
	<!-- Facebook like
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=1575460229415952";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script> -->


	<!-- Loader -->
	<div id="loadingGame">
		<div id="innerLoading">
			<div class="me"></div>
			<h1 style="font-size:200%;top:10%;line-height: 100%; ">WELCOME TO INFOTSAV 2016</h1>
			<p>Just a few moments</p>
			<span>Don't go anywhere...</span>
		</div>
	</div>

	<!-- Navigation -->
	<nav>
		<ul class="clearfix">
			<li><a class="current" href="#startCave">Home</a></li>
			<li><a href="#aboutHouse">Events</a></li>
			<li><a href="#servicesHouse">Workshops</a></li>
			<li><a href="#portfolioHouse">Gallery</a></li>
			<li><a href="#sponsorsHouse">Sponsors</a></li>
			<li><a href="#techHouse">Contact Us</a></li>
			<li><a href="#abinfotsavHouse">Accomodation</a></li>
			<?php
				if($user->isLoggedIn())
				{
					echo '<li><a href="#logout">Logout</a></li>';
					echo '<li><a href="#login"> || Welcome '.$user->data()->name." ||</a></li>";
				}
				else
					echo '<li><a href="#login">Login/Register</a></li>';
			?>
			<!-- <li><a href="" onclick="document.getElementById('music').Pause">Pause Music</a></li> -->
			<li class="last"><a href="#howToPlay">?</a></li>
		</ul>
	</nav>

	<!-- Notifications Manager -->
	<div id="notifications"><div class="inner"></div><span class="close">x</span></div>

	<div id="share">
		<div class="fb-like" data-href="https://www.facebook.com/Infotsav/" data-layout="box_count" data-action="like" data-width="50" data-show-faces="false" data-font="lucida grande" data-share="true"></div>
		<?php
			if($user->isLoggedIn())
			{
		?>
			<script>
				$.ajax({
					url: "leaderboard.php?api",
					type: "get",
					datatype: "json",
					success: function(data){

						try{

							//alert("x");
							console.log(data);
							var data=JSON.parse(data);
							console.log(data);
							$("#pos").html('Position: '+data.pos);
							console.log(data.pos);
							$("#score").text("Score: "+data.score);
						}catch(e){
							$("#pos").html('Position: '+data.pos);
							console.log(data.pos);
							$("#score").text("Score: "+data.score);
						}


					}
				});
				setInterval(function(){
					$.ajax({
					url: "leaderboard.php?api",
					type: "get",
					datatype: "json",
					success: function(data){

						try{
							var data=JSON.parse(data);
							$("#pos").html('Position: '+data.pos);
							console.log(data.pos);
							$("#score").text("Score: "+data.score);
						}catch(e){
							$("#pos").html('Position: '+data.pos);
							console.log(data.pos);
							$("#score").text("Score: "+data.score);
						}
					}
				})},

					12000);
			</script>
				<a href="leaderboard.php" target="_blank">
			<div id="lbscore">
				<p>Leaderboard</p>
				<p id="pos"></p>
				<p id="score"></p>
			</div>
				</a>
		<?php
			}
		?>
		<!-- Add Fb like and G+ +1 button after acquiring the API
		<div class="fb-like" data-href="http://danielsternlicht.com/" data-send="false" data-layout="box_count" data-width="50" data-show-faces="false" data-font="lucida grande"></div>
		<a href="https://twitter.com/share" data-url="http://danielsternlicht.com" data-count="vertical" data-via="dsternlicht" class="twitter-share-button">Tweet</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="../platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		<div class="g-plusone" data-size="tall" data-href="http://danielsternlicht.com"></div>-->
	</div>


	<div id="wrapper">


		<!-- Main Text -->
		<hgroup id="myInfo">
			<h3>ABV Indian Institute of Information Technology and Management</h3>
			<h2> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;Presents</h2>
			<h1>INFOTSAV'16</h1>
			<h2> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;( 12 - 13 November 2016 )</h2>
			<!-- <h2> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;of ABV IIITM</h2> -->
		</hgroup>

		<!-- Start Text -->
		<p id="startText">
			<img src="images/keyboardArrows.png" alt="keyboard arrows" />
			Start playing by using <br />the keyboard arrows
		</p>

		<!-- Start Cave -->

		<div id="startCave" class="cave"></div>
		<div id="startCaveHole" class="caveHole"></div>
		<div id="startCaveHoleTrack" class="caveHoleTrack"></div>


		<!-- Main Road -->
		<div id="mainRoad" class="road">
		</div>
		<div id="leftFence"></div>
		<div id="rightFence"></div>

		<!-- Player -->
		<div id='player'></div>

		<!-- Stop Station 1 -->
		<div id="aboutRoad" class="road side">


		</div>
		<div id="aboutHouse" class="house">
			<div class="door"></div>
			<div class="lightbox">
				<div class="inner portfolio clearfix" style="color: black;">
					<center><h2 style="color:white;">EVENTS</h2></center>
					<div class="portfolioBox">
						<div class="inner">
							<a class="portfolioImg" href="Info/technicalnew.php" target="_blank">
								<img src="images/events/appStudio.png" alt="Technical Events" />
							</a>

							<h4 style="font-size:200%;"><strong>Technical Events</strong></h4>

							<p></p>
						</div>
					</div>
					<div class="portfolioBox">
						<div class="inner">
							<a class="portfolioImg" href="Info/managerialnew.php" target="_blank">
								<img src="images/events/manage.png" alt="Managerial Events" />
							</a>

							<h4 style="font-size:200%;"><strong>Managerial Events</strong></h4>
							<p></p>
						</div>
					</div>
					<div class="portfolioBox">
						<div class="inner">
							<a class="portfolioImg" href="Info/onlinenew.php" target="_blank">
								<img src="images/events/simulation.jpg" alt="Simulation Events" />
							</a>

							<h4 style="font-size:200%;"><strong>Online Events</strong></h4>
							<p></p>
						</div>
					</div>
					<div class="portfolioBox">
						<div class="inner">
							<a class="portfolioImg" href="Info/gamiacsnew.php" target="_blank">
								<img src="images/events/Gamiacs.png" alt="Gamiacs" />
							</a>
							<h4 style="font-size:200%;"><strong>Gamiacs</strong></h4>
							<p></p>
						</div>
					</div>
					<div class="portfolioBox">
						<div class="inner">
							<a class="portfolioImg" href="Info/robonew.php" target="_blank">
								<img src="images/events/robos.png" alt="Robofiesta" />
							</a>

							<h4 style="font-size:200%;"><strong>Robofiesta</strong></h4>

							<p></p>
						</div>
					</div>
					<div class="portfolioBox">
						<div class="inner">
							<a class="portfolioImg" href="Info/quiznew.php" target="_blank">
								<img src="images/events/quiz.png" alt="Quiz" />
							</a>
							<h4 style="font-size:200%;"><strong>Quiz</strong></h4>
							<p></p>
						</div>
					</div>
					<div class="shelf"></div>
					<div class="shelf bottom"></div>
				</div>
			</div>
		</div>
		<div id="aboutSign" class="sign"><span>EVENTS</span></div>
		<div id="aboutHole" class="hole"></div>

		<!-- Stop Station 2 -->
		<div id="servicesRoad" class="road side">
		</div>
		<div id="servicesHouse" class="house">
			<div class="door"></div>
			<div class="lightbox">
				<div class="inner services">

					<h2 style="text-align: center;">...Workshops...</h2>
						<div><!-- <br><br><center style="font-size:150%;">Coming Soon....</center> -->
							<section class="left" style="font-family: newbold;font-size:150%">


								<h4 class="">Bluetooth Robotics</h4>
								<div class="">
								Bluetooth Robotics Workshop mainly focuses on the students eager to learn Robotics from Basic. HC-05 / HC-06 based Bluetooth Controlled Robot works in heeding with the commands sent from Android based Smart Phone using a Developed Android Application and Bluetooth Technology. This workshop helps participants to understand the designing concepts and use of microcontrollers, serial communication and microcontroller programming in Embedded 'C' language.
								The duration of this workshop will be two consecutive days, with eight hours session each day in a total of sixteen hours, properly divided into theory and hand on practical sessions. At the end of this workshop, a competition will be organized among the participating students where each participating student will get Certificate of Participation and the Winners will get Certificate of Merit <br>Registration fee is Rs. 1000/-
								<!-- <a href="#">Read more</a> -->
								</div>
								<br/><br/>
								<h4 class="">Network & and cyber security</h4>
								<div class="">
								BrainTech Network & Cyber Security Championship is an Azure Skynet Solutions Pvt. Ltd. initiative that focuses on guiding students in their quest for a prime level of technical education. It offers high caliber training programs while enrolling participants under 2 levels of evaluation process. Under this stratagem, participants are assessed on theoretical & practical grounds & so are titled as Championship Holders. A scholarship worth Rs. 1 Lac is awarded at the Grand Finale of this program.  <br>Registration fee is Rs.900/-
								<!-- <a href="#">Read more</a> -->
								</div>
								<br/><br/>
								<!-- <h4 class="">How to built your own website</h4>
								<div class="">
								"You're committing to search for one of the rare ideas that generates rapid growth" - Paul Graham. An Entrepreneur starting a startup is committing to solve a harder type of problem than ordinary businesses do. For all those budding Entrepreneur we present our workshop on 'How To Build your own Startup'.Registration fee is Rs.600/- The workshop will be conducted by an eminent entrepreneur Ronak Dhoot - CTO & Co-founder Geek Shastra.
								<!-- <a href="#">Read more</a> -->
								<!-- </div> -->
							</section>
							<section class="right">
								<center>
								<br/><br/><br/>
								<img src="images/blue.jpg" class="ws1"><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
								<img src="images/cyber.jpg" class="ws2"><br/><br/><br/>
								<!-- <img src="images/ws3.jpg" class="ws3"> -->
								</center>

							</section>
						</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
		<div id="servicesSign" class="sign"><span>Workshops</span></div>
		<div id="servicesHole" class="hole"></div>
		<!-- Stop Station 3 -->
		<div id="portfolioRoad" class="road side"></div>

		<div id="portfolioHouse" class="house">
			<div class="door"></div>
			<div class="lightbox">
				<iframe src="imagegallery/imagegallery.html" height="90%" width="100%"></iframe>
			</div>
		</div>
		<div id="portfolioSign" class="sign"><span>Image Gallery</span></div>
		<div id="portfolioHole" class="hole"></div>

		<!-- Stop station 4 -->
		<div id="sponsorsRoad" class="road side">
		</div>
		<div id="sponsorsHouse" class="house">
			<div class="door"></div>
			<div class="lightbox">
				<div class="inner sponsors clearfix">
					<center><h2>SPONSORS</h2></center>
					<div>
						<center><!-- <img src="images/sponsors.new.jpg" width="900px" height="900px" class="sponsorPic"> -->
						COMING SOON...</center>
					</div>
				</div>
			</div>
		</div>
		<div id="sponsorsSign" class="sign"><span>Sponsors</span><</div>
		<div id="sponsorsHole" class="hole"></div>

		<!-- Stop station 5 -->
		<div id="techRoad" class="road side">


		</div>
		<div id="techHouse" class="house">
			<div class="door"></div>
			<div class="lightbox">
			<div class="inner abinfotsav clearfix">
                <h2><center><pre>Contact us</pre></center></h2>
                <section>
                    <center>For any queries regarding INFOTSAV 2016, contact us at:-<br><br></center>
						<center>
														<table>
                            <form method="post" class="contactForm" action="http://www.aasf.in/mailer/mailer.php">
															<tr>
															<td>Name :</td><td><input type="text" name="conname"></td>
															</tr>
															<tr>
                                <td>E-mail : </td><td><input type="email" name="conemail"></td>
															</tr>
															<tr>
                                <td>Contact:</td><td><input type="text" name="feedcontact"></td>
															</tr>
															<tr></tr>
															<tr>
                                <td>Queries:</td><td><textarea name="queries" rows="6" cols="40" ></textarea></td>
															</tr>
															<tr>
								<td colspan="2"><center><button style="height:30px;width: 90px;" class="btn btn-success" name="submit" type="submit">Submit</button></center></td>
							</tr>
							<tr>
                  <td colspan="2">          	<center><a href="contacts/newcontacts.html" target="_blank"><strong>OUR TEAM</a></center></td>
									</tr>
							</form>
						</table>
						</center>
                </section>
            </div>
			</div>
		</div>
		<div id="techSign" class="sign"><span>Contact Us</span></div>
		<div id="techHole" class="hole"></div>

		<!-- Stop station 6 -->

		<div id="abinfotsavRoad" class="road side"></div>
		<div id="abinfotsavHouse" class="house">
			<div class="door"></div>
			<div class="lightbox">
				<div class="inner abinfotsav clearfix">
					<h2><center><pre>Accomodation & Fooding</pre></center></h2>
					<section>
						<table style="font-family: newbold;font-size:80%;">
							<tr style="font-family: newbold;">
								<td><b><u>Accommodation:-</u></b></td>

								<td>Hostel: Rs. 200 for 3 days <br>
								International Visitors Hostel: Rs. 250 per day for 2 person + Rs. 100 per day per extra person *<br>
								MDP: Rs. 750 per day for two person + Rs. 250 per day per extra person*</td>

							</tr>


							<tr style="font-family: newbold;">
							 	<td><b><u>Fooding:-</u></b></td>
								<td>Rs. 100 per person per day<br>
								Rs. 200 per person per day (only lunch and dinner)
								</td>
							</tr>
							<tr style="font-family: newbold;">
							 	<td><b><u>Security:- </u></b>
								</td>
								<td>For hostel and visitor hostel: Rs. 100<br>
								For MDP : Rs. 300
								</td>
							</tr>
							<tr style="font-family: newbold;">
							 	<td><b><u> Facilities:-</u> </b>
								</td>
								<td>Free wifi facilities<br>
								Free transportation<br>
								Free pass for the DJ Night
								</td>
							</tr>

						</table>
					</section>
				</div>
			</div>
		</div>
		<div id="abinfotsavSign" class="sign"><span>About Us</span><</div>
		<div id="abinfotsavHole" class="hole"></div>

		<!-- View -->
		<div id="rightTrees" class="trees"></div>
		<div id="leftGrass" class="grass"></div>

		<!-- End Cave -->
		<div id="endSea" class="sea"></div>
		<div id="endBridge" class="bridge"></div>
		<!-- <div id="endCaveHoleGlow"></div> -->
		<div id="boat" class="isMoored">
			<div class="meSail"></div>
		</div>
		<!-- <div id="contact">
			<h1>Web Credits</h1>
			<p>
				<a href="https://www.linkedin.com/in/arvind-rachuri-37a700105" target="_blank"> Arvind Rachuri </a>|
				<a href="https://www.linkedin.com/in/pranjal-kumar-48bb82124" target="_blank"> Pranjal Kumar </a>|
				<a href="https://www.facebook.com/aayush.choudhry" target="_blank">Aayush Choudhry</a>
			</p>
		</div> -->

		<!-- Flowers -->
		<div class="flowers r1"></div>
		<div class="flowers r2"></div>
		<div class="flowers r3"></div>
		<div class="flowers r4"></div>
		<div class="flowers r5"></div>
		<div class="flowers r6"></div>
		<div class="flowers r7"></div>
		<div class="flowers r8"></div>
		<div class="flowers r9"></div>
		<div class="flowers r10"></div>
		<div class="flowers r11"></div>
		<div class="flowers r12"></div>
		<div class="flowers r13"></div>
		<div class="flowers r14"></div>
		<div class="flowers r15"></div>


	</div>

	<div id="howToPlay">
		<div class="lightbox">
			<div class="inner howtoplay">
				<h2>How To Play?</h2>
				<article style="font-size:200%;">
					<div id="htpArrows" class="box clearfix">
						<div class="icon"></div>
						<p>Move by using the keyboard arrows. To move the character faster hold down the Shift key.To play the game please login</p>
					</div>
					<div id="htpHouses" class="box clearfix">
						<div class="icon"></div>
						<p>Enter houses to get some information about Infotsav'16.</p>
					</div>
					<div id="htpMouse" class="box clearfix">
						<div class="icon"></div>
						<p>Teleport yourself directly to a specific point in the portfolio by left click</p>
					</div>
					<div id="htpEsc" class="box clearfix">
						<div class="icon"></div>
						<p>Press the "Esc" key to leave buildings and close the notifications bar.

						</p>
					</div>
					<div id="htpShare" class="box clearfix">
						<div class="icon"></div>
						<p>Participate In Infotsav and win prize worth  Rs.400,000</p>
					</div>
      	</article>
			</div>
		</div>
	</div>

<img src="images/wood.png" style="display: none;" />

</body>
</html>
