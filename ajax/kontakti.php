<?php
  $to = "a.melnikov1996@ya.ru";
  $email = $_POST['email'];

  $err = "";
  if (trim($_POST['name']) == "" && trim($_POST['email']) == "" && trim($_POST['message']) == "")
    $err = "Заполните всё";
  else if (trim($_POST['name']) == "")
    $err = "Имя не указано";
  else if (!((strpos($email, ".") > 0) && (strpos($email, "@") > 0)))
    $err = "Неправильный e-mail";
  else if (trim($_POST['message']) == "")
    $err = "Сообщение не указано";

  if ($err != "") { // Есть какие-либо ошибки
    echo $err;
    exit;
  }

  $msg = "Сообщение отправил(а) <b>".$_POST['name']."</b>.<br><b>Текст сообщения:</b><br>".$_POST['message']."<br><br>Вопрос с сайта: iTProger.com";

  $subject = "=?utf-8?B?".base64_encode("Сообщение с сайта iTProger")."?=";

  $headers = "From: $email\r\nReply-to: $email\r\nContent-type: text/html; charset=utf-8\r\n";
  $success = mail ($to, $subject, $msg, $headers);
  echo $success;
?>
