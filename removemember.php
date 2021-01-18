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
          <form id="formremovemember" action="removemembersubmit.php" method="post">
            <table>
              <tr>
                <th>Nickname</th><th>Delete</th>
              </tr>
              <tr class="spacer">
                <td> </td>
              </tr>
              <?php
                include('dbconnect.php');
                $query = "SELECT * FROM data";

                if ($result = $mysqli->query($query)) {
                    while ($row = $result->fetch_assoc()) {
                      echo "<tr><td>".$row["nickname"]."</td><td><input type='checkbox' name='".$row["nickname"]."'></td></tr>";
                    }
                    $result->free();
                }
                $mysqli->close();
              ?>
            </table>
            <button class="btn" type="submit" form="formremovemember" value="Submit">Submit</button>
          </form>
        </div>
      </div>
    </div>

  </body>
</html>
