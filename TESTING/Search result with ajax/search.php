<!DOCTYPE html>

<html>



<head>

   <title>Live Search using AJAX</title>

   <!-- Including jQuery is required. -->

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   <!-- Including our scripting file. -->

   <script type="text/javascript" src="script.js"></script>

   <!-- Including CSS file. -->

   <link rel="stylesheet" type="text/css" href="style.css">

</head>



<body>

<!-- Search box. -->

   <input type="text" id="search" placeholder="Search" />

   <br>

   <b>Ex: </b><i>David, Ricky, Ronaldo, Messi, Watson, Robot</i>

   <br />

   <!-- Suggestions will be displayed in below div. -->

   <div id="display"></div>
   

    <div style="width:600px;">

    <input type="button" value="Button!" />

    <span style="float:right"> Category </span>
  <div class="inputRow">
    <input type="text" id="input"/>
  </div>
</div>
<div style="width:600px;">
    
    <div id="display"></div>
    
 
</div>
 
</div>



</body>



</html>