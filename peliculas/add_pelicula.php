<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<!--
		Supersized - Fullscreen Slideshow jQuery Plugin
		Version : 3.2.7
		Site	: www.buildinternet.com/project/supersized
		
		Author	: Sam Dunn
		Company : One Mighty Roar (www.onemightyroar.com)
		License : MIT License / GPL License
	-->

	<head>

		<title>CineClub Venta y alquiler de peliculas DVD</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		
		<link rel="stylesheet" href="../css/css.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="../css/supersized.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="../theme/supersized.shutter.css" type="text/css" media="screen" />
		
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
		<script type="text/javascript" src="../js/jquery.easing.min.js"></script>
		
		<script type="text/javascript" src="../js/supersized.3.2.7.min.js"></script>
		<script type="text/javascript" src="../theme/supersized.shutter.min.js"></script>
		
		<script type="text/javascript">
			
			jQuery(function($){
				
				$.supersized({
				
					// Functionality
					slideshow               :   1,			// Slideshow on/off
					autoplay				:	1,			// Slideshow starts playing automatically
					start_slide             :   0,			// Start slide (0 is random)
					stop_loop				:	0,			// Pauses slideshow on last slide
					random					: 	0,			// Randomize slide order (Ignores start slide)
					slide_interval          :   10000,		// Length between transitions
					transition              :   6, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
					transition_speed		:	1000,		// Speed of transition
					new_window				:	1,			// Image links open in new window/tab
					pause_hover             :   0,			// Pause slideshow on hover
					keyboard_nav            :   1,			// Keyboard navigation on/off
					performance				:	1,			// 0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
					image_protect			:	1,			// Disables image dragging and right click with Javascript
															   
					// Size & Position						   
					min_width		        :   0,			// Min width allowed (in pixels)
					min_height		        :   0,			// Min height allowed (in pixels)
					vertical_center         :   1,			// Vertically center background
					horizontal_center       :   1,			// Horizontally center background
					fit_always				:	0,			// Image will never exceed browser width or height (Ignores min. dimensions)
					fit_portrait         	:   1,			// Portrait images will not exceed browser height
					fit_landscape			:   1,			// Landscape images will not exceed browser width
															   
					// Components							
					slide_links				:	'blank',	// Individual links for each slide (Options: false, 'num', 'name', 'blank')
					thumb_links				:	1,			// Individual thumb links for each slide
					thumbnail_navigation    :   0,			// Thumbnail navigation
					slides 					:  	[			// Slideshow Images
														{image : '../img/peliculas/sky.jpg', title : 'Agente 007: Skyfall', thumb : '../img/peliculas/sky.jpg', url : 'http://www.nonsensesociety.com/2011/04/maria-kazvan/'},
														{image : '../img/peliculas/bd.jpg', title : 'Amanecer: Parte 2', thumb : '../img/peliculas/bd.jpg', url : 'http://www.nonsensesociety.com/2011/04/maria-kazvan/'},  
														{image : '../img/peliculas/brave.jpg', title : 'Valiente', thumb : '../img/peliculas/brave.jpg', url : 'http://www.nonsensesociety.com/2011/04/maria-kazvan/'},
														{image : '../img/peliculas/taken.jpg', title : 'Taken 2', thumb : '../img/peliculas/taken.jpg', url : 'http://www.nonsensesociety.com/2011/03/colin/'},
												],
												
					// Theme Options			   
					progress_bar			:	0,			// Timer for each slide							
					mouse_scrub				:	0
					
				});
		    });
		    
		</script>

	</head>

<body>
			<div id="header">
			</div>
			
			<form name="newmovie" action="insertpelicula.php" method="post">
				  <fieldset>
				  <legend>Agregar Película</legend>
				   <label>Id Película</label><input type="text" size="40" maxlength="10" name="id_peli"> <br>
				   <label>Titulo</label><input type="text" size="40" maxlength="10" name="titulo" >  
				   <label>Año</label><input type="text" size="40" maxlength="10" name="anio" >  
				   <label>Duración</label><input type="text" size="40" maxlength="10" name="duracion" >  
				   <label>Sinopis</label><input type="text" size="40" maxlength="10" name="sinopsis" >  
				   <label>Cantidad</label><input type="text" size="40" maxlength="10" name="cantidad" >  
				   <label>Disponibilidad</label>
				   <select name="disponibilidad">
					   <option value="true">Si</option>
					   <option value="false">No</option>
				   </select>
				   <label>Género</label>
					<select name="genero">
						<option value="">Seleccione un Género</option>
						<?
						include("../conectar.php");
						$consulta="select nombre_genero,nombre_genero from tbl_generos";
						$result=mysql_query($consulta);
						?>						
						<?
						while($fila=mysql_fetch_row($result)){
							echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
						}
						?>
					</select>
				   <label>Director</label>
					<select name="director">
						<option value="">Seleccione un Director</option>
						<?
						include("../conectar.php");
						$consulta="select nombre_director,nombre_director from tbl_director";
						$result=mysql_query($consulta);
						?>						

						<?
						while($fila=mysql_fetch_row($result)){
							echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
						}
						?>
					</select>
				   <label>Actores</label>
					<select name="actor">
						<option value="">Seleccione un Actor</option>
						<?
						include("../conectar.php");
						$consulta="select nombre_actor,nombre_actor from tbl_actores";
						$result=mysql_query($consulta);
						?>						

						<?
						while($fila=mysql_fetch_row($result)){
							echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
						}
						?>
					</select>
				   <label>Carátula</label><input type="text" size="40" maxlength="10" name="genero" >  

				  </fieldset>
				  <br>
				  <input type="submit" value="Agregar Género">
				  <input type="reset" value="Limpiar formulario">
			</form>

	<!--Thumbnail Navigation-->
	<div id="prevthumb"></div>
	<div id="nextthumb"></div>
	

	<div id="thumb-tray" class="load-item">
		<div id="thumb-back"></div>
		<div id="thumb-forward"></div>
	</div>

	<!--Control Bar-->
	<div id="controls-wrapper" class="load-item">
		<div id="controls">
			
			<a id="play-button"><img id="pauseplay" src="img/pause.png"/></a>

			
			<!--Slide captions displayed here-->
			<div id="slidecaption"></div>
			
			<!--Thumb Tray button-->
			<a id="tray-button"><img id="tray-arrow" src="img/button-tray-up.png"/></a>
			
			<!--Navigation-->
			<ul id="slide-list"></ul>
			
		</div>
	</div>

</body>
</html>
