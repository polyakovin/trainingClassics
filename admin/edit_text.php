<?
	include("blocks/db.php");
	
	if (isset($_GET['id']))
		$id = $_GET['id'];

	if (isset($_POST['id']))
		$id = $_POST['id'];

	if (isset($_POST['title']))
	{
		$title = $_POST['title'];
		if ($title == "")
			unset($title);
	}

	if (isset($_POST['text']))
	{
		$text = $_POST['text'];
		if ($text == "")
			unset($text);
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head lang="ru" xmlns="http://www.w3.org/1999/xhtml">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<?
			include("blocks/style.php");
		?>
		<title>Классика тренинга - Изменяем текст на сайте</title>
	</head>
	<body>
		<div id="body">
			<div id="header"></div>
			<?
				include("blocks/leftbar.php");
			?>
			<div id="main">
				<h1>Изменяем текст на сайте!</h1>
				<?
					if(isset($id) && isset($title) && isset($text))
					{
						$result=mysql_query("UPDATE page SET title='$title',text='$text' WHERE id='$id'");
						if($result=='true')
							echo"<h3 id='success'>Информация в базе успешно обновлена, спасибо!</h3>";
						else
							echo"<h3 id='warning'>Ошибка!</h3>";
					}
					else
					{
						$result=mysql_query("SELECT * FROM page WHERE id=$id",$db);
						$myrow=mysql_fetch_array($result);
						print<<<HERE
						<form name="form1" method="post" action="edit_text.php">
							<label>
								Название страницы:<br>
								<input value="$myrow[title]" type="text" name="title" id="title" size="70">
							</label><br>   
							<label>
								Текст (см. <a href="index.php">Руководство</a>):<br>
								<textarea name="text" id="text" cols="70" rows="25">$myrow[text]</textarea>
							</label><br>
							<input name="id" type="hidden" value="$myrow[id]">
							<label>
								<input type="submit" name="submit" id="submit" value="Изменить параметры страницы ->">
							</label>
						</form>
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