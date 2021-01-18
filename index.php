<!DOCTYPE html>
<html lang="en">
  <head>
    <title>GG Team 2 Attendance tracker</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <div id="content" class="centered">
      <div class="centered header">
        <h1>GG Team 2 Attendance tracker</h1>
      </div>

      <div class="centered container" style="margin-top:30px">
        <div id="attendance_table">
          <table>
            <tr>
              <th>Nickname</th><th>Raids attended</th><th>Attendance</th>
            </tr>
            <tr class="spacer">
              <td> </td>
            </tr>
            <?php
              include('dbconnect.php');
              $query = "SELECT * FROM data";

              if ($result = $mysqli->query($query)) {
                  while ($row = $result->fetch_assoc()) {
                    if ($row["total"] == 0) {
                      $attendanceperc = "NA";
                    }
                    else {
                      $attendanceperc = round((($row["attended"]/$row["total"])*100), $precision = 1, $mode = PHP_ROUND_HALF_UP);
                      $attendanceperc = $attendanceperc."%";
                    }
                    echo "<tr><td>".$row["nickname"]."</td><td>".$row["attended"]."/".$row["total"]."</td><td>".$attendanceperc,"</td></tr>";
                  }
                  $result->free();
              }
              $mysqli->close();
            ?>
          </table>
        </div>
        <a href="newraid.php" class="btn">Add raid</a>
        <a href="addmember.php" class="btn">Add member</a>
        <a href="removemember.php" class="btn">Remove member</a>
      </div>
    </div>

  </body>
</html>
