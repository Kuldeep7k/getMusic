<?php

include('db_connect.php');

// Read the JSON file 
$json = file_get_contents('Songs_Metadata.json');

// Decode the JSON file
$data = json_decode($json, true);

// Display data
//print_r($data);
$n = sizeof($data);


for ($i = 1; $i <= $n; $i++) {

  $title = $data[$i]["Title"];
  $artist = $data[$i]["Artist"];
  $year_released = $data[$i]["Year Released"];
  $bitrate = $data[$i]["Bitrate"];
  $filesize = $data[$i]["Filesize"];
  $duration = $data[$i]["Duration"];
  $album_artist = $data[$i]["AlbumArtist"];

  $song_hash = hash('sha256', $title);

  #convertions
  $bitrate = (int) $bitrate;
  $foo1 = (int) $filesize;
  $foo1 = round($foo1 / 1024 / 1024, 4);
  $filesize = round($foo1, 2);
  $foo2 = (float) $duration;
  $duration = gmdate('H:i:s', $foo2);

  


  $query = "INSERT INTO songs_data (title,artist_name,year_released,bitrate,file_size,duration,album_artist,song_hash) 
  VALUES ('$title','$artist','$year_released','$bitrate','$filesize','$duration','$album_artist','$song_hash');";
  if (!mysqli_query($con, $query)) {


    mysqli_query($con, $query);
    // make sure entry was created
    if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM songs_data WHERE title='$title'"))) {
      echo "<h4>'$title' = entry was added</h4>";
      $result = $con->query("SELECT * FROM songs_data WHERE title='$title'");
      if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
          echo $row["title"], "<br>";
          echo $row["artist_name"], "<br>";
          echo $row["year_released"], "<br>";
          echo $row["bitrate"], "<br>";
          echo $row["file_size"], "<br>";
          echo $row["duration"], "<br>";
          echo $row["album_artist"], "<br>";
          echo $row["song_hash"], "<br>";
          echo "<br><br>";
        }
      } else {
        echo "0 results";
      }
    } else {
      echo 'An error occured. No new entry was added.';
    }
    echo ("Error description: " . $mysqli);
  }
}



?>