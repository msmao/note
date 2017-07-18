<?php

// 定义一个接口
interface EmailSenderInterface
{
    public function send();
}

// 定义Gmail邮件服务
class GmailSender implements EmailSenderInterface
{

    public function send()
    {
        echo 'gmail sender send' . "\n";
    }
}

class QmailSender implements EmailSenderInterface
{

    public function send()
    {
        echo 'qmail sender send' . "\n";
    }
}


class Handle
{
    // 发送器服务
    public $emailSender;

    // 通过构造器注入
    public function __construct($emailSender = null)
    {
        if ($emailSender !== null)
            $this->emailSender = $emailSender;
    }

    public function exec()
    {
        $this->emailSender->send();
    }
}

// 注入：从外面实例化对象，然后通过构造器或者定义属性注入到类里面

$mail1 = new GmailSender();
$mail2 = new QmailSender();
$mail3 = new GmailSender();

$handle1 = new Handle($mail1);
$handle1->exec();

$handle2 = new Handle($mail2);
$handle2->exec();

$handle3 = new Handle();
$handle3->emailSender = $mail3; // 通过属性注入
$handle3->exec();

