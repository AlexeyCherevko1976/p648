<? top('Отзывы') ?>

<h1>Отзывы</h1>
<p><button onclick="bbcode('url')">Ссылка</button> <button onclick="bbcode('audio')">Аудио</button> <button onclick="bbcode('video')">Видео</button></p>
<p><textarea id="message" placeholder="Текст сообщения"></textarea></p>
<p><button onclick="post_query('add', 'reviews', 'message')">Добавить</button></p>



<h1>Список отзывов</h1>

<?
$query = mysqli_query($CONNECT, 'SELECT `text`, `uid` FROM `reviews` ORDER BY `id` DESC');


if ( !mysqli_num_rows($query) ) exit('Список отзывов пуст');




while ( $row = mysqli_fetch_assoc($query) ) {

	$user = mysqli_fetch_assoc( mysqli_query($CONNECT, "SELECT `email` FROM `users` WHERE `id` = $row[uid]") );





	echo '<div class="reviews"><span>Отправитель: '.$user['email'].'</span>'.bbcode( nl2br( htmlspecialchars($row['text']), false) ).'</div>';



}




bottom() ?>