<!DOCTYPE html>
<head>
  <title>Friends List</title>
</head>
<body>
  <h1>Your Friends</h1>
    <ul>
      <?php foreach ($friends as $friend) {
        echo '<li>' . $friend . '</li>';
      }
      ?>
    </ul>
</body>
