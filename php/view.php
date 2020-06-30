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
            <img src="<?php echo $row["icon"] ?>" width="100" height="100"> <br> <br>
             <a href="data:application/octet-stream;charset=utf-16le;base64,<?php echo base64_encode($row["installer"]); ?>" download="<?php echo $row['title'] ?>_installer.js"><button> Install </button></a>
          </th>
          <th class="app_desc">
            <div style="margin-bottom: 50px;"></div>
            <div class="app_cell">
              <h2> <?php echo $row["title"] ?> </h2>
              <hr>
              <strong> Description </strong>
              <p> <?php echo $row["description"] ?> </p>
              <strong> Cathegory </strong>
              <p> Other </p>
            </div>
          </th>
        </tr>
      </table>
      <center>
        <h1> Comments </h1>
      </center>
    </div>
    <?php include "comments.php" ?>
  </body>
</html>
