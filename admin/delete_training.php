<?
	include("blocks/db.php");
	if(isset($_POST['id']))
		$id=$_POST['id'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head lang="ru" xmlns="http://www.w3.org/1999/xhtml">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<?
			include("blocks/style.php");
		?>
		<title>Классика тренинга - Удалим тренинг</title>
	</head>
	<body>
		<div id="body">
			<div id="header"></div>
			<?
				include("blocks/leftbar.php");
			?>
			<div id="main">
				<h1>Удалим тренинг!</h1>
				<?
					if(isset($id))
					{
						$result=mysql_query("DELETE FROM trainings WHERE id='$id'");
						if($result=='true')
							echo
							"
								<h3 id='success'>»нформаци¤ из базы успешно удалена, спасибо!</h3>
								<h4>
									<a href='delete_training.php'>Удалить ещё один тренинг</a><br>
									<a href='index.php'>Вернуться в меню</a>
								</h4>
							";
						else
							echo"<h3 id='warning'>Ошибка!</h3>";
					}
					else
					{
						echo'<form id="list" method="post" action="">';
						$result=mysql_query("SELECT id,name FROM trainings ORDER BY name",$db);
						$myrow=mysql_fetch_array($result);
						
						do
						{
							printf ("<input type=\"radio\" name=\"id\" id=\"%s\" value=\"%s\"><label for=\"%s\">%s</label><br>",$myrow["id"],$myrow["id"],$myrow["id"],$myrow["name"]);
						}
						while($myrow=mysql_fetch_array($result));
						
						echo
						'
								<input name="submit" type="submit" value="Удалить тренинг!">
							</form>
						';
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