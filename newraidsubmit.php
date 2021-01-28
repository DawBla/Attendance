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
        <h1>Attendance Tracker</h1>
      </div>

      <div class="centered container" style="margin-top:30px">
        <div id="attendance_table">
          <p>Redirecting to main page in 5 seconds.</p>
          <p>Click <a href="index.php">here</a> if you do not want to wait</p>
          <?php
            include('dbconnect.php');
            $query = "SELECT * FROM data";
            $insert = "";
            $ncknme = "";

            if ($result = $mysqli->query($query)) {
                while ($row = $result->fetch_assoc()) {
                  $ncknme = $row['nickname'];
                  $insert = "UPDATE data SET nickname = '".$ncknme."', attended = ".($row['attended']+$_POST[$ncknme]).", total = ".($row['total']+1)." WHERE nickname = '".$ncknme."';";
                  if ($mysqli->query($insert) === TRUE) {
                    echo "Record updated successfully for ".$ncknme;
                    echo "<br>";
                  }
                  else {
                    echo "Error updating record: " . $mysqli->error;
                    echo "<br>";
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
