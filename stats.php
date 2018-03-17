<?php
require 'vendor/autoload.php';
use Mailgun\Mailgun;

$domain = "sandbox394f17689b2b43a187f9ac506b00da4b.mailgun.org";
$mg = new Mailgun('key-***');

$result = $mg->get("$domain/stats/total",[
    'event' => array('accepted', 'delivered', 'failed', 'opened', 'clicked', 'unsubscribed', 'complained', 'stored'),
    'duration' => '1m'
]);

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

$newArr = objectToArray($result);

$acceptedCount = $newArr["http_response_body"]["stats"][0]["accepted"]["total"];
$deliveredCount = $newArr["http_response_body"]["stats"][0]["delivered"]["total"];
$failedCount = $newArr["http_response_body"]["stats"][0]["failed"]["permanent"]["total"];
$storedCount = $newArr["http_response_body"]["stats"][0]["stored"]["total"];
$openedCount = $newArr["http_response_body"]["stats"][0]["opened"]["total"];
$clickedCount = $newArr["http_response_body"]["stats"][0]["clicked"]["total"];
$unsubscribedCount = $newArr["http_response_body"]["stats"][0]["unsubscribed"]["total"];
$complainedCount = $newArr["http_response_body"]["stats"][0]["complained"]["total"];

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
		height: 300px;
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
	#stats{
		border: 3px solid #303030;
		padding-left: 40px;
	}
	#rightS{
		float: right;
		margin-top: -175px;
		margin-right: 50px;
	}
	#lower{
		margin-top: -5px;
		margin-left: 0px;
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

	<h2 class = "centerLoc">Статистика повідомлень</h2>
	<br /><br />
	<div id="stats">
		<div id = "leftS">
			<p>Прийняті:    		<?echo $acceptedCount."<br />"?></p>
			<p>Доставлені:  		<?echo $deliveredCount."<br />"?></p>
			<p>Невдалі:    	 		<?echo $failedCount."<br />"?></p>
			<p>Збережені:  	 		<?echo $storedCount."<br />"?></p>
		</div>
		<div id = "rightS">
			<p>Відкриті:    		<?echo $openedCount."<br />"?></p>
			<p>Натиснені:   		<?echo $clickedCount."<br />"?></p>
			<p>Скасовані підписки:  <?echo $unsubscribedCount."<br />"?></p>
			<p>Оскаржені:  			<?echo $complainedCount."<br />"?></p>
		</div>
	</div>
	<div class = "centerLoc" id = "lower">
		<p>© Ukrmail.com</p>
	</div>
</div>
</body>
</html>
