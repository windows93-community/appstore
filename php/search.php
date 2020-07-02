<?php
include "main.php";


function search_query($field, $text) {
    $words = explode(" ", str_replace("'", "", $text));
    $r = "";
    for($i = 0; $i < count($words); $i++) {
        $r .= $field . " LIKE '%" . $words[$i] . "%'";
        if($i < count($words) - 1) $r .= ' OR ';
    }
    return $r;
}

$q = "SELECT id, title, icon, author, date FROM apps LIMIT 40";

if(isset($_GET["search"])) {
  $q = 'SELECT id, title, icon, author, date FROM apps WHERE ' .
    search_query("title", $_GET["search"]) . ' OR ' .
    search_query("author", $_GET["search"]) . ';';
}

$data = $conn->query($q);
?>
    <center>
      <?php if($data && mysqli_num_rows($data)) while($row = $data->fetch_assoc()) { ?>
        <table style="border: 1px solid gray; margin: 10px; height: 80px; width: min(calc(100% - 20px), 800px);">
          <tr>
            <th style="width: 64px; border-right: 1px gray;">
              <?php echo '<img src="' . str_replace('"', '', $row['icon']) . '" width="48" height="48">' ?>
            </th>
            <th>
              <a href="view.php?id=<?php echo $row['id'] ?>"> <h3> <?php echo htmlentities($row['title']) ?> </h3> </a>
            </th>
            <th style="width: 100px; border-left: 1px gray;">
              <strong> <?php echo htmlentities($row['author']) ?> <br>
              <span style="color: blue"> <?php echo htmlentities($row['date']) ?> </span>
            </th>
          </tr>
        </table>
      <?php } else echo "<h1> No results. </h1>" ?>
    </center>
  </body>
</html>
