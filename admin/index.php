<?
	include("blocks/db.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head lang="ru" xmlns="http://www.w3.org/1999/xhtml">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<?
			include("blocks/style.php");
		?>
		<title>Классика тренинга - Администрация Сайта</title>
	</head>
	<body>
		<div id="body">
			<div id="header"></div>
			<?
				include("blocks/leftbar.php");
			?>
			<div id="main">
				<h1>Администрация сайта</h1>
				<h2>Количество посещений страниц:</h2>
				<?
					$result=mysql_query("SELECT title,view FROM page ORDER BY view DESC",$db);
					$myrow=mysql_fetch_array($result);
					
					do
					{
						printf("<strong>%s</strong> - %s<br>", $myrow['title'], $myrow['view']);
					}
					while($myrow=mysql_fetch_array($result));
					
					$result=mysql_query("SELECT COUNT(*) FROM trainings WHERE type='1'",$db);
					$sum1=mysql_fetch_array($result);
					$result=mysql_query("SELECT COUNT(*) FROM trainings WHERE type='2'",$db);
					$sum2=mysql_fetch_array($result);
					$result=mysql_query("SELECT COUNT(*) FROM trainings WHERE type='3'",$db);
					$sum3=mysql_fetch_array($result);
					$date=date("d.m.Y");
					$result=mysql_query("SELECT COUNT(*) FROM date WHERE date>='$date'",$db);
					$sum4=mysql_fetch_array($result);
					printf
					(
						"
							<h2>Тренинги на сайте:</h2>
							<p>
								<strong>%s</strong> - для продавцы-консультантов и менеджеров по продажам;
							</p>
							<p>
								<strong>%s</strong> - для менеджеров среднего звена и TOP-менеджеров;
							</p>
							<p>
								<strong>%s</strong> - для специалистов по подбору персонала.
							</p><br>
							
							<p>
								Мероприятия создаются на сервисе <a href='https://www.google.com/calendar/render?tab=cc'>Google Календарь</a>.
							</p>
							<p>Адрес электронной почты: <strong><a href='mailto:smol.training@gmail.com'>smol.training@gmail.com</a></strong></p>
							<p>Пароль: <strong>orlevich</strong></p><br>
						", $sum1[0], $sum2[0], $sum3[0]
					);
				?>
				<h2>Краткое руководство по редакции текстов на сайте:</h2>
				<p>В основе сайта лежит язык разметки документов HTML, структура которго состоит из &lt;тегов&gt;. Они и придают Вашему сайту такой структурированный и красивый вид. Поэтому, если возникнет желание отредактировать страницы собственного сайта, следует ознакомиться с основными понятиями<br>о HTML-разметке.</p>
				<h4>Основные &lt;теги&gt;:</h4>
				<p>&lt;p&gt;Текст, заключённый в тег <strong>&lt;p&gt;</strong>, обозначает абзац, который <strong>всегда</strong> будет начинаться с красной строки. Но если нужно <strong>перенести строку</strong> прямо внутри абзаца, используйте тег&lt;/br&gt;.<br><strong>В конце</strong> тег абзаца <strong>должен</strong> закрываться таким образом.&lt;/p&gt;</p>
				<h1>&lt;h1&gt;Заголовок 1го уровня.&lt;/h1&gt;</h1>
				<h2>&lt;h2&gt;Заголовок 2го уровня.&lt;/h2&gt;</h2>
				<h3>&lt;h3&gt;Заголовок 3го уровня.&lt;/h3&gt;</h3>
				<ul>&lt;ul&gt;<br>
				<li>&lt;li&gt;Списки заключаются в тег <strong>&lt;ul&gt;</strong>&lt;/li&gt;</li>
				<li>&lt;li&gt;Каждый элемент списка должен быть заключён в тег <strong>&lt;li&gt;</strong>&lt;/li&gt;</li>
				&lt;/ul&gt;</li></ul><br>
				&lt;a href=&quot;http://ссылка, по которой надо перейти.ru&quot;&gt;Текст ссылки&lt;/a&gt;<br><br>
				<strong>&lt;strong&gt;Так текст станет ЖИРНЫМ&lt;/strong&gt;</strong><br><br>
				<em>&lt;em&gt;А так курсивным и, где надо, <strong>&lt;strong&gt;ЖИРНЫМ&lt;/strong&gt;</strong>&lt;/em&gt;</em>
			</div>
			<div id="footer"></div>
			<a href="index.php"><div id="index" class="sertif"></div></a>
		</div>
	</body>
</html>