<?php
$subject = 'Test letter';
echo '============' . "\n";
echo $subject . "\n";
echo '============' . "\n";
$firstName = 'Grigory';
$text1 = "firstName : {$firstName}" . "\n";
$text2 = "Hello" . "\n";
$text3 = "It is my first letter" . "\n";
$message = $text1 .$text2 .$text3;
echo $message;
$headers = 'From: g.o.popov@gmail.com';
mail('g.o.popov@gmail.com', $subject, $message, $headers);


