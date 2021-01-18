<!DOCTYPE html>
<html lang="en">
  <head>
    <title>GG Team 2 Attendance tracker</title>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="5; URL=index.php" />
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <div id="content" class="centered">
      <div class="centered header">
        <h1>GG Team 2 Attendance tracker</h1>
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

            $ncknme = $_POST['nickname'];

            $insert = "INSERT INTO data VALUES ('".$ncknme."', 0, 0);";

            if ($mysqli->query($insert) === TRUE) {
              echo $ncknme." has been added.";
              echo "<br>";
            }
            else {
              echo "Error updating record: " . $mysqli->error;
              echo "<br>";
            }

            $mysqli->close();
          ?>
        </div>
      </div>
    </div>

  </body>
</html>
