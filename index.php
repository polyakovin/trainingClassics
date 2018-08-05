<?include("blocks/db.php");
$result=mysql_query("SELECT * FROM page WHERE page='index'",$db);
$myrow=mysql_fetch_array($result);
$view=$myrow["view"]+1;
$result=mysql_query("UPDATE page SET view='$view' WHERE page='index'");
include("blocks/style.php");?>
<title>Классика тренинга - <? echo $myrow['title'];?></title>
</head>
<body>
<div id="body">
<div id="header"></div>
<? include("blocks/leftbar.php");?>
<div id="main">
<h1>Новости:</h1>
<? $result1=mysql_query("SELECT id,title,date FROM news ORDER BY id DESC LIMIT 5",$db);
$myrow1=mysql_fetch_array($result1);
do{printf('<p><strong>%s</strong> <a href="news.php?id=%s">%s</a></p>',$myrow1["date"],$myrow1["id"],$myrow1["title"]);}
while($myrow1=mysql_fetch_array($result1));?>
<h1><? echo $myrow['title'];?></h1>
<? echo $myrow['text'];?>
</div>
<div id="footer"></div>
<a href="index.php"><div id="index" class="sertif"></div></a>
</div>
</body>
</html>
