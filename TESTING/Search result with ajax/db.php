<?php
//Database Connection
  $hostname="localhost";
  $username="root";
  $pd="";
  $dbname="getmusic_database"; 
  $con = mysqli_connect($hostname, $username, $pd, $dbname) or die("Database connection not established.");
?>