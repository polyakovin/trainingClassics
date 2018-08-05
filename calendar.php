<?
	include("blocks/db.php");
	$result=mysql_query("SELECT * FROM page WHERE page='calendar'",$db);
	$myrow=mysql_fetch_array($result);
	$view=$myrow["view"]+1;
	$result=mysql_query("UPDATE page SET view='$view' WHERE page='calendar'");
	include("blocks/style.php");
?>
		<title>Классика тренинга - <?=$myrow['title'];?></title>
	</head>
	<body>
		<div id="body">
			<div id="header"></div>
			<?
				include("blocks/leftbar.php");
			?>
			<div id="main">
				<h1><?=$myrow['title'];?></h1></br>
				<iframe src="https://www.google.com/calendar/embed?showTitle=0&amp;showPrint=0&amp;showCalendars=0&amp;showTz=0&amp;height=550&amp;wkst=2&amp;hl=ru&amp;bgcolor=%23ffcc66&amp;src=smol.training%40gmail.com&amp;color=%23875509&amp;ctz=Europe%2FKaliningrad" style=" border-width:0 " width="550" height="550" frameborder="0" scrolling="no"></iframe>
				<?
				/*
					echo
					'
						<form action="" method="post">
						<label>
							Введите дату, чтобы увидеть расписание занятий на этот день:<br>
							<input id="date" name="date" type="text">
						</label>
						<input name="" type="submit" value="Посмотреть">
						</form>
					';
					
					if(isset($_POST['date']))
					{
						$date=$_POST['date'];
						$result1=mysql_query("SELECT * FROM date WHERE date='$date' ORDER BY title",$db);
						$myrow1=mysql_fetch_array($result1);
						
						if($myrow1==0)
							echo
							"
								<h2>
									Занятий на <strong>".$date."</strong> не запланировано.<br><br>
									Мы можем провести для Вас курс в этот день, когда Вы нам позвоните нам или отправите e-mail на адрес, указанный ниже.
								</h2>
							";
						else
						{
							echo"<h1>Вот все занятия на <strong>".$date."</strong>:</h1>";
							
							do
							{
								printf('<h2><strong>%s</strong></h2><p>%s</p>', $myrow1["title"], $myrow1["text"]);
							}
							while($myrow1=mysql_fetch_array($result1));
						}
					}
				*/
				echo"<br>".$myrow['text'];
				?>
			</div>
			<div id="footer"></div>
			<a href="index.php">
				<div id="index" class="sertif"></div>
			</a>
		</div>
	</body>
</html>