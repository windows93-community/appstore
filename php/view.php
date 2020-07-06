<?php include "main.php" ?>
    <div class="main_container">
      <?php
        $row = array();
        if(isset($_GET["id"]) && is_numeric($_GET["id"])) {
           $q = "SELECT * FROM `apps` WHERE `id` = " . $_GET["id"] . ";";
           $data = $conn->query($q);
           if($data != false && $data->num_rows != 0) $row = $data->fetch_assoc();
        }
      ?>
      <table class="app_data">
        <tr>
          <th class="app_img">
            <img src="<?php echo str_replace('"', '', $row["icon"]) ?>" width="100" height="100"> <br> <br>
            <button onclick="window.top.location.href = 'http://windows93.net/#!js data:application/javascript;base64,<?php echo base64_encode($row["installer"]); ?>'" style="margin-top: 5px;"> Install </button>
            <button style="margin-top: 5px;"> Report&nbsp; </button>
          </th>
          <th class="app_desc">
            <div class="app_cell">
              <h2 style="margin-bottom: 2px;"> <?php echo htmlentities($row["title"]) ?> </h2>
              <hr>
              <strong> Description </strong>
              <p> <?php echo htmlentities($row["description"]) ?> </p>
	      <strong> Author </strong>
	      <p> <?php echo htmlentities($row["author"])?> </p>
	      <strong> Category </strong>
	      <p> <?php echo htmlentities($row["cathegory"])?> </p>
	      <strong> Uploaded on </strong> <span style="color: blue"> <?php echo $row["date"] ?> </span>
	      <hr>
            </div>
          </th>
        </tr>
      </table>
      <center>
        <h2> Comments </h2>
      </center>
    </div>
    <?php include "comments.php" ?>
  </body>
</html>
