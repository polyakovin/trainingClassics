<?
	include("blocks/db.php");
	
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
		<title>Классика тренинга - Добавим вопрос и ответ</title>
	</head>
	<body>
		<div id="body">
			<div id="header"></div>
			<?
				include("blocks/leftbar.php");
			?>
			<div id="main">
				<h1>Добавим вопрос и ответ!</h1>
				<?
					if(isset($question) && isset($answer))
					{
						$result=mysql_query("INSERT INTO faq (question,answer) VALUES ('$question','$answer')");
						if($result=='true') 
							echo
							"
								<h3 id='success'>Вопрос успешно добавлен в базу, спасибо!</h3>
								<h4>
									<a href='new_faq.php'>Добавить ещё один вопрос</a><br>
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
									Вопрос:<br>
									<textarea name="question" id="question" cols="70" rows="5"></textarea>
								</label><br>
								<label>
									Ответ:<br>
									<textarea name="answer" id="answer" cols="70" rows="5"></textarea>
								</label><br>
								<label>
									<input type="submit" name="submit" id="submit" value="Добавить в базу ->">
								</label>
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