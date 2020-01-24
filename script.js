function post_query( url, name, data ) {


	var str = '';


	$.each( data.split('.'), function(k, v) {
		str += '&' + v + '=' + $('#' + v).val();
	} );


	$.ajax(

	{
		url : '/' + url,
		type: 'POST',
		data: name + '_f=1' + str,
		cache: false,
		success: function( result ) {

			obj = jQuery.parseJSON( result );

			if ( obj.go ) go( obj.go );
			else alert( obj.message );



	}





	}

	);

}



function go( url ) {
	window.location.href='/' + url;
}


function bbcode( name ) {
	
	if ( name == 'video') {
		url = prompt('Введите URL видеозаписи', '');
		if (url)
			data = '[video]' + url + '[/video]';
	}

	else if ( name == 'audio') {
		url = prompt('Введите URL аудиозаписи', '');
		if (url)
			data = '[audio]' + url + '[/audio]';
	}

	else if ( name == 'url') {
		url = prompt('Введите URL', '');
		if (url) {
			name = prompt('Введите название ссылки', '');
			if (name) {
				data = '[url=' + url + '=name=' + name + '[/url]';
			}
		}
	}


	if (data)
		$('#message').append(data);






}
