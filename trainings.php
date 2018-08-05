<?
	if(isset($_POST['add'])) 
	{
		if($_POST['add']=="")
			$form='<p id="warning">Вы ничего не написали!<p>';
		else
		{
			if($_POST['a']+$_POST['b']!=$_POST['c'])
				$form='<p id="warning">Вы неверно сложили числа!<p>';
			else
			{
				$add=$_POST['add'];
				$email=$_POST['email'];
				
				if($email=="")
					unset($email);
					
				if(isset($email))
					$emailm="	E-Mail отправителя: ".$email;
				else
				{
					$emailm="";
					$email="Классика Тренинга<do_not_reply@training67.ru>";
				}
				mail("Игорь<noggatur@ya.ru>,Игорь<training67@yandex.ru>","Советы по тренингам.",$add.". ".$emailm,"from:".$email);
				$form=
				'
					<p id="success">
						Сообщение отправлено!<br>
						Спасибо за проявленный интерес к нашей фирме!
					<p>
				';
			}
		}
	}
	else
	{
		$a=rand(1,9);
		$b=rand(1,9);
		$form=
		'
			<form id="form" id="advice" action="" method="post">
				<label>
					Ваш E-Mail:
					<input type="text" name="email" id="email">
				</label>
				<textarea name="add" rows="5" id="trainin"></textarea>
				<label>
					Сколько будет <strong id="a">'.$a.'</strong> плюс <strong id="b">'.$b.'</strong>?
					<input type="text" name="c" id="c">
				</label>
				<input type="hidden" name="a" value="'.$a.'">
				<input type="hidden" name="b" value="'.$b.'">
				<input type="submit" name="submit" value="Отправить">
			</form>
		';
	}
	include("blocks/db.php");
	if(isset($_GET['type']))
	{
		$type=$_GET['type'];
		if($type=="")
			unset($type);
	}
	$result=mysql_query("SELECT * FROM page WHERE page='trainings'",$db);
	$myrow=mysql_fetch_array($result);
	$view=$myrow["view"]+1;
	$result=mysql_query("UPDATE page SET view='$view' WHERE page='trainings'");
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
				<?
					if(isset($_GET['type']))
					{
						echo"<div id='accordion'>";
						$type=$_GET['type'];
						$result1=mysql_query("SELECT * FROM trainings WHERE type=$type ORDER BY name",$db);
						$myrow1=mysql_fetch_array($result1);
						
						do
						{
							printf
							(
								'
									<h2><a href="#"><strong>%s</strong></a></h2>
									<div>
										<h3>Продолжительность: %s</h3>
										<p>%s</p>
										<h3>Цена: <strong>%s</strong> для одного участника и <strong>%s</strong> для группы</h3>
									</div>
								',$myrow1["name"],$myrow1["time"],$myrow1["text"],$myrow1["price1"],$myrow1["price2"]
							);
						}
						while($myrow1=mysql_fetch_array($result1));
						
						echo"</div>".$myrow['text'];
						echo$form;
					}
					else
						echo
						'
							<h3>Для кого нужно найти интересующую программу обучения?</h3>
							<a href="trainings.php?type=1">Продавцы-консультанты, менеджеры по продажам.</a></br>
							<a href="trainings.php?type=2">Менеджеры среднего звена, TOP-менеджеры.</a></br>
							<a href="trainings.php?type=3">Специалисты по подбору персонала.</a></br>
						';
				?>
			</div>
			<div id="footer"></div>
			<a href="index.php">
				<div id="index" class="sertif"></div>
			</a>
		</div>
	</body>
</html>