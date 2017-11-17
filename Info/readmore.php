<?php
session_start();
$i=(int)$_GET['id'];
$jk = $i;
$db = new PDO('mysql:host=localhost;dbname=infotsav','root','');
$s4 = "SELECT * FROM eventdetails WHERE id= ?";
$qu = $db->prepare($s4);
$qu->bindParam(1,$jk);
$qu->execute();
$row = $qu->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE HTML>
<html style="color: white;" xmlns="http://www.w3.org/1999/html">
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
    <script>
//      function showResult(str, id) {
//        if (str.length<=3) {
//          document.getElementById(id).innerHTML="";
//          document.getElementById(id).style.border="0px";
//          return;
//        }
//        if (window.XMLHttpRequest) {
//          xmlhttp=new XMLHttpRequest();
//        } else {
//          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
//        }
//        console.log(str);
//        if(xmlhttp.readyState == 0 || xmlhttp.readyState == 4)
//        {
//          str = encodeURIComponent(str)
//          xmlhttp.open("GET","livesearch.php?search="+str,true);
//          xmlhttp.onreadystatechange=function() {
//            if (this.readyState==4 && this.status==200) {
//              document.getElementById(id).innerHTML=this.responseText;
//              document.getElementById(id).style.border="1px solid #A5ACB2";
//            }
//          }
//          xmlhttp.send();
//        }
//      }
        function span()
            {window.history.go(-1);
      }
      </script>
    </head>
    <body >

    <div style="background: url(img/<?php echo $EVENTLIST->EVENT[$i]->BACKGROUND;?>);background-repeat: repeat;background-size: cover;width: 100%;height: 100%;position: fixed;top: 0;background-attachment: scroll;overflow-x: hidden;overflow-y: auto;">

      <div style="padding-left: 6%;">
      <?php if ($i<8) { ?>
        <a href = "technicalnew.php"><span  class="glyphicon glyphicon-remove" style="color: white;font-size: 250%;font-weight: 500;margin-left: 94%;margin-top: 2%; cursor:pointer;"></span></a>
      <?php }
      elseif($i >= 8 && $i <=12)
        {?>
          <a href = "managerialnew.php"><span  class="glyphicon glyphicon-remove" style="color: white;font-size: 250%;font-weight: 500;margin-left: 94%;margin-top: 2%; cursor:pointer;"></span></a>
           <?php }
           elseif ($i>=13 && $i <= 16) {
            ?>
            <a href = "onlinenew.php"><span  class="glyphicon glyphicon-remove" style="color: white;font-size: 250%;font-weight: 500;margin-left: 94%;margin-top: 2%; cursor:pointer;"></span></a>
          <?php
        }elseif ($i>=17 && $i<=17) {
          ?>
          <a href = "gamiacsnew.php"><span  class="glyphicon glyphicon-remove" style="color: white;font-size: 250%;font-weight: 500;margin-left: 94%;margin-top: 2%; cursor:pointer;"></span></a>
      <?php
    }elseif ($i>=18 && $i<=21) {
      ?>
      <a href = "robonew.php"><span  class="glyphicon glyphicon-remove" style="color: white;font-size: 250%;font-weight: 500;margin-left: 94%;margin-top: 2%; cursor:pointer;"></span></a>
      <?php
    }else{
      ?>
      <a href = "quiznew.php"><span  class="glyphicon glyphicon-remove" style="color: white;font-size: 250%;font-weight: 500;margin-left: 94%;margin-top: 2%; cursor:pointer;"></span></a>  
  <?php
    } ?>

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
  <?php if ($EVENTLIST->EVENT[$i]->TITLE != "Techathlon")  {?>
    <center>
        <?php 
                      if(isset($_SESSION['user']) && !empty($_SESSION['user']))
                        echo '<a href="#openModal"><button style="border: 1px solid white ; font-size: 26px; font-family: test;">Register</button></a>';
                      else
                        echo '<a href="#"><button style="border: 1px solid white ; font-size: 26px; font-family: test;">Please Log In To Register.</button></a>';
                   ?>
    <!-- <button style="border: 1px solid white ; font-size: 26px; font-family: test;">Register</button> -->
    </center>
    <!-- <button style="border: 1px solid white ; font-size: 26px; font-family: test;">Register</button></a></center> -->

    <div id="openModal" class="modalDialog">
      <div> <a href="#close" title="Close" class="close" style="color: blue;background-color: white;font-size: 200%;">X</a>
        <div style="background-color: white;padding: 8%;padding-top: 3%;">
        <center><h2 style="padding-bottom: 2%;font-weight: bold">Register here</h2></center>

          <form method="post" action="../regevents.php" class="form-horizontal" id="form" style="margin-top:30px;margin-left:20%;font-size: 120%;font-family: test;">
            <div class="form-group">
              <label for="name" class="col-sm-2 control-label">Team Name</label>
              <div class="col-xs-8">
                <input type="text" class="form-control" id="name" name="tname" placeholder="Enter name" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="name" class="col-sm-2 control-label">Member 1 Email</label>
              <div class="col-xs-8">
                <input type="email" class="form-control" id="name" name="1" placeholder="Enter email" required="required">
              </div>
            </div>
            <?php
              for($j=1; $j<$row['maxmembers']; $j++){
            ?>
            <div class="form-group">
              <label for="name" class="col-sm-2 control-label">Member <?php echo $j+1; ?> Email </label>
              <div class="col-xs-8">
                <input type="email" class="form-control" id="name" name="<?php echo $j+1; ?>" placeholder="Enter email" onkeyup="//showResult(this.value, 'livesearch_<?php echo $j+1; ?>')">
                <div id="<?php echo 'livesearch_'.($j+1); ?>" onclick=""></div>
              </div>
            </div>
            <?php } ?>
            <input type="hidden" value="<?php echo $i; ?>" name="eid" >
<!--            <div class="form-group">-->
<!--              <label for="inputRollNo" class="col-sm-2 control-label">Roll No</label>-->
<!--              <div class="col-xs-8">-->
<!--                <input type="text" class="form-control" id="inputRollNo" placeholder="Roll No" required="required">-->
<!--              </div>-->
<!--            </div>-->
<!--            <div class="form-group">-->
<!--              <label for="inputPassword" class="col-sm-2 control-label">Password</label>-->
<!--              <div class="col-xs-8">-->
<!--                <input type="password" class="form-control" id="inputPassword" placeholder="Password">-->
<!--              </div>-->
<!--            </div>-->
<!--            <div class="form-group">-->
<!--              <label for="confirmPassword" class="col-sm-2 control-label">Confirm Password</label>-->
<!--              <div class="col-xs-8">-->
<!--                <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password"><span id="pass"></span>-->
<!--              </div>-->
<!--            </div>-->
              <div class="form-group" style="margin-top:40px;margin-left:65px;">
                <div style="padding-left: 20%;">
                   <button type="submit" class="btn btn-primary" id="button" >Register</button>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
    <?php }?>
    <div>


    </body>


    </html>
