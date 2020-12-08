<?php
//方法一 直接调用法使用5.x版本
require_once(dirname(__FILE__) . '/lib/swift_required.php');
//require_once(dirname(__FILE__) . '/lib/swift_init.php');
$transport = \Swift_SmtpTransport::newInstance('smtp.exmail.qq.com', 465, 'ssl');
$transport -> setUsername('info@xxxx.com');
$transport -> setPassword('*********');  //该密码为smtp密码具体自行百度设置
$mailer = \Swift_Mailer::newInstance($transport);

$message = \Swift_Message::newInstance();
$message -> setSubject('test');
$message -> setFrom(array('info@xxx.com'=>'xxx'));
$message -> setTo(array('xxxx@xxxx.com'));
$message -> setBody('test');
$result = $mailer->send($message);
var_dump($result);


//方法二:composer
require_once 'vendor/autoload.php';

$transport = (new Swift_SmtpTransport('smtp.exmail.qq.com', 465, 'ssl'))
    ->setUsername('info@xxxx.com')
    ->setPassword('*********');  //QQ邮箱授权码
$mailer = new Swift_Mailer($transport);
$message = (new Swift_Message())
    ->setSubject('测试')
    ->setFrom(array(
        'info@xxxxx.com' => 'xxxxx',
    ))
    ->setTo(array('xxxx@xxxx.com'))
    ->setContentType('text/html')
    ->setCharset('utf-8')
    ->setBody('测试内容sss');

var_dump($mailer->send($message));
