<?php
require __DIR__ . "/BaseController.php";

class MailController extends BaseController
{
    /**
     * Send email.
     *
     * @return string
     */
    public function sendMail()
    {
        echo json_encode('test api');
    }
}


