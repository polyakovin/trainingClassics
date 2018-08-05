<?
	include("blocks/db.php");
	
	if(isset($_POST['id']))
		$id=$_POST['id'];
	
	if(isset($_POST['question']))
	{
		$question=$_POST['question'];
		if($question=="")
			unset($question);
	}
	
	if(isset($_POST['answer']))
	{
		$answer=$_POST['answer']; 
		if($answer=="")
			unset($answer);
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head lang="ru" xmlns="http://www.w3.org/1999/xhtml">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<?
			include("blocks/style.php");
		?>
		<title>Классика тренинга - Исправляем ошибки</title>
	</head>
	<body>
		<div id="body">
			<div id="header"></div>
			<?
				include("blocks/leftbar.php");
			?>
			<div id="main">
				<h1>Измените вопрос и ответ:</h1>
				<?
					if(isset($answer) && isset($question))
					{
						$result=mysql_query("UPDATE faq SET question='$question',answer='$answer' WHERE id='$id'");
						if($result=='true')
							echo "<h3 id='success'>Информация в базе успешно обновлена, спасибо!</h3>";
						else
							echo "<h3 id='warning'>Ошибка! Не удалось обновить базу данных! Пожалуйста, заполните ВСЕ поля!</h3>";
					}
					else
					{
						$result=mysql_query("SELECT * FROM faq WHERE id=$id",$db);
						$myrow=mysql_fetch_array($result);
						print<<<HERE
						<form method="post" action="edit_faq.php">
							<label>
								Вопрос:<br>
								<textarea name="question" id="question" cols="70" rows="5">$myrow[question]</textarea>
							</label><br>
							<label>
								Ответ:<br>
								<textarea name="answer" id="answer" cols="70" rows="5">$myrow[answer]</textarea>
							</label<br>
							<input name="id" type="hidden" value="$myrow[id]">
							<label>
								<input type="submit" name="submit" id="submit" value="Изменить вопрос ->">
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