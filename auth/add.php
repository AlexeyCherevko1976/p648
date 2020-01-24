<?

if ($_POST['reviews_f']) {

	if ( strlen($_POST['message']) < 10 or strlen($_POST['message']) > 100 )
		message('Длина сообщения должна составлять 10 - 100 символов');

	$arr = array('b', 'i', 'audio', 'video');

	foreach ($arr as $val) {
		if ( substr_count($_POST['message'], "[$val]") != substr_count($_POST['message'], "[/$val]") )
			message('Найден лишний или не закрытый тег BB кода');
	}


	$url_arr = array(
		substr_count($_POST['message'], '[url='),
		substr_count($_POST['message'], '=name='),
		substr_count($_POST['message'], '[/url]'),
		);

	if ( count(array_count_values($url_arr)) != 1 )
		message('Найден лишний или не закрытый тег BB кода (Ссылка)');

	

	message('OK');

	mysqli_query($CONNECT, 'INSERT INTO `reviews` VALUES ("", "'.$_SESSION['id'].'", "'.mysqli_real_escape_string($CONNECT, $_POST['message']).'")');

	go('reviews');
}



?>