<?php
$number = 0676272057@;
$sender = "ST Bernads Chariable Hospital@gmail.com";
$message = "Ramadhan sends a message\n It worked..";
$sender_header = "From: $from\n";
//mail($to, ' ', $message, $headers);
?>

<!--Send SMS-->
<?php
	require('texgtlocal.class.php');

	$textlocal = new Textlocal('youremail@address.com', 'Your API Hash');

	$response = $textlocal->sendSms($number, $message, $sender_header);
	print_r($response);
?>