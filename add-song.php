

<?php

	require_once __DIR__ . '/ArtistQuery.php';
	require_once __DIR__ . '/GenreQuery.php';
	require_once __DIR__ . '/Song.php';

	$artistQuery = new ArtistQuery();
	$artistList = $artistQuery->getAll(); 
	$genreQuery = new GenreQuery();
	$genreList = $genreQuery->getAll(); 
	$song = new Song();
	if(isset($_POST['submit'])){
		$title = $_POST['title'];
		$price = $_POST['price'];
		$artist_id = $_POST['artist'];
		$genre_id = $_POST['genre'];

		$song->setTitle($title);
		$song->setPrice($price);
		$song->setArtistId($artist_id);
		$song->setGenreId($genre_id);
		$song->save();
		#The snipped would show regardless whether submit is set or not. I put this in the brackets to show it only after submitted. 
		echo "<p>The song \"" .  $song->getTitle() . "\" with an ID of " . $song->getId() . " was inserted successfully!</p>";
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Add Song</title>
</head>
<body>

<form action="add-song.php" method="post">
	Title: <input type="text" name ="title" >
	Price: <input type="text" name = "price" >

	<select name="artist">
		<?php foreach($artistList as $artist) : ?>
			<?php echo " <option value=$artist->id> $artist->artist_name </option>"?>
		<?php endforeach ?>
	</select>
	<select name ="genre">
		<?php foreach($genreList as $genre) : ?>
			<?php echo " <option value=$genre->id> $genre->genre </option>"?>
		<?php endforeach ?>
	</select>
	<input type="submit" value ="Add" name="submit">
</form>




</body>
</html>