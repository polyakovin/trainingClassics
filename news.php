<?
	include("blocks/db.php");
	if(isset($_GET['id'])) {$id=$_GET['id'];}
	$result=mysql_query("SELECT id,title,text FROM news WHERE id='$id'",$db);
	$myrow=mysql_fetch_array($result);
	include("blocks/style.php");
?>
		<title>Классика тренинга - <? echo $myrow['title'];?></title>
	</head>
	<body>
		<div id="body">
		<div id="header"></div>
			<?
				include("blocks/leftbar.php");
			?>
			<div id="main">
				<h1><?=$myrow['title'];?></h1>
				<p><?=$myrow['text'];?></p>
			</div>
			<div id="footer"></div>
			<a href="index.php">
				<div id="index" class="sertif"></div>
			</a>
		</div>
	</body>
</html>