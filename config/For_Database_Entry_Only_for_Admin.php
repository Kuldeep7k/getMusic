<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
	</title>
	<style>
		input {
			width: 100%;
			font-size: 15px;
			padding: 8px;
			font-family: "Microsoft Sans Serif";
		}
		table td {
			font-size: 20px;
			font-style: oblique;
		}
	</style>
</head>

<body>
	<div id="wrapper">
		<h1> Enter Songs Details :-</h1>
		<div id="main" class="shadow-box">
			<div id="content">

				<form action="" method="POST" name="" enctype="multipart/form-data">
					<table>
						<tr><br>
						</tr>
						<tr>
							<td>Song_name:</td>
							<td><input type="text" size="100" name="song_name"
									value="<?php echo isset($song_name) ? $song_name : ""; ?>" /></td>
						</tr>
						<tr>
							<td>artist_name:</td>
							<td><input type="text" size="100" name="artist_name"
									value="<?php echo isset($artist_name) ? $artist_name : ""; ?>" /></td>
						</tr>
						<tr>
							<td>album_name:</td>
							<td><input type="text" size="100" name="album_name"
									value="<?php echo isset($album_name) ? $album_name : ""; ?>" /></td>
						</tr>
						<tr>
							<td>album_art:</td>
							<td><input type="text" size="100" name="album_art"
									value="<?php echo isset($album_art) ? $album_art : ""; ?>" /></td>
						</tr>
						<tr>
							<td>genre:</td>
							<td><input type="text" size="100" name="genre"
									value="<?php echo isset($genre) ? $genre : ""; ?>" /></td>
						</tr>
						<tr>
							<td>category:</td>
							<td><input type="text" size="100" name="category"
									value="<?php echo isset($category) ? $category : ""; ?>" /></td>
						</tr>
						<tr>
							<td>file_type:</td>
							<td><input type="text" size="100" name="file_type"
									value="<?php echo isset($file_type) ? $file_type : ""; ?>" /></td>
						</tr>
						<tr>
							<td>url:</td>
							<td><input type="text" size="100" name="file_url"
									value="<?php echo isset($file_url) ? $file_url : ""; ?>" /></td>
						</tr>
						<tr>
							<td>spotify_link:</td>
							<td><input type="text" size="100" name="spotify_link"
									value="<?php echo isset($spotify_link) ? $spotify_link : ""; ?>" /></td>
						</tr>
						<tr>
							<td>itunes_link:</td>
							<td><input type="text" size="100" name="itunes_link"
									value="<?php echo isset($itunes_link) ? $itunes_link : ""; ?>" /></td>
						</tr>
						<tr>
							<td>youtube_link:</td>
							<td><input type="text" size="100" name="youtube_link"
									value="<?php echo isset($youtube_link) ? $youtube_link : ""; ?>" /></td>
						</tr>
						<tr>
							<td>keywords:</td>

							<td><input type="text" size="100" name="keywords"
									value="<?php echo isset($keywords) ? $keywords : ""; ?>" /></td>
						</tr>
						<tr>

						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="addBtn" value="Add Entry" /></td>
						</tr>
					</table>
				</form>
			</div>

		</div>
		<?php
        // check to see if the form was submitted
        if (isset($_POST['addBtn'])) {
	        // get all the form data
        	$song_name = htmlspecialchars($_POST['song_name']);
	        $artist_name = htmlspecialchars($_POST['artist_name']);
	        $album_name = htmlspecialchars($_POST['album_name']);
	        $album_art = htmlspecialchars($_POST['album_art']);
	        $genre = htmlspecialchars($_POST['genre']);
	        $category = htmlspecialchars($_POST['category']);
	        $file_type = htmlspecialchars($_POST['file_type']);
	        $file_url = htmlspecialchars($_POST['file_url']);
	        $spotify_link = htmlspecialchars($_POST['spotify_link']);
	        $itunes_link = htmlspecialchars($_POST['itunes_link']);
	        $youtube_link = htmlspecialchars($_POST['youtube_link']);
	        $keywords = htmlspecialchars($_POST['keywords']);


        }
        // make sure all the form data was submitted
        if (
        	$song_name &&
        	$artist_name &&
        	$album_name &&
        	$album_art &&
        	$genre &&
        	$category &&
        	$file_type &&
        	$file_url &&
        	$spotify_link &&
        	$itunes_link &&
        	$youtube_link &&
        	$keywords
        ) {
	        // setup some vars
        
	        // CONNECT TO THE DB
        	$hostname = "localhost";
	        $username = "root";
	        $pd = "";
	        $dbname = "getmusic_database";

	        //Songs sha256 hash
        	$song_hash = hash('sha256', $song_name);

	        $con = mysqli_connect($hostname, $username, $pd, $dbname) or die("Database connection not established.");
	        mysqli_query($con, "INSERT INTO songs_data (song_name,artist_name,album_name,
							 album_art,genre,category,file_type,file_url,spotify_link,itunes_link,youtube_link,keywords,song_hash) VALUES
							 ('$song_name'
                               ,'$artist_name'
                               ,'$album_name'
                               ,'$album_art'
                               ,'$genre'
                               ,'$category'
                               ,'$file_url'
							   ,'$file_type'
                               ,'$spotify_link'
                               ,'$itunes_link'
                               ,'$youtube_link'
							   ,'$keywords'
                               ,'$song_hash')");
	        // make sure entry was created
        	if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM songs_data WHERE song_name='$song_name'"))) {
		        echo "<h1>'$song_name' = entry was added</h1>";

		        $result = $con->query("SELECT * FROM songs_data WHERE song_name='$song_name'");

		        if ($result->num_rows > 0) {
			        // output data of each row
        			while ($row = $result->fetch_assoc()) {
				        echo "<br>ID : ";
				        echo $row["id"];
						echo "<br>Song name : ";
				        echo $row["song_name"];
				        echo "<br>Artist name : ";
				        echo $row["artist_name"];
				        echo "<br>Album name : ";
				        echo $row["album_name"];
				        echo "<br>album_art : ";
				        echo $row["album_art"];
				        echo "<br>Genre : ";
				        echo $row["genre"];
				        echo "<br>Category : ";
				        echo $row["category"];
				        echo "<br>file_type : ";
				        echo $row["file_type"];
				        echo "<br>file_url : ";
				        echo $row["file_url"];
				        echo "<br>Spotify_link : ";
				        echo $row["spotify_link"];
				        echo "<br>itunes_link : ";
				        echo $row["itunes_link"];
				        echo "<br>youtube_link : ";
				        echo $row["youtube_link"];
				        echo "<br>Keywords : ";
				        echo $row["keywords"];
				        echo "<br>Song_hash : ";
				        echo $row["song_hash"];
						echo "<br><br>";
			        }
		        } else {
			        echo "0 results";
		        }

	        } else
		        echo 'An error occured. No new entry was added.';
        } else
	        echo '<h2>Please provided all data. The entire form is required.</h2>';


        ?>
	</div>
</body>

</html>