<?php
// it's mean example, like some school management system app it's send to 
// to notification to all student in school. like a smsSend, emailSend, FaxSend, etc.
spl_autoload_register(function ($class) {
    include 'classes/'.$class . '.php';
});
$user = new User();
$msg = $user->getMsg();

switch ($msg) {
    case 'email':
        $objmsg = new SendEmail();
        break;
    case 'sms':
        $objmsg = new SendSms();
        break;
    case 'fax':
        $objmsg = new SendFax();
        break;
}
$objmsg->notification();