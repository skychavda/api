
<!DOCTYPE html>
<html>
<head>
	<title>OMDB API Demo</title>
	<link rel="stylesheet" href="style.css"/>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<style>
		* {
		box-sizing: border-box;
		}
		body{
			font-family: 'Roboto', sans-serif;
			background-color:#000;
		}
		.container {
			width: 100%;
			padding-right: 15px;
			padding-left: 15px;
			margin-right: auto;
			margin-left: auto;
		}
		@media (min-width: 1200px)
		{
			.container {
				max-width: 1140px!important;
			}
			input[type=text]
			{
				width:100%;
			}
		}
		@media (max-width: 992px)
		{
			.container {
				max-width: 960px;
			}
			input[type=text]
			{
				width:100%;
			}
		}
		@media (max-width: 768px)
		{
			.container {
				max-width: 720px;
			}
			input[type=text]
			{
				width:100%;
			}
		}
		@media (max-width: 576px)
		{
			.container {
				max-width: 540px;
			}
			input[type=text]
			{
				width:100%;
			}
		}
		.well {
			min-height: 20px;
			padding: 19px;
			margin-bottom: 20px;
			background-color: #21202eb8;
			border: 1px solid #232439;
			border-radius: 4px;
			-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
			box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
			height:25rem;
		}
		.col-md-3, .col-lg-3, .col-sm-3{
			position: relative;
			min-height: 1px;
			padding-right: 15px;
			padding-left: 15px;
		}
		@media (min-width: 992px){
			.col-md-3
			{
				width:25%;
				float:left;
			}
		}
		@media (min-width: 1200px){
			.col-lg-3
			{
				width:25%;
				float:left;
			}
		}
		@media (min-width: 768px){
			.col-sm-3
			{
				width:25%;
				float:left;
			}
		}
		
		#logo{
			width:98%;
			height:13rem;
		}
		#poster{
			width:100%;
			height:15rem;
		}
		.document{
			margin-left:2rem;
			padding: 14px 4px;
			border: none;
			text-decoration:none;
			border-radius: 4px;
			color:#ff06069e;
			transition: color 2s, background-color 3s;
		}
		.document:hover{
			color:white;
			//text-decoration:underline;
			font-weight:bold;
			background-color:red;
			padding: 14px 4px; border: none; border-radius: 4px;
			cursor:pointer;
		}
	</style>
</head>
<body>
	<?php
	error_reporting(0);
		if(!empty($_POST['searchMovies']))
		{
			$strUrl = "http://www.omdbapi.com/?apikey=80b3264b&s=".urlencode($_POST['searchMovies']);
			$info = "http://www.omdbapi.com/?apikey=80b3264b&i=";
			$json=file_get_contents($strUrl);
			$omdb_array=json_decode($json,true);
		}
	?>
	<div class="container">
	<div class="jumbotron">
		<img id="logo" src="IMDB_Logo_2016.svg" alt="logo"/>
		<h1 class="display-4">OMdb API</h1>
		<p>The Open Movie Database</p>
	</div>
	</div>	
	<div class="container">
		<form method="post">
			<input type="text" name="searchMovies" style="margin-top:1rem; width:100%; padding:12px 20px; border-radius:4px; box-sizing: border-box; display: inline-block; border: 1px solid #ccc;" placeholder="Movie name" value="<?php echo isset($_POST['searchMovies'])?$_POST['searchMovies']:""?>">
			<input type="submit" name="search" style="background-color:#1fbc1ff0; color: white; padding: 14px 28px; border: none; border-radius: 4px; cursor: pointer; margin-top:1rem;"/>
			<a href="document.html" class="document">Documentation</a>
		</form>
	</div>
	<div id="display" name="display" style="margin-top:1rem;">
		<?php
		if(!empty([$omdb_array]))
		{
			foreach($omdb_array['Search'] as $details)
			{
				echo "<div class='col-lg-3 col-md-3 col-sm-3 '>";
					echo "<div class='well'>";
						echo '<img id="poster" src="'.$details['Poster'].'" alt=""/>';
						echo "<h2 style='text-align:center; padding-top:1rem; font-size:2rem; font-weight:bold; color:#fff;'>".$details['Title']."</h2>";
						echo "<h4 style='text-transform:uppercase; padding-top:0.5rem; color:#fff;'>Type : ".$details['Type']."</h4>";
						echo "<h4 style='color:#fff;'>Year : ".$details['Year']."</h4>";
					echo "</div>";
				echo "</div>";
			
			}
		}
		?>
	</div>
</body>
</html>