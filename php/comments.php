<?php include "mysql.php" ?>
    <div id="main_container">
      <div id="post_comment">
        <form action="send.php" method="post" id="post_form">
          <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
          Your name: <input type="text" name="user"> <input type="submit" value="Submit">
        </form>
        <textarea rows="10" cols="60" name="content" form="post_form">Comment goes here...</textarea>
      </div>
      <br><br>
      <?php
      if(is_numeric($_GET["id"])) {

        $result = $conn->query("SELECT id, csid, name, date, content FROM comments WHERE csid = " . $_GET["id"] . " ORDER BY date DESC;");

        if(!$result || $result->num_rows == 0) echo "<center><h3>No comments yet...</h3></center>";

        else while($row = $result->fetch_assoc()) {
      ?>
      <div class="comment">
        <img src="./pfp.png" class="comment_pfp">
        <div class="comment_data">
          <span class="name"> <?php echo htmlentities($row["name"]) ?> </span><br>
          <span class="date"> <?php echo htmlentities($row["date"]) ?> </span>
        </div>
        <div class="comment_body">
          <?php echo htmlentities($row["content"]) ?>
        </div>
      </div>
    <?php } } else echo "<center><h3>Could not load comments!</h3></center>"; ?>
    </div>
