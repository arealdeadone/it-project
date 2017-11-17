<?php
/**
 * Created by PhpStorm.
 * User: ARVIND
 * Date: 05-Sep-16
 * Time: 11:55 PM
 */

require_once 'core/init.php';

$user = new User();

if($user->isLoggedIn())
    Redirect::to('index.php');

if(Input::exists('get'))
{
    $email = Input::get('email');
    $code = Input::get('ecode');

    $user->find($email);

    if($user->data()->emailcode == $code){
        $user->update(array('active' => 1, "emailcode" => ""), $user->data()->id);
        Session::put('active','Your account has been successfully activated you can now login.');
        Redirect::to('login.php');
        echo '<script> window.location = "login.php" </script>';
    }
}