<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Attendance tracker</title>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="5; URL=index.php" />
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <div id="content" class="centered">
      <div class="centered header">
        <h1>Attendance tracker</h1>
      </div>

      <div class="centered container" style="margin-top:30px">
        <div id="attendance_table">
          <p>Redirecting to main page in 5 seconds.</p>
          <p>Click <a href="index.php">here</a> if you do not want to wait</p>
          <?php
            include('dbconnect.php');
            $query = "SELECT * FROM data";
            $delete = "";
            $ncknme = "";

            if ($result = $mysqli->query($query)) {
                while ($row = $result->fetch_assoc()) {
                  $ncknme = $row['nickname'];
                  $delete = "DELETE FROM data WHERE nickname = '".$ncknme."';";
                  if (isset($_POST[$ncknme])) {
                    if ($mysqli->query($delete) === TRUE) {
                      echo $ncknme."has been removed.";
                      echo "<br>";
                    }
                    else {
                      echo "Error updating record: " . $mysqli->error;
                      echo "<br>";
                    }
                  }
                }
                $result->free();
            }

            $mysqli->close();
          ?>
        </div>
      </div>
    </div>

  </body>
</html>
