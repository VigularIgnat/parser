<?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function PHPMailer\PHPMailer\
    /*composer require phpmailer/phpmailer


    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    composer require_once 'vendor/autoload.php';

    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $my_gmail;                     //SMTP username
        $mail->Password   = $password;                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom($my_gmail, 'Mailer');
        $mail->addAddress($recepient, 'Joe User');     //Add a recipient
        $mail->addAddress('ellen@example.com');               //Name is optional
        /*$mail->addReplyTo('info@example.com', 'Information');
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');
    
        //Attachments
        $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }*/


    //THIRD
    /*$mail = new PHPMailer(true);
    $email_from='ignatvigular@gmail.com';
    $name_from="ignatvigular@gmail.com";
    if($send_using_gmail){
        $mail->IsSMTP(); // telling the class to use SMTP
        $mail->SMTPAuth = true; // enable SMTP authentication
        $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
        $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
        $mail->Port = 465; // set the SMTP port for the GMAIL server
        $mail->Username = "ignatvigular@gmail.com"; // GMAIL username
        $mail->Password = $password; // GMAIL password
    }
    
    // Typical mail data
    $mail->AddAddress('vyhuliar896@nauklit.kr.ua', 'vyhuliar896@nauklit.kr.ua');
    $mail->SetFrom($email_from, $name_from);
    $mail->Subject = "My Subject";
    $mail->Body = "Mail contents";
    
    try{
        $mail->Send();
        echo "Success!";
    } catch(Exception $e){
        // Something went bad
        echo "Fail :(";
    }*/

    /*$my_gmail="ignatvigular@gmail.com";
    $recepient='vyhuliar896@nauklit.kr.ua';
    $password="3103ignat";

    $to      = $recepient;
    $subject = 'the subject';
    $message = 'hello';
    $headers = array(
        'From' => $my_gmail,
        'X-Mailer' => 'PHP/' . phpversion()
    );
    
    mail($to, $subject, $message);
    if (mail($to, $subject, $message)){
        echo "ok";
    }
    else{
        echo 100;
    }

    //Сообщение
    $message = "Line 1\r\nLine 2\r\nLine 3";

    // На случай если какая-то строка письма длиннее 70 символов мы используем wordwrap()
    $message = wordwrap($message, 70, "\r\n");

    // Отправляем
    mail($recepient, 'My Subject', $message);
    if (mail($recepient, 'My Subject', $message)){
        echo mail($recepient, 'My Subject', $message);
    }
    else{
        echo mail($recepient, 'My Subject', $message);
    }

    $to = $recepient;
    $subject = "My subject";
    $txt = "Hello world!";
    $headers = "From: webmaster@example.com";

    mail($to,$subject,$txt,$headers);*/
?>
