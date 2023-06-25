<?php

//Including Database configuration file.

include "db.php";

//Getting value of "search" variable from "script.js".

if (isset($_POST['search'])) {

//Search box value assigning to $Name variable.
$data = $_POST['search'];
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
   

//Search query.

   $Query = "SELECT title FROM songs_data WHERE title LIKE '%$data%' LIMIT 5";

//Query execution

   $ExecQuery = MySQLi_query($con, $Query);

//Creating unordered list to display result.

   echo '

<ul>

   ';

   //Fetching result from database.

   while ($Result = MySQLi_fetch_array($ExecQuery)) {

       ?>

   <!-- Creating unordered list items.

        Calling javascript function named as "fill" found in "script.js" file.

        By passing fetched result as parameter. -->

   <li >

   <a>

   <!-- Assigning searched result in "Search box" in "search.php" file. -->

       <?php echo $Result['title']; ?>

   </li></a>

   <!-- Below php code is just for closing parenthesis. Don't be confused. -->

   <?php

}}


?>

</ul>