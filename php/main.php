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
          Search apps: <input type="text" name="search" autocomplete="off" value="<?php if(isset($_GET['search'])) echo $_GET['search'] ?>"> Category:
	  <select name="category" selected="<?php if(isset($_GET['category'])) echo $_GET['category'] ?>" onchange="this.form.submit()">
	    <option value="all">All</option>
	    <option value="games">Games</option>
	    <option value="themes">Themes</option>
	    <option value="art">Art</option>
	    <option value="other">Other</option>
	  </select>
        <script>
          window.addEventListener('load', function() {
            var sel = document.querySelector('select[name="category"]');
            if(sel.value != '') {
              for(var i = 0; i < sel.options.length; i++) {
                if(sel.options[i].value == sel.getAttribute('selected')) sel.selectedIndex = i;
              }
            }
          });
        </script>
	</form>
      </div>
    </div>
    <div style="margin-bottom: 50px;"></div>
