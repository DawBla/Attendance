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
          <form id="formnewraid" action="newraidsubmit.php" method="post">
            <table>
              <tr>
                <th>Nickname</th><th>Attended/Benched</th><th>Attended half</th><th>Absent</th>
              </tr>
              <tr class="spacer">
                <td> </td>
              </tr>
              <?php
                include('dbconnect.php');
                $query = "SELECT * FROM data";

                if ($result = $mysqli->query($query)) {
                    while ($row = $result->fetch_assoc()) {
                      echo "<tr><td>".$row["nickname"]."</td><td><input type='radio' name='".$row["nickname"]."' value='1'></td><td><input type='radio' name='".$row["nickname"]."' value='0.5'></td><td><input type='radio' name='".$row["nickname"]."' value='0'></td></tr>";
                    }
                    $result->free();
                }
                $mysqli->close();
              ?>
            </table>
            <button class="btn" type="submit" form="formnewraid" value="Submit">Submit</button>
          </form>
        </div>
      </div>
    </div>

  </body>
</html>
