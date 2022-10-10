<?php
  require 'index.php';
// Файлы phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

$my_gmail="ignatvigular@gmail.com";
$recepient='vyhuliar896@nauklit.kr.ua';
$password="3103ignat";

// Формирование самого письма
$title = "Файл автомобілів Kia від 2013";

$body = "Файл CSV";
$body = "<p>Автомобіль: Kia</p>
        <p>Максимальна ціна:".$max_price."</p>".
        "<p>З :".$year_car." року</p>"."";

// Настройки PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();

try {
  $mail->isSMTP();
  $mail->CharSet = "UTF-8";
  $mail->SMTPAuth   = true;
  // $mail->SMTPDebug = 2; 
  $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

  // Настройки вашей почты
  $mail->Host       = 'smtp.gmail.com'; // SMTP сервера вашей почты
  $mail->Username   = $my_gmail; // Логин на почте
  $mail->Password   = 'zcsgunfagbqzexdy'; // Пароль 
  $mail->SMTPSecure = 'ssl';
  $mail->Port       = 465;

  $mail->setFrom($recepient, 'Auto ria'); // Адрес самой почты и имя отправителя

  // Получатель письма
  $mail->addAddress($recepient);
  $mail->addAttachment($file);         //Add attachments

  // Отправка сообщения
  $mail->isHTML(true);
  $mail->Subject = $title;
  $mail->Body = $body;

  // Проверяем отравленность сообщения
  if ($mail->send()) {$result = "success";} 
  else {$result = "error";}

} catch (Exception $e) {
  $result = "error";
  $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}

// Отображение результата
echo json_encode(["result" => $result]);