<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Attendance tracker</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <div id="content" class="centered">
      <div class="centered header">
        <h1>Attendance Tracker</h1>
      </div>

      <div class="centered container" style="margin-top:30px">
        <div id="attendance_table">
          <form id="addmembersubmit" action="addmembersubmit.php" method="post">
            <label for="nickname">Nickname:</label><input type="text" name="nickname" id="nickname">
            <br>
            <button class="btn" type="submit" form="addmembersubmit" value="Submit">Submit</button>
          </form>
        </div>
      </div>
    </div>

  </body>
</html>
