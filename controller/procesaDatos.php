<?php

	$id_movie = $_POST['movie_id'];
	$server1  = $_POST['server_1'];
	$server2  = $_POST['server_2'];
	$server3  = $_POST['server_3'];
	$server4  = $_POST['server_4'];

	$idioma1  = $_POST['cboIdioma1'];
	$idioma2  = $_POST['cboIdioma2'];
	$idioma3  = $_POST['cboIdioma3'];
	$idioma4  = $_POST['cboIdioma4'];


	$output = array();

	// Detalle de la Pelicula
	$curl_detalle = curl_init();

	curl_setopt_array($curl_detalle, array(
	  CURLOPT_URL => 'https://api.themoviedb.org/3/movie/'.$id_movie.'?api_key=ccbaffcadfaedf4c79b5c009d0277e12&language=es',
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'GET',
	));

	$response = curl_exec($curl_detalle);

	curl_close($curl_detalle);
	//echo $response;

   	$detalle_movie = (json_decode($response,true));

   	$original_title = $detalle_movie['original_title'];
   	$descripcion = $detalle_movie['overview'];
   	$generos = $detalle_movie['genres'];

   	$genero_cadena = "";
   	foreach ($generos as $key => $value) {
   		$genero_cadena = trim($genero_cadena)." ".$value['name'].",";
   	}

   	$poster_path = $detalle_movie['poster_path'];
   	$estreno = $detalle_movie['release_date'];
   	$vote_average = $detalle_movie['vote_average'];
   	$runtime = $detalle_movie['runtime'];
   	$pais = $detalle_movie['production_countries'][0]['iso_3166_1'];

   	$translation_curl = curl_init();

	curl_setopt_array($translation_curl, array(
	  CURLOPT_URL => 'https://api.themoviedb.org/3/movie/'.$id_movie.'/translations?api_key=ccbaffcadfaedf4c79b5c009d0277e12',
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'GET',
	));

	$response_translation = curl_exec($translation_curl);

	curl_close($translation_curl);
	
	$traducciones = (json_decode($response_translation,true));

	$traduccion_titulo = $original_title;

	foreach ($traducciones['translations'] as $key => $value) {
		If($value['iso_3166_1'] == 'MX'){
			$traduccion_titulo = $value['data']['title'];
			$traduccion_contenido = $value['data']['overview'];

			If (trim($traduccion_titulo) == ""){
				$traduccion_titulo = $original_title;
			}

			If (trim($traduccion_contenido) != ""){
				$descripcion = $traduccion_contenido;
			}

		}
	}


	$curl_videos = curl_init();

	curl_setopt_array($curl_videos, array(
	  CURLOPT_URL => 'https://api.themoviedb.org/3/movie/'.$id_movie.'/videos?api_key=ccbaffcadfaedf4c79b5c009d0277e12&language=es',
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'GET',
	));

	$response_videos = curl_exec($curl_videos);

	curl_close($curl_videos);
	

	$videos_movie = (json_decode($response_videos,true));

	$codigo_youtube = '';

	foreach ($videos_movie['results'] as $key => $value) {
		If($value['iso_639_1'] == 'es' && $value['type'] == 'Trailer' && $value['official'] == true && $value['site'] == 'YouTube'){
			$codigo_youtube = $value['key'];
		}
	}


	/*
	$curl_conf = curl_init();

	curl_setopt_array($curl_conf, array(
	  CURLOPT_URL => 'https://api.themoviedb.org/3/configuration?api_key=ccbaffcadfaedf4c79b5c009d0277e12',
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'GET',
	));

	$response_conf = curl_exec($curl_conf);

	curl_close($curl_conf);
	*/


	$curl_images = curl_init();

	curl_setopt_array($curl_images, array(
	  CURLOPT_URL => 'https://api.themoviedb.org/3/movie/'.$id_movie.'/images?api_key=ccbaffcadfaedf4c79b5c009d0277e12&language=es',
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'GET',
	));

	$response_images = curl_exec($curl_images);

	curl_close($curl_images);

	$images_movie = (json_decode($response_images,true));

	if(!isset($images_movie['posters'][0]['file_path'])){
		$img_poster = $poster_path;
	}else{
		$img_poster = $images_movie['posters'][0]['file_path'];
	}

	

	$base_path = "https://image.tmdb.org/t/p/";
	$size_img = "original";

	$img_path = $base_path.$size_img."/".$img_poster;


   	$html = "";

   	$html = ' <p><span style="text-align: center;"> </span></p> ';
   	$html = $html.' <div class="separator" style="clear: both; text-align: center;"> ';
   	$html = $html.' <img border="0" height="640" src="'.$img_path.'" width="426"/> ';
   	$html = $html.' </div> ';
   	$html = $html.' <br /> ';
   	$html = $html.' <div class="separator" style="clear: both;"> ';
   	$html = $html.' <h2 style="text-align: center;">'.strtoupper($traduccion_titulo).'</h2> ';
   	$html = $html.' <div style="text-align: center;"><b>Estreno: '.$estreno.' | Pais: '.$pais.' | Tiempo: '.$runtime.' Min.</b></div><div><br /></div>';
   	$html = $html.' <div></div> ';
   	$html = $html.' <blockquote>'.$descripcion.' {alertInfo} '.'</blockquote> ';
   	$html = $html.' <h3 style="clear: both; text-align: center;"><span style="font-size: medium;"><br /></span></h3><h3 style="clear: both; text-align: center;"><span style="font-size: medium;">VER '.strtoupper($traduccion_titulo).' EN ESPAÑOL LATINO HD GRATIS ONLINE</span></h3>';
   	//$html = $html.' <div><span style="background-color: #f9f9f9; color: blue; font-family: monospace; font-size: 12px;" ></span></div> ';
   	//$html = $html.' <p> <a href="#" rel="nofollow" >{getButton} $text={Información} $icon={previous} $color={#80c7e8}</a></p> ';
   	//$html = $html.' <div class="separator" style="clear: both; text-align: center;"><br /></div> ';
   	$html = $html.' <div class="separator" style="clear: both; text-align: center;"><br /></div> ';
   	$html = $html.' <p><a href="#" rel="nofollow">{getButton} $text={Leyenda} $icon={previous} $color={#80c7e8}</a></p> ';

   	$html = $html.' <div class="separator" style="clear: both; text-align: left;"> ';
   	$html = $html. ' <ul style="text-align: left;"> ';
   	$html = $html. ' <li><span style="font-size: medium;"><img height="20" src="https://pic.sopili.net/pub/emoji/twitter/2/72x72/1f1f2-1f1fd.png" style="top: 5px;" width="20" /></span> Español&nbsp; Latino</li>';
   	$html = $html. ' <li><span style="font-size: medium;"><img height="20" src="https://pic.sopili.net/pub/emoji/twitter/2/72x72/1f1ea-1f1f8.png" style="top: 5px;" width="20" /></span> Español Castellano</li>';
   	$html = $html. '  <li><span style="font-size: medium;"><img height="20" src="https://pic.sopili.net/pub/emoji/twitter/2/72x72/1f1fa-1f1f8.png" style="top: 5px;" width="20" /></span> Inglés Subtítulos Español</li> ';
   	$html = $html. ' <li><span style="font-size: medium;"><img height="20" src="https://pic.sopili.net/pub/emoji/twitter/2/72x72/1f1ef-1f1f5.png" style="top: 5px;" width="20" /></span> Japonés Subtítulos Español</li>';
   	$html = $html. ' </ul>';
   	$html = $html.' </div> ';
   	$html = $html.' <div class="separator" style="clear: both; text-align: center;"><br /></div> ';
   	
   	$html = $html.' <ul class="tabs_movies"> ';

   	if (trim($server1) != ""){
   		$html = $html.' <li> ';
   		$html = $html.' <a href="#tab1">NETU ';
	   	$html = $html.' <span style="font-size: medium;"> ';
	   	$html = $html.' <img height="20" src="https://pic.sopili.net/pub/emoji/twitter/2/72x72/'.$idioma1.'.png" style="top: 5px;" width="20" /></span> ';
	   	$html = $html.' </a>    ';
	   	$html = $html.' </li> ';
   	}

   	if (trim($server2) != ""){
   		$html = $html.' <li> ';
	   	$html = $html.' <a href="#tab2">UQLOAD   ';
	   	$html = $html.' <span style="font-size: medium;">  ';
	   	$html = $html.' <img height="20" src="https://pic.sopili.net/pub/emoji/twitter/2/72x72/'.$idioma2.'.png" style="top: 5px;" width="20" /></span>  ';
	   	$html = $html.' </a> ';
	   	$html = $html.' </li> ';
   	}

   	if (trim($server3) != ""){
   		$html = $html.' <li> ';
	   	$html = $html.' <a href="#tab3">STREAMTAPE   ';
	   	$html = $html.' <span style="font-size: medium;">  ';
	   	$html = $html.' <img height="20" src="https://pic.sopili.net/pub/emoji/twitter/2/72x72/'.$idioma3.'.png" style="top: 5px;" width="20" /></span>  ';
	   	$html = $html.' </a> ';
	   	$html = $html.' </li> ';
   	}

   	if (trim($server4) != ""){
   		$html = $html.' <li> ';
	   	$html = $html.' <a href="#tab4">DOODSTREAM   ';
	   	$html = $html.' <span style="font-size: medium;">  ';
	   	$html = $html.' <img height="20" src="https://pic.sopili.net/pub/emoji/twitter/2/72x72/'.$idioma4.'.png" style="top: 5px;" width="20" /></span>  ';
	   	$html = $html.' </a> ';
	   	$html = $html.' </li> ';
   	}

   	$html = $html.' <li> ';
   	$html = $html.' <a href="#tab99">TRAILER   ';
   	$html = $html.' <span style="font-size: medium;">  ';
   	$html = $html.' <img height="20" src="https://pic.sopili.net/pub/emoji/twitter/2/72x72/1f1f2-1f1fd.png" style="top: 5px;" width="20" /></span>  ';
   	$html = $html.' </a> ';
   	$html = $html.' </li> ';
   	$html = $html.' </ul> ';


   	$html = $html.' <div class="contenedor_tab"> ';

   	if (trim($server1) != ""){
   		$html = $html.' <div class="contenido_tab" id="tab1"> ';
	   	$html = $html. trim($server1) ;
	   	$html = $html.' </div> ';
   	}

   	if (trim($server2) != ""){
   		$html = $html.' <div class="contenido_tab" id="tab2"> ';
	   	$html = $html. trim($server2) ;
	   	$html = $html.' </div> ';
   	}

   	if (trim($server3) != ""){
   		$html = $html.' <div class="contenido_tab" id="tab3"> ';
	   	$html = $html. trim($server3) ;
	   	$html = $html.' </div> ';
   	}

   	if (trim($server4) != ""){
   		$html = $html.' <div class="contenido_tab" id="tab4"> ';
	   	$html = $html. trim($server4) ;
	   	$html = $html.' </div> ';
   	}

   	$html = $html.' <div class="contenido_tab" id="tab99"> ';
   	$html = $html. ' <iframe width="560" height="315" src="https://www.youtube.com/embed/'.$codigo_youtube.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> ' ;
   	$html = $html.' </div> ';

   	$html = $html.' </div> ';


   	$html = $html.' <div style="clear: both;"> ';
   	$html = $html.' </div> ';

   	$html = $html.' <blockquote> Si no puedes ver la Película en ninguno de nuestros Servers, deja un comentario y será resubida en pocos minutos. {alertWarning} </blockquote> ';

   	$html = $html. $genero_cadena;

   	$html_final = htmlentities($html);

   	echo($html_final); 

?>