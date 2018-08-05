<?
	if(isset($_POST['add']))
	{
		if($_POST['add']=="")
			$form='<p id="warning">Вы не задали вопрос!<p>';
		else
		{
			if($_POST['a']+$_POST['b']!=$_POST['c'])
				$form='<p id="warning">Вы неверно сложили числа!<p>';
			else
			{
				$add=$_POST['add'];
				$email=$_POST['email'];if($email=="")unset($email);
				if(isset($email))
					$emailm="	E-Mail отправителя: ".$email;
				else
				{
					$emailm="";
					$email="Классика Тренинга<do_not_reply@training67.ru>";
				}
				mail("Игорь<noggatur@ya.ru>,Игорь<training67@yandex.ru>","Вопрос от Пользователя",$add.". ".$emailm,"from:".$email);
				$form=
				'
					<p id="success">
						Вопрос отправлен на рассмотрение!<br>
						Возможно, вскоре Вы его увидите на этой странице.
					</p>
				';
			}
		}
	}
	else
	{
		$a=rand(1,9);$b=rand(1,9);
		$form=
		'
			<form id="form" action="" method="post">
				<label>
					Ваш E-Mail:
					<input type="text" name="email" id="email">
				</label>
				<textarea name="add" rows="5" id="question"></textarea>
				<label>
					Сколько будет <strong id="a">'.$a.'</strong> плюс <strong id="b">'.$b.'</strong>?
					<input type="text" name="c" id="c">
				</label>
				<input type="hidden" name="a" value="'.$a.'">
				<input type="hidden" name="b" value="'.$b.'">
				<input type="submit" name="submit" value="Спросить">
			</form>
		';
	}
	include("blocks/db.php");
	$result=mysql_query("SELECT * FROM page WHERE page='faq'",$db);
	$myrow=mysql_fetch_array($result);
	$view=$myrow["view"]+1;
	$result=mysql_query("UPDATE page SET view='$view' WHERE page='faq'");
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
					echo$myrow['text']."<div id='accordion'>";
					$result=mysql_query("SELECT * FROM faq",$db);
					$myrow=mysql_fetch_array($result);
					
					do
					{
						printf('<h2><a href="#"><strong>%s</strong></a></h2><div><p>%s</p></div>', $myrow["question"], $myrow["answer"]);
					}
					while($myrow=mysql_fetch_array($result));
				?>
				</div>
				<p>Если вы не нашли в этом списке ответа на возникший у Вас вопрос, то задайте его нам <a href="mailto:training67@yandex.ru" class="info">напрямую</a>, заполнив это поле:</p>
				<?=$form?>
			</div>
			<div id="footer"></div>
			<a href="index.php">
				<div id="index" class="sertif"></div>
			</a>
		</div>
	</body>
</html>