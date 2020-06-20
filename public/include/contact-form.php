<?php

session_cache_limiter('nocache');
header('Expires: ' . gmdate('r', 0));
header('Content-type: application/json');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'php-mailer/src/Exception.php';
require 'php-mailer/src/PHPMailer.php';
require 'php-mailer/src/SMTP.php';

$mail = new PHPMailer();

// Enter your email address. If you need multiple email recipes simply add a comma: email@domain.com, email2@domain.com
$to = "";

// Add your reCaptcha Secret key if you wish to activate google reCaptcha security
$recaptcha_secret_key = '';

//This functionality will process post fields without worrying to define them on your html template for your customzied form.
//Note: autofields will process only post fields that starts with name widget-contact-form OR with custom prefix field name
$form_prefix = "";
$form_title = "Formular contact";
$subject = 'Mesaj nou din formularul de contact';
$email = 'exotic.fish.magazin@gmail.com';
$name = 'Exotic Fish magazin';

if ($email != '') {

    $mail = new PHPMailer;
    $mail->IsHTML(true);                                    // Set email format to HTML
    $mail->CharSet = 'UTF-8';
    $mail->IsSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'exotic.fish.magazin@gmail.com';                    // SMTP username
    $mail->Password = 'Alin123456789';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->From = $email;
    $mail->FromName = $name;

    if (strpos($to, ',') !== false) {
        $email_addresses = explode(',', $to);
        foreach ($email_addresses as $email_address) {
            $mail->AddAddress(trim($email_address));
        }
    } else {
        $mail->AddAddress($to);
    }

    $mail->AddReplyTo($email, $name);
    $mail->Subject = $subject;

    //Remove unused fields
    foreach (array("form-prefix", "subject", "g-recaptcha") as $fld) {
        unset($_POST[$form_prefix . $fld]);
    }
    //Format eMail Template
    $mail_template = '<table width="100%" cellspacing="40" cellpadding="0" bgcolor="#F5F5F5"><tbody><tr><td>';
    $mail_template .= '<table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#F5F5F5" style="border-spacing:0;font-family:sans-serif;color:#475159;margin:0 auto;width:100%;max-width:600px"><tbody>';
    $mail_template .= '<tr><td style="padding-top:20px;padding-left:0px;padding-right:0px;width:100%;text-align:right; font-size:12px;line-height:22px">Acest email este trimis de&nbsp;' . $_SERVER['HTTP_HOST'] . '</td></tr>';
    $mail_template .= '</tbody></table>';
    $mail_template .= '<table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#F5F5F5" style="padding: 50px; border-spacing:0;font-family:sans-serif;color:#475159;margin:0 auto;width:100%;max-width:600px; background-color:#ffffff;"><tbody>';
    $mail_template .= '<tr><td style="font-weight:bold;font-family:Arial,sans-serif;font-size:36px;line-height:42px">' . $form_title . '</td></tr>';
    $mail_template .= '<tr><td style="padding-top:25px;padding-bottom:40px; font-size:16px;">';
    foreach ($_POST as $field => $value) {
        $split_field_name = str_replace($form_prefix, '', $field);
        $ucwords_field_name = ucfirst(str_replace('-', ' ', $split_field_name));
        $mail_template .= '<p style="display:block;margin-bottom:10px;"><strong>' . $ucwords_field_name . ': </strong>' . $value . '</p>';
    }
    $mail_template .= '</td></tr>';
    $mail_template .= '<tr><td style="padding-top:16px;font-size:12px;line-height:24px;color:#767676; border-top:1px solid #f5f7f8;">Email trimis la: ' . date("F j, Y, g:i a") .
        '</td></tr>';
    $mail_template .= '<tr><td style="font-size:12px;line-height:24px;color:#767676">De la: ' . $email . '</td></tr>';
    $mail_template .= '</tbody></table>';
    $mail_template .= '</td></tr></tbody></table>';
    $mail->Body = $mail_template;

    if (!$mail->Send()) {
        $response = array('response' => 'error', 'message' => $mail->ErrorInfo);
    } else {
        $response = array('response' => 'success');
    }

    echo json_encode($response);
} else {
    $response = array('response' => 'error');
    echo json_encode($response);
}


?>
