<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Phpmailer_lib{
    public function __construct(){
        log_message('Debug','PHPMailer class is loaded.');
    }
    public function load(){
        require APPPATH.'libraries/phpmailer/src/Exception.php';
                require APPPATH.'libraries/phpmailer/src/PHPMailer.php';
                require APPPATH.'libraries/phpmailer/src/SMTP.php';
                $mail = new PHPMailer;
                return $mail;
    }
}

?>