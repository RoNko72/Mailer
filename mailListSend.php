<?php
require 'vendor/autoload.php';

$domain = "sandbox394f17689b2b43a187f9ac506b00da4b.mailgun.org";
$list = "testList2@sandbox394f17689b2b43a187f9ac506b00da4b.mailgun.org";
$mg = new Mailgun\Mailgun("key-***");
$from = "emailForKursova@ukr.net";

if (isset($_POST['emailAdd'], $_POST['nameAdd'])){
	$emailAdd = $_POST['emailAdd'];
	$nameAdd = $_POST['nameAdd'];

	$mg->sendMessage($domain , [
		  'from'    => $from,
		  'to'      => $emailAdd,
		  'subject' => 'Додавання до списку отримувачів розсилки',
		  'html'    => "Шановний $nameAdd, <br /><br />Ви були додані до списку отримувачів розсилки $list."
	]);

	$mg->post("lists/$list/members", array(
    'address'     => $emailAdd,
    'name'        => $nameAdd,
    'subscribed'  => true
	));

	echo "<script type='text/javascript'>alert(\"Користувача додано\");</script>";
}

$result = $mg->get("lists/$list/members", array('subscribed' => 'yes', 'limit' => 100));

function objectToArray($d)
{
    if (is_object($d)) {
        $d = get_object_vars($d);
    }
    if (is_array($d)) {
        return array_map(__FUNCTION__, $d);
    } else {
        return $d;
    }
}
$mails = array();
$newArr = objectToArray($result);
$Count = $newArr["http_response_body"]["total_count"];

for($i = 0; $i < $Count; $i = $i + 1){
	$mails[$i] = $newArr["http_response_body"]["items"][$i]["address"];
}

if (isset($_POST['sendButton'], $_POST['header'], $_POST['content'])){
	$message = $_POST['content'];
	$from = "emailForKursova@ukr.net";
	$subject = $_POST['header'];

	for($i = 0; $i < $Count; $i = $i + 1){
		$mg->sendMessage($domain , [
		  'from'    => $from,
		  'to'      => $mails[$i],
		  'subject' => $subject,
		  'html'    => "{$message}<br><br><a href=\"%unsubscribe_url%\">Відписатися від розсилки</a>"
		]);
	}
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
		height: 600px;
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
	  //width: 850px;
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
	#lower{
		margin-top: -5px;
		margin-left: 0px;
	}
	#borderBetween{
		margin-top: 15px;
		margin-bottom: 15px;
		background-color: #303030;
		border-color: black;
		height: 3px;
	}
	#floatR{
		float: right;
		margin-top: -110px;
		margin-right: 0px;
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
	<div>
		<form name="f1" method="post">
			Поштова адреса: <br />
			<input name="emailAdd" type="text" size="25" maxlength="30" value="" />
			<br /><br />
			Ім'я користувача: <br />
			<input name="nameAdd" type="text" size="25" maxlength="30" value="" /> <br /><br />

			<div id = "floatR" class = "centerLoc">
				<input type="submit" class="sendButton" name="sendButton" value="Додати до списку підписників"/><br /><br />
			</div>
		</form>
	</div>
	<div id = "borderBetween"></div>
	<form name="f2" method="post">
		Заголовок: <br />
		<input name="header" type="text" size="25" maxlength="30" value="" /> <br /><br />

		Повідомленння:
		<p><textarea name="content" id="contentMessage" cols="91" rows="15"> </textarea></p>

		<div class = "centerLoc">
		<input type="submit" class="sendButton" name="sendButton" value="Надіслати"/>
		</div>
	</form>
	<div class = "centerLoc" id = "lower">
		<p>© Ukrmail.com</p>
	</div>
</div>
</body>
</html>
