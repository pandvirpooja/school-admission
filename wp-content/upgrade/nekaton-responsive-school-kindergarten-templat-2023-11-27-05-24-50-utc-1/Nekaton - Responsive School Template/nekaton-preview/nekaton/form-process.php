<?php
/**
 * php file part for contact form validate
 *
 * @package Nekaton - Responsive School Template
 */
    $name=$_POST['name'];
    $email=$_POST['email'];
    $number=$_POST['number'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];		
	$from="From: $name $number $subject<$email>\r\nReturn-path: $email";
	$subject="Nekaton - Responsive School Template";
	mail("shahadat.cse12@yahoo.com", $subject, $message, $from)

?>
