<?
	include("blocks/db.php");
	$result=mysql_query("SELECT * FROM page WHERE page='insunrise'",$db);
	$myrow=mysql_fetch_array($result);
	$view=$myrow["view"]+1;
	$result=mysql_query("UPDATE page SET view='$view' WHERE page='insunrise'");
	include("blocks/style.php");
?>
		<title>Классика тренинга - <?= $myrow['title'];?></title>
	</head>
	<body>
		<div id="body">
			<div id="header"></div>
			<?
				include("blocks/leftbar.php");
			?>
			<div id="main">
				<h1><?=$myrow['title'];?></h1>
				<?=$myrow['text'];?>
			</div>
			<div id="footer"></div>
			<a href="index.php">
				<div id="index" class="sertif"></div>
			</a>
		</div>
	</body>
</html>