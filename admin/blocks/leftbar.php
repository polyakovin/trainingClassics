<div id="navi">
	<div id="navig">
		<h4>Cтраницы</h4>
		<a href="edit_text.php?id=3">Главная</a></br>
		<a href="edit_text.php?id=5">Тренинги</a></br>
		<a href="edit_text.php?id=4">Ассессмент центр</a></br>
		<a href="edit_text.php?id=6">Календарь мероприятий</a></br>
		<a href="edit_text.php?id=7">F.A.Q.</a></br>

		<h4>Новости</h4>
		<form method="post" action="edit_news.php">
			<?
				$result=mysql_query("SELECT id,date,title FROM news ORDER BY id DESC LIMIT 5",$db);
				$myrow=mysql_fetch_array($result);
			?> 
			<label>
				<select name="id" type="select">
					<?
						do
						{
							printf("<option value='%s'>%s - %s</option>", $myrow['id'], $myrow['date'], $myrow['title']);
						}
						while($myrow=mysql_fetch_array($result))
					?>
				</select>
			</label>
			<label>
				<input type="submit" name="submit" value="Редактировать">
			</label>
		</form>
		<a href="new_news.php">Добавить</a><br>
		<a href="delete_news.php">Удалить</a><br>

		<h4>Мероприятия</h4>
		<form method="post" action="edit_date.php">
			<?
				$result=mysql_query("SELECT id,date,title FROM date ORDER BY id DESC",$db);
				$myrow=mysql_fetch_array($result);
			?> 
			<label>
				<select name="id" type="select">
					<?
						do
						{
							printf("<option value='%s'>%s - %s</option>", $myrow['id'], $myrow['date'], $myrow['title']);
						}
						while($myrow=mysql_fetch_array($result))
					?>
				</select>
			</label>
			<label>
				<input type="submit" name="submit" value="Редактировать">
			</label>
		</form>
		<a href="new_date.php">Добавить</a><br>
		<a href="delete_date.php">Удалить</a><br>

		<h4>Тренинги</h4>
		<form method="post" action="edit_training.php">
			<?
				$result=mysql_query("SELECT id,name FROM trainings ORDER BY name",$db);
				$myrow=mysql_fetch_array($result);
			?>
			<label>
				<select name="id" type="select">
					<?
						do
						{
							printf("<option value='%s'>%s</option>", $myrow['id'], $myrow['name']);
						}
						while($myrow=mysql_fetch_array($result))
					?>
				</select>
			</label>
			<label>
				<input type="submit" name="submit" value="Редактировать">
			</label>
		</form>
		<a href="new_training.php">Добавить</a><br>
		<a href="delete_training.php">Удалить</a><br>

		<h4>Вопросы и ответы</h4>
		<form method="post" action="edit_faq.php">
			<?
				$result=mysql_query("SELECT id,question FROM faq ORDER BY question",$db);
				$myrow=mysql_fetch_array($result);
			?> 
			<label>
				<select name="id" type="select" >
				<?
					do
					{
						printf("<option value='%s'>%s</option>", $myrow['id'], $myrow['question']);
					}
					while($myrow=mysql_fetch_array($result))
				?>
				</select>
			</label>
			<label>
				<input type="submit" name="submit" value="Редактировать">
			</label>
		</form>
		<a href="new_faq.php">Добавить</a><br>
		<a href="delete_faq.php">Удалить</a><br>
	</div>
</div>