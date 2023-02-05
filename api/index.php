<?php
require __DIR__ .  '/./../vendor/autoload.php';
require __DIR__ . "/Controller/Api/MailController.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST");
    header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
    header("Access-Control-Allow-Credentials: true");
}
header("Content-type: application/json; charset=UTF-8");

set_error_handler(function ($errno, $errstr, $errfile, $errline)
{
    throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
});
set_exception_handler(function (Throwable $exception)
{
    echo json_encode([
        'status' => false,
        'error' => $exception->getMessage(),
        'code' => $exception->getCode(),
        'file' => $exception->getFile(),
        'line' => $exception->getLine()
    ]);
});

$mailController = new MailController();
$requestStr = explode('/', $_SERVER['REQUEST_URI']);

if ($requestStr[1] == 'send-mail') {
    return $mailController->sendMail();
} else {
    header('HTTP/1.1 404 Not Found');
    exit;
}
