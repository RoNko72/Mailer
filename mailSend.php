<?php

require 'vendor/autoload.php';
use Mailgun\Mailgun;
$domain = "sandbox394f17689b2b43a187f9ac506b00da4b.mailgun.org";
$mg = Mailgun::create('key-***');

if (isset($_POST['sendButton'], $_POST['header'], $_POST['to'], $_POST['content'])){
	$message = $_POST['content'];
	$to = $_POST['to'];
	$from = "emailForKursova@ukr.net";
	$subject = $_POST['header'];

	$mg->messages()->send("$domain", [
	  'from'    => $from,
	  'to'      => $to,
	  'subject' => $subject,
	  'text'    => $message ]);
}
?>

<!DOCTYPE HTML PUBLIC "-//w3c//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html>; charset=utf-8">
<title> Ukrmail.com </title>
<link rel="icon" href="Images/dodoMain.jpg">
<style>
	body{
		background-color: #E6E9FF;
		padding-top: 50px;
		padding-left: 300px;
		padding-right: 300px;
		padding-bottom: 30px;
		font-size: 18px;
	}

	.centerLoc{
		text-align: center;
	}

	#content{
		height: 540px; /*600*/
		width: 670px;
		border-style: 3d;
		background-color: white;
		padding: 50px;
		align: center
	}

	#menubar {
		width: 770px;
	}

	a {
	  text-decoration: none;
	  color: #fff;
	  display: block;
	}

	ul {
	  list-style: none;
	  position: relative;
	  text-align: left;
	}

	li {
	  float: left;
	  width: 170px;
	  text-align: center;
	}

	ul:after {
	  clear: both;
	}

	ul:before,
	ul:after {
		content: " ";
		display: table;
	}

	nav {
	  position: relative;
	  background: #2B2B2B;
	  background-image: -webkit-linear-gradient(bottom, #2B2B2B 7%, #333333 100%);
	  background-image: -moz-linear-gradient(bottom, #2B2B2B 7%, #333333 100%);
	  background-image: -o-linear-gradient(bottom, #2B2B2B 7%, #333333 100%);
	  background-image: linear-gradient(bottom, #2B2B2B 7%, #333333 100%);
	  text-align: center;
	  letter-spacing: 1px;
	  text-shadow: 1px 1px 1px #0E0E0E;
	  -webkit-box-shadow: 2px 2px 3px #888;
	  -moz-box-shadow: 2px 2px 3px #888;
	  box-shadow: 2px 2px 3px #888;
	  border-bottom-right-radius: 8px;
	  border-bottom-left-radius: 8px;
	}

	ul.primary li a {
	  display: block;
	  padding: 20px 20px;
	  border-right: 1px solid #3D3D3D;
	}

	ul.primary li:last-child a {
	  border-right: none;
	}

	ul.primary li a:hover {

	  color: #000;
	}

	ul.primary li:hover ul {
	  display: block;
	  background: #fff;
	}

	ul.primary li:hover a {
	  background: #fff;
	  color: #666;
	  text-shadow: none;
	}

	ul.primary li:hover > a{
	  color: #000;
	}
	input[type=text] {
		border: 3px solid #555;
		height: 20px;
	}
	input[type=text]:focus {
		border-color: black;
		color: white;
		background-color: #303030;
	}
	#contentMessage{
		border: 3px solid #555;
	}
	#contentMessage:focus{
		border-color: black;
		color: white;
		background-color: #303030;
	}
	.sendButton{
		background-color: white;
		border-color: black;
		border-radius: 7px;
		width: 250px;
		height: 50px;
	}
	.sendButton:hover {
		background-color: #303030;
		color: white;
	}
</style>

</head>

<body>

<div id = "header">
<nav id="menubar">
  <ul class="primary">
    <li><a href="main.php">Головна</a></li>
    <li><a href="mailSend.php">Повідомлення</a></li>
    <li><a href="mailListSend.php">Розсилка</a></li>
    <li><a href="stats.php">Статистика</a></li>
  </ul>
</nav>
</div>

<div id = "content">
	<form name="f1" method="post">
		Кому: <br /><br />
		<input name="to" type="text" size="25" maxlength="30" value="" /> <br /><br />
		Заголовок: <br /><br />
		<input name="header" type="text" size="25" maxlength="30" value="" /> <br /><br />
		Повідомленння: <br />
		<p><textarea name="content" id="contentMessage" cols="91" rows="15"> </textarea></p>

		<div class = "centerLoc">
		<input type="submit" class = "sendButton" name="sendButton" value="Надіслати"/>
		</div>
	</form>
	<div class = "centerLoc" id = "lower">
		<p>© Ukrmail.com</p>
	</div>
</div>
</body>
</html>
