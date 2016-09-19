<?php 
$i=(int)$_GET['id'];
?>
<!DOCTYPE HTML>
<html style="color: white;">
	<head>
		<title>
		<?php
		
          $xml = file_get_contents('events.xml');
          $EVENTLIST = new SimpleXMLElement($xml);
          echo $EVENTLIST->EVENT[$i]->TITLE;?> | Infotsav'16 </title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="SHORTCUT ICON" href="../favicon.png">
 	    <script src="js/jquery.min.js"></script>
    	<script src="js/bootstrap.min.js"></script>
    	<style type="text/css"></style>
      <style>
        @font-face{
  font-family: test;
  src:url(college.otf);
}
      </style>
      <script >
      	function span()
      			{window.history.go(-1);
      }
      </script>
    </head>
    <body >
    
    <div style="background: url(img/<?php echo $EVENTLIST->EVENT[$i]->BACKGROUND;?>);background-repeat: repeat;background-size: cover;width: 100%;height: 100%;position: fixed;top: 0;background-attachment: scroll;overflow-x: hidden;overflow-y: auto;">

    	<div style="padding-left: 6%;">
      <?php if ($i<=8) { ?>
      <span onclick="span()" class="glyphicon glyphicon-remove" style="color: white;font-size: 250%;font-weight: 500;margin-left: 94%;margin-top: 2%; cursor:pointer;"></span>
      <?php }
      else
        {?>
           <a href = "technicalnew.php"><span  class="glyphicon glyphicon-remove" style="color: white;font-size: 250%;font-weight: 500;margin-left: 94%;margin-top: 2%; cursor:pointer;"></span></a>
           <?php } ?>
    	<h2 style="font-family: farray;margin-bottom: 5%;font-size:400%;color: white;"><center>
    	<?php
          //$xml = file_get_contents('events.xml');
          //$EVENTLIST = new SimpleXMLElement($xml);
          echo $EVENTLIST->EVENT[$i]->TITLE;?></center></h2>
          <?//php echo  1;?> 
    	<div style="margin-bottom: 5%;"><span style="color:white;font-size:250%;font-weight:500;padding: 2%;font-family: test;"><center>DESCRIPTION</center></span>
    	<span style="font-size: 1.6em;color: white;font-family: new;font-weight: normal;"><?php  echo $EVENTLIST->EVENT[$i]->DESCRIPTION; ?></span>
    	</div>
    	<div style="margin-bottom: 5%;"><span style="color:white;font-size:250%;font-weight:500;padding: 2%;font-family: test;"><center>RULES</center></span>
    	<span style="font-size: 1.6em;color: white;font-family: new;font-weight: normal;"><?php  echo $EVENTLIST->EVENT[$i]->RULES; ?></span>
    	</div>
    	<div style="margin-bottom: 5%;"><span style="color:white;font-size:250%;font-weight:500;padding: 2%;font-family: test;"><center>TIMELINE</center></span>
    	<span style="font-size: 1.6em;color: white;font-family: new;font-weight: normal;"><?php  echo $EVENTLIST->EVENT[$i]->TIMELINE; ?></span>
    	</div>
    	<div style="margin-bottom: 5%;"><span style="color:white;font-size:250%;font-weight:500;padding: 2%;font-family: test;"><center>CONTACTS</center></span>
    	<span style="font-size: 1.6em;color: white;font-family: new;font-weight: normal;"><?php  echo $EVENTLIST->EVENT[$i]->CONTACTS; ?></span>
      <center>
      <?php if ($EVENTLIST->EVENT[$i]->TITLE == "Techathlon") {?> <a target="_blank" href="https://docs.google.com/forms/d/e/1FAIpQLSeOfsXPWSWyJ168nQGUvPdNBueQSPhe9BlQ9ARyOOXzPWCgDg/viewform"><button style="border: 1px solid white ; font-size: 26px; font-family: test;">Register</button></a></center> <?php } ?>
    	</div>

    </div>
    <div>


    </body>


    </html>