<?php
require __DIR__ . "/Controller/Api/MailController.php";

$objFeedController = new MailController();
$objFeedController->sendMail();
