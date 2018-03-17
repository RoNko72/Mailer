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
		height: 540px;
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
	#mes1{
		float: right;
	}
	#headHello{
		color: #FF5D00;
		text-align: center;
	}
	#nearImg1{
		position: absolute;
		top: 520px;
		left: 440px;
	}
	#nearImg2{
		position: absolute;
		top: 590px;
		left: 440px;
	}
	#nearImg3{
		position: absolute;
		top: 660px;
		left: 440px;
	}
	#lower{
		margin-top: 50px;
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
	<img src = "Images/dodoMain.jpg" width = "250" height = "250">
	<div id = "mes1">
		<h2 id = "headHello">Шановний користувач!</h2>
		<p>Адміністрація рада вітати тебе на нашому сайті.</p>
		<p>Ми пропонуємо наступні послуги:</p>
	</div>
	<br /><br />
	<div id = "mes2">
		<p><img src = "Images/Img2.png">  <span id = "nearImg1">Відправка персонального повідомлення;</span></p>
		<p><img src = "Images/Img3.png">  <span id = "nearImg2">Розсилка повідомлень підписаним користувачам;</span></p>
		<p><img src = "Images/Img4.png">  <span id = "nearImg3">Отримання статистичних даних відправки повідомлень;</span></p>
	</div>
	<div class = "centerLoc" id = "lower">
		<p>© Ukrmail.com</p>
	</div>
</div>
</body>
</html>