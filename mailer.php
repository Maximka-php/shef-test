<?php
if (empty($_POST['emails'])) {
    die('Ошибка отправки данных');
}
require_once 'Mail.php';
require_once 'Message.php';

$mailer = new Mail($_POST['emails'], $_POST['color']);

$mailer->send();
echo "<pre>" . $mailer->message . "</pre>";


