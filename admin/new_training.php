<?
	include("blocks/db.php");
	
	if(isset($_POST['name']))
	{
		$name=$_POST['name'];
		if($name=="")
			unset($name);
	}
	
	if(isset($_POST['time']))
	{
		$time=$_POST['time'];
		if($time=="")
			unset($time);
	}
	
	if(isset($_POST['text']))
	{
		$text=$_POST['text'];
		if($text=="")
			unset($text);
	}
	
	if(isset($_POST['type']))
	{
		$type=$_POST['type'];
		if($type=="")
			unset($type);
	}
	
	if(isset($_POST['price1']))
	{
		$price1=$_POST['price1'];
		if($price1=="")
			unset($price1);
	}
	
	if(isset($_POST['price2']))
	{
		$price2=$_POST['price2'];
		if($price2=="")
			unset($price2);
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head lang="ru" xmlns="http://www.w3.org/1999/xhtml">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<?
			include("blocks/style.php");
		?>
		<title>Классика тренинга - Добавим тренинг</title>
	</head>
	<body>
		<div id="body">
			<div id="header"></div>
			<?
				include("blocks/leftbar.php");
			?>
			<div id="main">
				<h1>Добавим тренинг!</h1>
				<?
					if(isset($name) && isset($time) && isset($text) && isset($type) && isset($price1) && isset($price2))
					{
						$result=mysql_query("INSERT INTO trainings (name,time,text,type,price1,price2) VALUES ('$name','$time','$text','$type','$price1','$price2')");
						if($result=='true') 
							echo
							"
								<h3 id='success'>Тренинг успешно добавлен в базу, спасибо!</h3>
								<h4>
									<a href='new_training.php'>Добавить ещё один тренинг</a><br>
									<a href='index.php'>Вернуться в меню</a>
								</h4>
							";
						else
							echo"<h3 id='warning'>Ошибка! Не удалось добавить вопрос в базу данных! Пожалуйста, заполните ВСЕ поля!</h3>";
					}	
					else
						echo
						'
							<form action="" method="post">	
								<label>
									Название:<br>
									<input type="text" name="name" id="name" size="65">
								</label><br>
								<label>
									Контенгент:<br>
									<select name="type" id="type" type="select">
										<option value="1">Продавцы-консультанты, менеджеры по продажам.</option>
										<option value="2">Менеджеры среднего звена, TOP-менеджеры.</option>
										<option value="3">Специалисты по подбору персонала.</option>
									</select>
								</label><br>
								<label>\
									Продолжительность:<br>
									<input type="text" name="time" id="time" size="65">
								</label><br>
								<label>
									Описание:<br>
									<textarea name="text" id="text" cols="70" rows="5"></textarea>
								</label><br>
								<label>
									Цена для одного человека:<br>
									<input type="text" name="price1" id="price1" size="65">
								</label><br>
								<label>
									Цена для группы:<br>
									<input type="text" name="price2" id="price2" size="65">
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