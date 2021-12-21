<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class EMailer {

  
  public function __construct(MailerInterface $mailer) 
  {
    $this->mailer = $mailer;
  }

  public function sendEmail(String $sendTo, String $name, String $text)
  {
      $email = (new Email())
        ->from('hello@example.com')
        ->to($sendTo)
        ->subject("Message from {$name}")
        ->text($text);

        try {
        $this->mailer->send($email);
        return "Email sent. Thank you.";
        } catch (TransportExceptionInterface $e) {
          return "Email not send. Very likely not configured.";
        }
  }
}