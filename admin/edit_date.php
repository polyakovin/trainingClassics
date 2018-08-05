<?
	include("blocks/db.php");
	
	if(isset($_POST['id']))
		$id=$_POST['id'];
		
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
		<title>Классика тренинга - Исправляем ошибки</title>
	</head>
	<body>
		<div id="body">
			<div id="header"></div>
			<?
				include("blocks/leftbar.php");
			?>
			<div id="main">
				<h1>Исправьте мероприятие:</h1>
				<?
					if(isset($title) && isset($text) && isset($date))
					{
						$result=mysql_query("UPDATE date SET title='$title',text='$text',date='$date' WHERE id='$id'");
						if($result=='true')
							echo"<h3 id='success'>Информация в базе успешно обновлена, спасибо!</h3>";
						else
							echo"<h3 id='warning'>Ошибка! Не удалось обновить базу данных! Пожалуйста, заполните ВСЕ поля!</h3>";
					}
					else
					{
						$result=mysql_query("SELECT * FROM date WHERE id=$id",$db);
						$myrow=mysql_fetch_array($result);
						print <<<HERE
						<form method="post" action="edit_date.php">
							<label>
								Дата проведения:<br>
								<input value="$myrow[date]" id="date" type="text" name="date">
							</label><br>
							<label>
								Заголовок:<br>
								<input value="$myrow[title]" type="text" name="title">
							</label><br>
							<label>
								Описание:<br>
								<textarea name="text" rows="5">$myrow[text]</textarea>
							</label><br>
							<input name="id" type="hidden" value="$myrow[id]">
							<label>
								<input type="submit" name="submit" value="Исправить мероприятияь ->">
							</label>
						</from>
HERE;
					}
				?>
			</div>
			<div id="footer"></div>
			<a href="index.php">
				<div id="index" class="sertif"></div>
			</a>
		</div>
	</body>
</html>