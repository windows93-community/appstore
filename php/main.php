<?php include "mysql.php" ?>
<html>
  <head>
    <title> AppStore93 </title>
    <link rel="stylesheet" href="./res/style.css">
    <!-- <link rel="stylesheet" href="./res/98.css"> -->
  </head>
  <body>
    <div id="navbar">
      <div class="navleft">
	<form method="GET" action="search.php">
          Search apps: <input type="text" name="search" autocomplete="off" value="<?php if(isset($_GET['search'])) echo $_GET['search'] ?>">
	</form>
      </div>
      <div class="navright">
         <strong> appstore 93 </strong>
      </div>
    </div>
   <div style="margin-bottom: 50px;"></div>
