<?php
//Database Connection

include('config/db_connect.php');
$datafind = "select * from songs_data where id>=30 order by id desc";
$dataresult = mysqli_query($con, $datafind);
if (mysqli_num_rows($dataresult) > 0) {
  while ($row = mysqli_fetch_array($dataresult)) {
    
    $name=$row['song_name'];
    $art=$row['album_art'];
    $url=$row['url'];


  }
}

?>