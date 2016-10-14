<?php
    require_once 'core/init.php';
    require_once 'core/Instamojo.php';
    $user = new User();
    if(!$user->isLoggedIn())
        Redirect::to('index.php');
    if(Input::exists())
    {
        $api = new Instamojo\Instamojo("e3e5d9f63cc44547c6d015fe23c6f23e", "0e32dd9f2e7abec52d0f34062c47b1cc");
        $cost = (mysql_real_escape_string($_POST['cost']));
        $purpose = "";
        switch ($cost) {
            case 250:
                $purpose = "Infotsav Registration (Individual)";
                break;
            case 300:
                $purpose = " Robotics - 2 Member Team ";
                break;
            case 400:
                $purpose = " Robotics - 3 Member Team ";
                break;
            case 500:
                $purpose = " Robotics - 5 Member Team ";
                break;
            default:
                # code...
                break;
        }
        try {
            $response = $api->paymentRequestCreate(array(
                "purpose" => $purpose,
                "amount" => "$cost",
                "send_email" => true,
                "email" => $user->data()->email,
                "redirect_url" => "http://www.infotsav.com/index.php?paid"
                ));
            Redirect::to($response['longurl']);
        }
        catch (Exception $e) {
            print('Error: ' . $e->getMessage());
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Payments Infotsav'16</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" />
    </head>
    <body  onload="document.getElementById('paybtn').disabled = true;">
        <div class="container-fluid">
            <div class="row"><br/></div>
            <div class='jumbotron'>
                <div class="row">
                    <div class="col-xs-3"></div>
                    <div class="col-xs-6 col-xs-offset-1">
                        <h2> INFOTSAV'16 PAYMENT PORTAL </h2>
                    </div>
                    <div class="col-xs-3"></div>
                </div>
                <div class="row">
                    <div class="col-xs-4"></div>
                    <div class="col-xs-4">
                        <form role='form' action="" method="post">
                            <div class="form-group">
                                <select onclick="showcost(this.value)" class="form-control" name="cost">
                                    <option value=""> Select Option </option>
                                    <option value="250"> Infotsav Registration (Individual) </option>
                                    <option value="300"> Robotics - 2 Member Team </option>
                                    <option value="400"> Robotics - 3 Member Team </option>
                                    <option value="500"> Robotics - 5 Member Team </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-block btn-success" id='paybtn'>PAY</button>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-block btn-link" id='helpbtn' data-toggle='modal' data-target='#myModal'>Need Help?</button>
                            </div>
                            <input type="hidden" name='token' value="<?php echo escape(Tokens::generate()) ?>"
                        </form>
                    </div>
                    <div class="col-xs-4"></div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
              </div>
              <div class="modal-body">
                ...
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <script>
            function showcost(value) {
                if(value == "")
                    document.getElementById('paybtn').disabled = true;
                else {
                    document.getElementById('paybtn').innerHTML = 'PAY Rs. '+value;
                    document.getElementById('paybtn').disabled = false;
                }
            }
        </script>
        <script src="ca/js/jquery.js"></script>
        <script src="scripts/bootstrap.min.js"></script>
    </body>
</html>
