<?php
include("db_connect.php");

$json = file_get_contents('Songs_Metadata.json');

// Decoding the JSON file
$data = json_decode($json, true);


$n = sizeof($data);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

for ($i = 1; $i <= $n; $i++) {

  $title = mysqli_real_escape_string($con, $data[$i]["Title"]);
  $artist = mysqli_real_escape_string($con, $data[$i]["Artist"]);
  $year_released = $data[$i]["Year Released"];
  $bitrate = $data[$i]["Bitrate"];
  $filesize = $data[$i]["Filesize"];
  $duration = $data[$i]["Duration"];
  $album_artist = mysqli_real_escape_string($con, $data[$i]["AlbumArtist"]);
  $album_art = mysqli_real_escape_string($con, $data[$i]["Arturl"]);
  

  $song_hash = hash('sha256', $title);

  #convertions
  $bitrate = (int) $bitrate;
  $foo1 = (int) $filesize;
  $foo1 = round($foo1 / 1024 / 1024, 4);
  $filesize = round($foo1, 2);
  $foo2 = (float) $duration;
  $duration = gmdate('H:i:s', $foo2);

  $query = "INSERT INTO songs_data (title,artist_name,year_released,bitrate,file_size,duration,album_artist,song_hash,album_art) 
    VALUES ('$title','$artist','$year_released','$bitrate','$filesize','$duration','$album_artist','$song_hash','./album_art/$album_art');";
  // Perform a query, check for error
  if (!mysqli_query($con, $query)) {
    print_r(mysqli_error_list($con));

  } else {
    if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM songs_data WHERE title='$title'"))) {
      echo "<h4>'$title' = entry was added</h4>";
      $result = $con->query("SELECT * FROM songs_data WHERE title='$title'");
      if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
          echo $row["id"], "<br>";
          echo $row["title"], "<br>";
          echo $row["artist_name"], "<br>";
          echo $row["year_released"], "<br>";
          echo $row["bitrate"], "<br>";
          echo $row["file_size"], "<br>";
          echo $row["duration"], "<br>";
          echo $row["album_artist"], "<br>";
          echo $row["song_hash"], "<br>";
          echo $row["album_art"], "<br>";
          echo "<br><br>";
        }
      } else {
        echo "0 results";
      }
    } else {
      echo 'An error occured. No new entry was added.';
    }
  }
}

mysqli_close($con);


/*
$keys = array_keys($data);
for($i = 0; $i < count($data); $i++) {
echo $keys[$i] . "{<br>";
foreach($data[$keys[$i]] as $key => $value) {
echo $key . " : " . $value . "<br>";
}
echo "}<br>";
}
*/

/*
for ($i = 0; $i < $n; $i++) {
echo $data[$i]["Title"], "<br>";
echo $data[$i]["Artist"], "<br>";
echo $data[$i]["Year Released"], "<br>";
echo $data[$i]["Bitrate"], "<br>";
echo $data[$i]["Filesize"], "<br>";
echo $data[$i]["Duration"], "<br>";
echo $data[$i]["AlbumArtist"], "<br>";
echo "<br><br>";
}
}
*/

?>