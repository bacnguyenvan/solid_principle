<?php
/*
-   DIP states that high-level code should not depend on low-level code, and the abstractions should not depend upon details.
*/

interface NotificationService
{
    public function sendNotification(String $message);
}

class EmailService implements NotificationService
{
    public function sendNotification(String $message)
    {
        echo $message;
    }
}

class SMSService implements NotificationService
{
    public function sendNotification(String $message)
    {
        echo $message;
    }
}

class NotificationManager
{
    private NotificationService $service;

    public function __construct(NotificationService $service)
    {
        $this->service = $service;
    }

    public function send(String $message)
    {
        $this->service->sendNotification($message);
    }
}

$emailService = new EmailService();
$notificationManager = new NotificationManager($emailService);
$message = "This is notification from email";
$notificationManager->send($message);

echo nl2br("\n--------------\n");

$smsService = new SMSService();
$notificationManager = new NotificationManager($smsService);
$message = "This is notification from sms";
$notificationManager->send($message);