<?
	include("blocks/db.php");

	if(isset($_POST['date']))
	{
		$date=$_POST['date'];
		if($date=="")
			unset($date);
	}

	if(isset($_POST['title']))
	{
		$title=$_POST['title'];
		if($title=="")
			unset($title);
	}

	if(isset($_POST['text']))
	{
		$text=$_POST['text'];
		if($text=="")
			unset($text);
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
	<? include("blocks/style.php");?>
	<title>Классика тренинга - Добавим Мероприятие</title>
	</head>
	<body>
		<div id="body">
			<div id="header"></div>
			<?
				include("blocks/leftbar.php");
			?>
			<div id="main">
				<h1>Добавим Мероприятие!</h1>
				<?
					if(isset($date) && isset($title) && isset($text))
					{
						$result=mysql_query("INSERT INTO date (date,title,text) VALUES ('$date','$title','$text')");
						if($result=='true') 
							echo
							"
								<h3 id='success'>Мероприятие успешно добавлено в базу, спасибо!</h3>
								<h4>
									<a href='new_date.php'>Добавить ещё одно мероприятие</a><br>
									<a href='index.php'>Вернуться в меню</a>
								</h4>
							";
						else
							echo "<h3 id='warning'>Ошибка! Не удалось добавить вопрос в базу данных! Пожалуйста, заполните ВСЕ поля!</h3>";
					}	
					else
						echo
						'
						<form action="" method="post">	
							<label>
								Дата проведения мероприятия:<br>
								<input type="text" id="date" name="date">
							</label><br>
							<label>
								Заголовок:<br>
								<input type="text" name="title">
							</label><br>
							<label>
								Описание:<br>
								<textarea name="text" rows="5"></textarea>
							</label><br>
							<input type="submit" name="submit" value="Добавить событие ->">
						</form>
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