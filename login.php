<?php
require_once 'core/init.php';
$user = new User();

if($user->isLoggedIn()){
  Redirect::to('index.php');
  echo '<script>window.location.href="index.php"</script>';
}
if(($username = Session::get('user')))
  Redirect::to('index.php');
if(Input::exists())
{
  if(Tokens::check(Input::get('token')))
  {
    $validate = new Validate();
    $validation = $validate->check(array(
        'email' => array('required' => true),
        'password' => array('required' => true)
    ));
    if($validation->passed())
    {
      $user->find(Input::get('email'));
      if($user->data()->active == "0")
      {
        Session::put('inactive', "Please activate your account first.");
        Redirect::to('login.php');
        echo "<script> window.location = 'login.php' </script>";
        die();
      }
      $remember = Input::get('remember');
      print_r($remember);
      $login = $user->login(Input::get('email'),Input::get('password'), $remember);
      
      if($login)
      {
        Session::put('user', Input::get('email'));

        Redirect::to('index.php');
         echo '<script>window.location.href="index.php"</script>';
      }
	else {
		$z = md5(Input::get('password'));
			
		$x = $user->data()->email;
		$y = $user->data()->password;
		if ($z == $y)
		{
		  Session::put('user',$x);
		  Redirect::to('index.php');
		
		}

	
      else
     {
        Redirect::to('login.php?error');
       echo '<script>window.location="login.php?error"</script>';
      }
}
//        echo'<script> alert( "Username - Password Combination is incorrect");</script>';
//      echo "<a href='index.php' class='btn btn-danger btn-lg'>Click here to Go Back</a>";
    }
    else
    {
      foreach($validation->errors() as $error)
      {
        echo '<h3>'.$error.'</h3>';
        echo "<a href='index.php' class='btn btn-danger btn-lg'>Click here to Go Back</a>";
      }
    }
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Infotsav'16 | ABV IIITM</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="css/iCheck/square/blue.css">
    <link rel="SHORTCUT ICON" href="favicon.png">
    <link rel="stylesheet" href="css/sweetalert.css" />
    <script src="scripts/sweetalert.min.js"></script>
    <style>
      .errorflash
      {
        margin-top: 5vh;
        width: 50%;
        position: relative;
        left: 25%;
        font-family: "Verdana";
        font-size: 2.5vh;
        color: #cc0000;
        opacity: 0.8;
      }

      .successflash
      {
        margin-top: 5vh;
        width: 75%;
        position: relative;
        left: 15%;
        font-family: "Verdana";
        font-size: 2.5vh;
        color: #00733e;
        opacity: 0.8;
      }
    </style>
    <?php
        if(Session::exists('home'))
        {
          echo "<pre class='successflash text-center'>";
            echo Session::get('home');
          echo"</pre>";
          Session::delete('home');
        }

        if(Session::exists('inactive'))
        {
          echo "<pre class='errorflash text-center'>";
            echo Session::get('inactive');
          echo"</pre>";
          Session::delete('inactive');
        }

        if(Session::exists('active'))
        {
          echo "<pre class='successflash text-center'>";
          echo Session::get('active');
          echo"</pre>";
          Session::delete('inactive');
        }
    ?>
    <style>
      @font-face {
        font-family: 'SilkscreenBold';
        src: url('fonts/slkscrb-webfont.eot');
        src: url('fonts/slkscrb-webfontd41d.eot?#iefix') format('embedded-opentype'),
        url('fonts/slkscrb-webfont.woff') format('woff'),
        url('fonts/slkscrb-webfont.ttf') format('truetype'),
        url('fonts/slkscrb-webfont.svg#SilkscreenBold') format('svg');
        font-weight: normal;
        font-style: normal;

      }
      body, .login-page {
        background: url("images/bgnl.jpg") no-repeat;
        background-size: cover;
      }

      .login-box
      {
        width: 35%;
        min-height: 400px;
      }
      
      .login-logo
      {
        font-family: SilkscreenBold;
        font-size: 38px;
      }
      .login-logo a {
        color: #fff;
      }

      .login-box-msg
      {
        font-size: 18px;
      }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script >
      function span()
      {
        window.location = 'index.php';
      }
    </script>
  </head>
  <body  onload="FB.init()" class="hold-transition login-page">

  <script>
    function statusChangeCallback(response) {
      console.log('statusChangeCallback');
      console.log(response);
      if (response.status === 'connected') {
        testAPI();
      } else if (response.status === 'not_authorized') {
        document.getElementById('msg-box').innerHTML = 'Please log ' +
            'into this app.';
      } else {
        FB.login();
      }
    }
    function checkLoginState() {
      FB.getLoginStatus(function(response) {
        statusChangeCallback(response);
      });
    }

    window.fbAsyncInit = function() {
      FB.init({
        appId      : '1753968888148354',
        cookie     : true,
        xfbml      : true,
        version    : 'v2.7'
      });

//      FB.getLoginStatus(function(response) {
//        statusChangeCallback(response);
//      });

    };

    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    function testAPI() {
      console.log('Welcome!  Fetching your information.... ');
      FB.api('/me', {fields: "email,name,id"},function(response) {
	//JSON.parse(response);
        console.log('Successful login for: ' + response.name);
        var url = "fblogin.php?fblogin&name=" + response.name + "&email=" + response.email + "&fbid=" + response.id;
        console.log(url);
        $.ajax({
          url: url,
          type: "get",
          async: false,
          success: function (data) {
	    //JSON.parse(data);
           // console.log(data);
	   // alert(data.status);
           // if(data.status == "success"){
	//	alert(data.status);
              window.location = 'index.php';
          //  }

          },
          error: function(){
            throw 'fatal error';
          }
        });
//        document.getElementById('msg-box').innerHTML =
//            'Thanks for logging in, ' + response.name + '!';

      });
    }
  </script>

  <!--
    Below we include the Login Button social plugin. This button uses
    the JavaScript SDK to present a graphical Login button that triggers
    the FB.login() function when clicked.
  -->

<!--  <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">-->
<!--  </fb:login-button>-->
  <span onclick="span()" class="glyphicon glyphicon-remove" style="color: white;font-size: 250%;font-weight: 500;margin-left: 94%;margin-top: 2%; cursor:pointer;"></span>
    <div class="login-box">
      <div class="login-logo">
        <a href="index.php"><b>INFOTSAV </b>2K16</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg" id="msg-box">Login here</p>
        <form action="" method="post">
          <div class="form-group has-feedback">
            <input type="email" name="email" class="form-control" placeholder="Email" required autocomplete="off">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required autocomplete="off">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox" name="remember"> Remember Me
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
            </div><!-- /.col -->
          </div>
          <input type="hidden" name="token" value="<?php echo escape(Tokens::generate()); ?>" />
        </form>
        <div class="social-auth-links text-center">
         <!--  <p>- OR -</p>
          <a onclick="checkLoginState();" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a> -->
        </div>
        <a href="register.php" class="text-center">Not Registered Yet? Register Here</a>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="scripts/jquery.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="scripts/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="css/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
    <?php
    if(isset($_GET['error'])){

    ?>
    <script>
      $("#password").parent().addClass("has-error");
      $("#msg-box").parent().addClass("has-error");
      $("#msg-box").addClass("text-error").text("Invalid Username or Password");
    </script>
    <?php
    }
    ?>
  </body>
</html>
